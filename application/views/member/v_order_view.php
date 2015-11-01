<?
$ci =& get_instance();
$disable_r="";
$disable_y="";
$disable_ry="";
if ($order->paid=="r") {
        $disable_r="disabled";
      }else if ($order->send=="y") {
        $disable_y="disabled";
      }else if ($order->send=="y"&&$order->paid=="r") {
        $disable_ry="disabled";
      }
?>
<style type="text/css">
.row-fluid .no-margin-left{margin-left: 0px;}
</style>
<div class="container-fluid">
            <div class="row-fluid">                
                <div class="span12" id="content">

                     <div class="row-fluid">
                        
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">รายการสินค้า ในใบสั่งซื้อ</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">  

                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>ชื่อสินค้า</th>
                                              <th>ราคา</th>
                                              <th>จำนวน</th>
                                              <th>ราคารวม</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?
                                           $all_total=0;
                                            foreach ($order->item_list as $key => $value) {
                                              $all_total+=(int)$value->detail->sale_price*(int)$value->qty;
                                             ?>
                                             <tr id="d_c_<?echo $value->id;?>">
                                                  <td><img width="150" src="<?echo site_url("media/product_photo/".$value->detail->product_id."/".$value->detail->photo[0]->filename);?>"><? echo $value->detail->product_name; ?></td>
                                                  <td><? echo $value->detail->sale_price; ?></td>
                                                  <td><? echo htmlspecialchars($value->qty); ?></td>
                                                  <td><? echo (int)$value->detail->sale_price*(int)$value->qty; ?></td>
                                              </tr>
                                             <?
                                            }
                                            ?>            
                                            <tr>
                                              <td></td>
                                              <td></td>
                                              <td>Total</td>
                                              <td id="all_total"><?=$all_total?></td>
                                            </tr>                                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">ยินยันการโอนเงิน</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form class="form-horizontal" method="post" action="<?echo site_url('member/order_view/'.$order->id);?>">
                                        <fieldset>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ที่อยู่ในการจัดส่ง</label>
                                                  <div class="controls">
                                                    <select class="focused chzn-select" id="address" type="text" name="address" <?=$disable_ry?> <?=$disable_y?> >
                                                     <?
                                                     foreach ($address_list as $key => $value) {
                                                       ?>
                                                       <option value="<?=htmlspecialchars($value->address." ".$value->province." ".$value->zip_code)?>">
                                                         <?=htmlspecialchars($value->address." ".$value->province." ".$value->zip_code)?>
                                                       </option>
                                                       <?
                                                     }
                                                     ?>
                                                    </select>
                                                    <script type="text/javascript">
                                                      $("#address").val("<?=$order->address?>");
                                                      </script>
                                                  </div>
                                                </div>     
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">จำนวนเงิน</label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="amount" <?=$disable_ry?> <?=$disable_r?> value="<?echo htmlspecialchars($order->amount);?>">
                                                     
                                                  </div>
                                                </div>   
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">เข้าบัญชีธนาคาร</label>
                                                  <div class="controls">
                                                      <select class="focused chzn-select" id="bank" type="text" name="bank" <?=$disable_ry?> <?=$disable_r?>>
                                                     <?
                                                     foreach ($bank as $key => $value) {
                                                       ?>
                                                       <option value="<?=$value->id?>">
                                                         <?=htmlspecialchars($value->bank_name." ".$value->account_number." ".$value->account_name)?>
                                                       </option>
                                                       <?
                                                     }
                                                     ?>
                                                    </select>
                                                    <script type="text/javascript">
                                                      $("#bank").val("<?=$order->bank_id?>");
                                                      </script>
                                                     
                                                  </div>
                                                </div>                                               
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">เวลาที่โอนเงิน</label>
                                                  <div class="controls">
                                                      <input class="focused datetimepicker" id="" type="text" name="time" value="<?
                                                      if($order->time>1000000){
                                                        echo $ci->m_time->unix_to_datetimepicker($order->time);
                                                      }else{
                                                        echo $ci->m_time->unix_to_datetimepicker(time());
                                                        };?>" <?=$disable_ry?> <?=$disable_r?> >
                                                
                                                  </div>
                                                </div>     
                                                <div class="control-group">
                                                  <?
                                                  if ($disable_ry=="") {
                                                    ?>
                                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                                    <?
                                                  }
                                                  ?>
                                                  
                                                  <a href="<?echo site_url("member/order_list");?>" class="btn btn-info">กลับ</a>
                                                </div>
                                        </fieldset>
                                       </form>                                        
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(function() {
          $('.datetimepicker').datetimepicker();
          $(".chzn-select").chosen({
             width: "75%"
          });
        });
        </script>
        <!--/.fluid-container-->

                                          

            
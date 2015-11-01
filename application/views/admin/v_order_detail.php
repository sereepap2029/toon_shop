<?
$ci =& get_instance();
        $disable_r="disabled";
        $disable_y="disabled";
        $disable_ry="disabled";
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
                                   <form class="form-horizontal" method="post" action="">
                                        <fieldset>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ที่อยู่ในการจัดส่ง</label>
                                                  <div class="controls">
                                                    <?=$order->address?>
                                                  </div>
                                                </div>     
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">จำนวนเงิน</label>
                                                  <div class="controls">
                                                     <?echo htmlspecialchars($order->amount);?>
                                                     
                                                  </div>
                                                </div>   
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">เข้าบัญชีธนาคาร</label>
                                                  <div class="controls">
                                                  <?
                                                  $bank_dat=$ci->m_bank->get_bank_by_id($order->bank_id);
                                                  echo htmlspecialchars($bank_dat->bank_name." ".$bank_dat->account_number." ".$bank_dat->account_name);
                                                  ?>
                                                     
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
                                                  if ($order->paid=="y") {
                                                    ?>
                                                    <a href="<?echo site_url("admin/order/receive/".$order->id);?>" class="btn btn-danger">ยังไม่รับเงิน</a>
                                                    <?
                                                  }else if($order->paid=="r"){
                                                    ?>
                                                    <a href="<?echo site_url("admin/order/receive/".$order->id);?>" class="btn btn-success">ยืนยันรับเงินแล้ว</a>
                                                    <?
                                                  }else if($order->paid=="n"){
                                                    ?>
                                                    <a href="javascript:;" class="btn">ยังไม่ยืนยันการชำระเงิน</a>
                                                    <?
                                                  }
                                                  ?>
                                                  &nbsp;&nbsp;&nbsp;
                                                  <?
                                                  if ($order->send=="y") {
                                                    ?>
                                                    <a href="<?echo site_url("admin/order/send/".$order->id);?>" class="btn btn-success">ส่งของแล้ว</a>
                                                    <?
                                                  }else if($order->send=="n"){
                                                    ?>
                                                    <a href="<?echo site_url("admin/order/send/".$order->id);?>" class="btn btn-danger">ยังไม่ส่งของ</a>
                                                    <?
                                                  }
                                                  ?>
                                                  &nbsp;&nbsp;&nbsp;
                                                  <a href="<?echo site_url("admin/order");?>" class="btn btn-info">กลับ</a>
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

                                          

            
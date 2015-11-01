<?
$ci =& get_instance();
?>
<div class="container-fluid">
            <div class="row-fluid">                
                <div class="span12" id="content">
                  <div class="span3">
                    <?
                    $ci->load->view('member/v_side_bar');
                    ?>
                  </div>
                  <div class="span9">
                    <div class="row-fluid">
                          <!-- block -->
                          <div class="block">
                              <div class="navbar navbar-inner block-header">
                                  <div class="muted pull-left">รายการการสั่งซื้อ</div>
                              </div>
                              <div class="block-content collapse in">
                                  <div class="span12">
                                     <div class="table-toolbar">
                                        <div class="btn-group">
                                          
                                        </div>                                      
                                     </div>
                                      
                                      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                          <thead>
                                              <tr>
                                                <th>Order ID</th>
                                                <th>ที่อยู่</th>
                                                <th>สถานะ</th>
                                                <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                             <?
                                              foreach ($order_list as $key => $value) {
                                               ?>
                                               <tr>
                                                    <td><? echo $value->id;?></td>
                                                    <td><? echo htmlspecialchars($value->address); ?></td>
                                                    <td>
                                                      <?
                                                      if ($value->paid=="y") {
                                                        ?>
                                                        ยืนยันการโอนเงินแล้ว
                                                        <?
                                                      }else if($value->paid=="r"){
                                                        ?>
                                                        ได้รับเงินแล้ว
                                                        <?
                                                      }else if($value->paid=="n"){
                                                        ?>
                                                        ยังไม่ยืนยันการโอนเงิน
                                                        <?
                                                      }
                                                      ?>/
                                                      <?
                                                      if ($value->send=="y") {
                                                        ?>
                                                        ส่งสินค้าแล้ว
                                                        <?
                                                      }else if($value->send=="n"){
                                                        ?>
                                                        ยังไม่ส่งสินค้า
                                                        <?
                                                      }
                                                      ?>
                                                    </td>
                                                    <td>                     
                                                    <?
                                                    if ($value->send=="y"&&$value->paid=="r") {
                                                    }else{
                                                      ?>
                                                      <a href="<? echo site_url('member/order_view/'.$value->id)?>" class="btn btn-info btn-xs">ยืนยันการชำระเงิน/แก้ใขที่อยู่</a>
                                                      <?
                                                    }

                                                    if($value->paid=="n"){
                                                        ?>
                                                        <a href="javascript:con_del('<? echo $value->id;?>')" class="btn btn-danger btn-xs">ลบ</a>
                                                        <?
                                                      }?>
                                                      
                                                    </td>
                                                </tr>
                                               <?
                                              }
                                              ?>                                                                         
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <!-- /block -->
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        function con_del(id){
          if(confirm("แน่ใจ๋")){
            window.open("<?php echo site_url("member/del_order") ?>/"+id,"_self");
          }
        }
        </script>
        <!--/.fluid-container-->
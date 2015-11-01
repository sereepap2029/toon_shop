<?
$ci =& get_instance();
?>
<div class="container-fluid">
            <div class="row-fluid">                
                <div class="span12" id="content">

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">รายการการสั่งซื้อสินค้า</div>
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
                                              <th>เวลาที่สั่งซื้อ</th>
                                              <th>จำนวนเงิน</th>
                                              <th>ที่อยู่</th>
                                              <th>การจ่ายเงิน</th>
                                              <th>การส่งสินค้า</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?
                                            foreach ($order_list as $key => $value) {
                                             ?>
                                             <tr>
                                                  <td><? echo $ci->m_time->unix_to_datetimepicker($value->send_order_time); ?></td>
                                                  <td><? echo $value->amount; ?></td>
                                                  <td><? echo $value->address; ?></td>
                                                  <td><?
                                                  if ($value->paid=="y") {
                                                    echo "ยืนยันแล้ว เวลา : ".$ci->m_time->unix_to_datetimepicker($value->time);
                                                  }else if($value->paid=="n"){
                                                    echo "ยังไม่ยืนยัน";
                                                  }else if($value->paid=="r"){
                                                    echo "รับเงินแล้ว";
                                                  }

                                                    ?></td>
                                                  
                                                  <td><?
                                                  if ($value->send=="y") {
                                                    echo "ส่งสินค้าแล้ว";
                                                  }else if ($value->send=="n") {
                                                    echo "ยังไม่ส่งสินค้า";
                                                  }
                                                    ?></td>
                                                  <td>                                                                                           
                                                    <a href="<? echo site_url('admin/order/order_detail/'.$value->id)?>" class="btn btn-info btn-xs">ดูข้อมูล</a>
                                                    <?
                                                    if (!($value->paid=="r")) {
                                                      ?>
                                                      <a href="javascript:con_del('<? echo $value->id;?>')" class="btn btn-danger btn-xs">ลบ</a>
                                                      <?
                                                    }
                                                    ?>
                                                    
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
            <hr>
            <footer>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script type="text/javascript">
        function con_del(id){
          if(confirm("แน่ใจ๋")){
            window.open("<? echo site_url('admin/order/delete_order')?>/"+id,"_self");
          }
        }
        </script>
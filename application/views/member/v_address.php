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
                                <div class="muted pull-left">รายการที่อยู่</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('member/address_add')?>"><button class="btn btn-success">เพิ่มที่อยู่ <i class="icon-plus icon-white"></i></button></a>
                                      </div>                                      
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>ที่อยู่</th>
                                              <th>จังหวัด</th>
                                              <th>เบอร์โทร</th>
                                              <th>รหัส ไปรษณีย์</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?
                                            foreach ($address_list as $key => $value) {
                                             ?>
                                             <tr>
                                                  <td><? echo $key+1; ?></td>
                                                  <td><? echo htmlspecialchars($value->address); ?></td>
                                                  <td><? echo htmlspecialchars($value->province); ?></td>
                                                  <td><? echo htmlspecialchars($value->phone); ?></td>
                                                  <td><? echo htmlspecialchars($value->zip_code); ?></td>
                                                  <td>                                                                                           
                                                    <a href="<? echo site_url('member/address_add/'.$value->id)?>" class="btn btn-info btn-xs">แก้ใข</a>
                                                    <a href="javascript:con_del('<? echo $value->id;?>')" class="btn btn-danger btn-xs">ลบ</a>
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
            window.open("<?php echo site_url("member/del_address") ?>/"+id,"_self");
          }
        }
        </script>
        <!--/.fluid-container-->
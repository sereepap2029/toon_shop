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
                                <div class="muted pull-left">Admin list</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('admin/account/admin_add')?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>                                      
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>username</th>
                                              <th>ชื่อ</th>
                                              <th>นามสกุล</th>
                                              <th>role</th>
                                              <th>เข้าใช้งานล่าสุด</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?
                                            foreach ($admins as $key => $value) {
                                             ?>
                                             <tr>
                                                  <td><? echo $key+1; ?></td>
                                                  <td><? echo $value->username; ?></td>
                                                  <td><? echo $value->firstname; ?></td>
                                                  <td><? echo $value->lastname; ?></td>
                                                  <td><? echo $value->role; ?></td>
                                                  <td><? echo date("d M Y",$value->last_access); ?> </td>
                                                  <td>                                                                                           
                                                    <a href="<? echo site_url('admin/account/admin_edit/'.$value->username)?>" class="btn btn-info btn-xs">แก้ใข</a>
                                                    <a href="<? echo site_url('admin/account/delete_admin/'.$value->username)?>" class="btn btn-danger btn-xs">ลบ</a>
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
                        <a href="javascript:;"><button class="btn btn-success add_allow">test Add New <i class="icon-plus icon-white"></i></button></a>
                        <div class="block" id="test_resp">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <footer>
            </footer>
        </div>
        <!--/.fluid-container-->

        <script type="text/javascript">

        $(document).on("click", ".add_allow", function() {
        $.ajax({
                method: "POST",
                url: "http://rcal/",
                data: {
                    "add_bill": "add_bill",
                }
            })
            .done(function(data) {
                $("#test_resp").html(data);
            });
        
    });

        </script>
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
                                <div class="muted pull-left">Bank list</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('admin/bank/bank_add')?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>                                      
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>ธนาคาร</th>
                                              <th>เลขที่บัญชี</th>
                                              <th>ชื่อบัญชี</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?
                                            foreach ($bank as $key => $value) {
                                             ?>
                                             <tr>
                                                  <td><? echo $key+1; ?></td>
                                                  <td><? echo $value->bank_name; ?></td>
                                                  <td><? echo $value->account_number; ?></td>
                                                  <td><? echo $value->account_name; ?></td>
                                                  <td>                                                                                           
                                                    <a href="<? echo site_url('admin/bank/bank_edit/'.$value->id)?>" class="btn btn-info btn-xs">แก้ใข</a>
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
            <hr>
            <footer>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script type="text/javascript">
        function con_del(id){
          if(confirm("แน่ใจ๋")){
            window.open("<? echo site_url('admin/bank/delete_bank')?>/"+id,"_self");
          }
        }
        </script>
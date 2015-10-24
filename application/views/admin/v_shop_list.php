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
                                <div class="muted pull-left">SHOP list</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('admin/shop_add')?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>                                      
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>photo</th>
                                              <th>name</th>
                                              <th>rating</th>
                                              <th>publish_time</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?
                                            foreach ($shops as $key => $value) {
                                             ?>
                                             <tr>
                                                  <td><img width="100" src="<?echo site_url("media/shop_cover/".$value->photo);?>"></td>
                                                  <td><? echo $value->name; ?></td>
                                                  <td><? echo $value->rating; ?></td>
                                                  <td><? echo date("d M Y",$value->publish_time); ?> </td>
                                                  <td>                                                                                           
                                                    <a href="<? echo site_url('admin/shop_edit/'.$value->id)?>" class="btn btn-info btn-xs">แก้ใข</a>
                                                    <a href="<? echo site_url('admin/delete_shop/'.$value->id)?>" class="btn btn-danger btn-xs">ลบ</a>
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
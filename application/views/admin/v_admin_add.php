<?
$ci =& get_instance();
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
                                <div class="muted pull-left">Add admin Account </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form class="form-horizontal" method="post" action="<? if(isset($edit)){echo site_url('admin/account/admin_edit/'.$admin->username);}else{echo site_url('admin/account/admin_add');}?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Username</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="username">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="username" value="<?echo $admin->username;?>" disabled>
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ชื่อ</label>
                                                  <div class="controls">
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="firstname">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="firstname" value="<?echo $admin->firstname;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">นามสกุล</label>
                                                  <div class="controls">
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="lastname">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="lastname" value="<?echo $admin->lastname;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">เบอร์โทรพนักงาน</label>
                                                  <div class="controls">
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="phone">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="phone" value="<?echo $admin->phone;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Password</label>
                                                  <div class="controls">
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="password">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="password" value="<?echo $admin->password;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Confirm Password</label>
                                                  <div class="controls">
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="confirm_password">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="confirm_password" value="<?echo $admin->password;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="role">Role</label>
                                                  <div class="controls">
                                                    <select id="role" class="chzn-select" name="role">
                                                      <option>admin</option>                                                
                                                      <option>sadmin</option>
                                                    </select>
                                                  </div>
                                                  <?
                                                  if (isset($edit)) {
                                                    ?>
                                                    <script type="text/javascript">
                                                    $("#role").val("<?echo $admin->role;?>")
                                                    </script>
                                                    <?
                                                  }
                                                  ?>
                                                </div>
                                                <div class="control-group">
                                                  <button type="submit" class="btn btn-primary">บันทึก</button>
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
        <!--/.fluid-container-->

                                          

            
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
                                <div class="muted pull-left">เพิ่มบัญชีธนาคาร </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form class="form-horizontal" method="post" action="<? if(isset($edit)){echo site_url('admin/bank/bank_edit/'.$bank->id);}else{echo site_url('admin/bank/bank_add');}?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ธนาคาร</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="bank_name">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="bank_name" value="<?echo $bank->bank_name;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">เลขที่บัญชี</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="account_number">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="account_number" value="<?echo $bank->account_number;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ชื่อบัญชี</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="account_name">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="account_name" value="<?echo $bank->account_name;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
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

                                          

            
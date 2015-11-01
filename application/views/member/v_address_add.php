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
                                <div class="muted pull-left">เพิ่มที่อยู่ </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form class="form-horizontal" method="post" action="<? if(isset($edit)){echo site_url('member/address_add/'.$address->id);}else{echo site_url('member/address_add');}?>">
                                        <fieldset>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ที่อยู่</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <textarea class="focused span8" style="height:200px" name="address"></textarea>
                                                      <?
                                                    }else{
                                                      ?>
                                                      <textarea class="focused span8" style="height:200px" name="address"><?echo htmlspecialchars($address->address);?></textarea>                                                      
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>    
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">จังหวัด</label>
                                                  <div class="controls">
                                                    <select class="focused chzn-select" id="province" type="text" name="province">
                                                      <?
                                                      foreach ($province as $key => $value) {
                                                        ?>
                                                        <option value="<?=$value->name?>"><?=$value->name?></option>
                                                        <?
                                                      }
                                                      ?>
                                                    </select>
                                                    <?
                                                    if (isset($edit)) {
                                                      ?>
                                                      <script type="text/javascript">
                                                      $("#province").val("<?=$address->province?>")
                                                      </script>
                                                      <?
                                                    }?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">เบอร์โทรศัพท์</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="phone">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="phone" value="<?echo htmlspecialchars($address->phone);?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>                                               
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">รหัส ไปรษณีย์</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="zip_code">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="zip_code" value="<?echo htmlspecialchars($address->zip_code);?>">
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
        <script type="text/javascript">
        $(function() {
          $(".chzn-select").chosen({
             width: "50%"
          });
        });
        </script>
        <!--/.fluid-container-->

                                          

            
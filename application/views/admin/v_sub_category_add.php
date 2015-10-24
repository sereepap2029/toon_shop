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
                                <div class="muted pull-left">Add Sub Category </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" style="height:768px">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form class="form-horizontal" method="post" action="<? if(isset($edit)){echo site_url('admin/category/sub_category_edit/'.$sub_category->id);}else{echo site_url('admin/category/sub_category_add');}?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Category Name</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="name" value="<?if(isset($_POST['name'])){echo $_POST['name'];}?>">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="name" value="<?if(isset($_POST['name'])){echo $_POST['name'];}else{echo $sub_category->name;}?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>                           
                                                <div class="control-group">
                                                  <label class="control-label" for="parent_category">Main/Parent Category</label>
                                                  <div class="controls">
                                                    <select id="parent_category" class="chzn-select" name="parent_category">
                                                      <option value="no">----Please Select---</option>                                                
                                                      <?
                                                      foreach ($categorys as $key => $value) {
                                                        ?>
                                                        <option value="<?=$value->id?>"><?=$value->name?></option>       
                                                        <?
                                                      }
                                                      ?>
                                                    </select>
                                                  </div>
                                                  <?
                                                  if (isset($_POST['parent_category'])) {
                                                    ?>
                                                    <script type="text/javascript">
                                                    $("#parent_category").val("<?echo $_POST['parent_category'];?>")
                                                    </script>
                                                    <?
                                                  }else if (isset($edit)) {
                                                    ?>
                                                    <script type="text/javascript">
                                                    $("#parent_category").val("<?echo $sub_category->parent_category;?>")
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
<script type="text/javascript">
  $(function() {
    $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $('.datetimepicker').datetimepicker();
    $(".chzn-select").chosen({
        width: "75%"
    });
});
</script>
                                          

            
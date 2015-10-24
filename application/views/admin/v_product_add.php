<?
$ci =& get_instance();
?>
<link rel="stylesheet" href="<?echo site_url();?>css/jquery.fileupload.css">
<link rel="stylesheet" href="<?echo site_url();?>css/style.css">
<script src="<?echo site_url();?>js/ckeditor/ckeditor.js"></script> 
<style type="text/css">
.row-fluid .no-margin-left{margin-left: 0px;}
.img_hold{
  position: relative;
  width: 150px;
  display: inline-block;
  margin:10px;
}
.img_hold button{
  position: absolute;
  top: 0px;
  right: 0px;
}
.ui-state-highlight { position: relative;
  width: 150px;
  height: 150px;
  display: inline-block;
  margin:10px; 
}
</style>
<div class="container-fluid">
            <div class="row-fluid">                
                <div class="span12" id="content">

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add product </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form id="submit_form" class="form-horizontal" method="post" action="<? if(isset($edit)){echo site_url('admin/product/product_edit/'.$product->product_id);}else{echo site_url('admin/product/product_add');}?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">product Name</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="product_name" value="<?if(isset($_POST['product_name'])){echo $_POST['product_name'];}?>">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="product_name" value="<?echo $product->product_name;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">sub_des</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="sub_des" value="<?if(isset($_POST['sub_des'])){echo $_POST['sub_des'];}?>">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="sub_des" value="<?echo $product->sub_des;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                  <label class="control-label" for="parent_category">Category</label>
                                                  <div class="controls">
                                                    <select id="parent_category" class="chzn-select" name="category">
                                                      <option value="no">----Please Select---</option>                                                
                                                      <?
                                                      foreach ($category as $key => $value) {
                                                        ?>
                                                        <option value="<?="0__".$value->id?>"><?=$value->name?></option> 
                                                        <optgroup>
                                                          <?
                                                          foreach ($value->sub_cat as $key2 => $value2) {
                                                            ?>
                                                            <option value="<?=$value2->id."__".$value->id?>"><?=$value2->name?></option> 
                                                            <?
                                                          }
                                                          ?>
                                                        </optgroup>      
                                                        <?
                                                      }
                                                      ?>
                                                    </select>
                                                  </div>
                                                  <?
                                                  if (isset($_POST['category'])) {
                                                    ?>
                                                    <script type="text/javascript">
                                                    $("#parent_category").val("<?echo $_POST['category'];?>")
                                                    </script>
                                                    <?
                                                  }else if (isset($edit)) {
                                                    ?>
                                                    <script type="text/javascript">
                                                    $("#parent_category").val("<?echo $product->sub_cat."__".$product->main_cat;?>")
                                                    </script>
                                                    <?
                                                  }

                                                  ?>
                                                </div> 
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ราคาจริง</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="real_price" value="<?if(isset($_POST['real_price'])){echo $_POST['real_price'];}?>">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="real_price" value="<?echo $product->real_price;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ราคา sale</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="sale_price" value="<?if(isset($_POST['sale_price'])){echo $_POST['sale_price'];}?>">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="sale_price" value="<?echo $product->sale_price;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>  
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">sale_percent</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="sale_percent" value="<?if(isset($_POST['sale_percent'])){echo $_POST['sale_percent'];}?>">%
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="sale_percent" value="<?echo $product->sale_percent;?>">%
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                  <div class="control-group">
                                                  <label class="control-label" for="focusedInput">มีของ</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="checkbox" name="in_stock" value="y" <?if(isset($_POST['in_stock'])){echo "checked";}?>>
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="checkbox" name="in_stock" value="y" <?if($product->in_stock=="y"){echo "checked";}?>>
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>   
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">Description</label>
                                                  <div class="span12 no-margin-left" id="content_field" style="min-height:100px;background-color:#cccccc" contenteditable="true">
                                                    
                                                  </div>
                                                      <input class="focused datepicker" id="content_input" type="hidden" name="des">
                                                  
                                                </div>  
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูป</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload" type="file" name="files[]" multiple>
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="img_hold_parent" class="span12 no-margin-left" style="margin-bottom:20px;">
                                                    <?
                                                    if (isset($edit)) {
                                                      foreach ($product->photo as $key => $value) {
                                                        ?>
                                                        <div class="img_hold">
                                                            <img src="<?=site_url("media/product_photo/".$product->product_id."/".$value->filename);?>" class="span10 file_tmp">
                                                            <input type="hidden" class="file_path" name="file_path[]" value="<?="old_file_picture__".$value->id?>">
                                                            <button id="<?=$value->id?>" file="<?=$value->filename?>" type="button" class="btn btn-success del_pic"><i class="icon-remove icon-white"></i></button>
                                                        </div>
                                                        <?
                                                      }
                                                    }
                                                    ?>
                                                    
                                                </div>                                          
                                                <div class="control-group">
                                                  <button type="button" class="btn btn-primary send_form">บันทึก</button>
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
         CKEDITOR.disableAutoInline = true;
         var editor = CKEDITOR.inline( 'content_field',{
                 allowedContent:true
               });
               $(document).on('click', ".send_form", function(){
                 $("#content_input").val($("#content_field").html());
                 //console.log($("#content_input").val());
                   document.getElementById('submit_form').submit();
               });
               <?
               if (isset($edit)) {
                ?>
                editor.setData("<?=str_replace('"','\"',$product->des)?>");
                <?
               };
               ?>

    $( "#img_hold_parent" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#img_hold_parent" ).disableSelection();


    $(document).on('click', ".img_hold .del_tmp", function(){
      cue_ele=$(this);
      $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url("admin/product/del_tmp_img"); ?>",
                                    data: {
                                        "file": cue_ele.parent().find("input").val(),
                                    }
                                })
                                .done(function(data) {
                                    cue_ele.parent().fadeOut(500,function(){
                                      $(this).remove();
                                    });
                                });
    });
    $(document).on('click', ".img_hold .del_pic", function(){
      cue_ele=$(this);
      $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url("admin/product/del_real_img"); ?>",
                                    data: {
                                        "id": cue_ele.attr("id"),
                                        "filename": cue_ele.attr("file"),
                                    }
                                })
                                .done(function(data) {
                                    cue_ele.parent().fadeOut(500,function(){
                                      $(this).remove();
                                    });
                                });
    });
  });
        </script>
 <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
            <script src="<?echo site_url();?>js/upload/vendor/jquery.ui.widget.js"></script>
            <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
            <script src="<?echo site_url();?>js/upload/jquery.iframe-transport.js"></script>
            <!-- The basic File Upload plugin -->
            <script src="<?echo site_url();?>js/upload/jquery.fileupload.js"></script>
            <script>
            /*jslint unparam: true */
            /*global window, $ */
            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url = '<?php echo site_url('upload_handler/attachment'); ?>';
                $('#fileupload').fileupload({
                    url: url,
                    dataType: 'json',
                    beforeSend: function(){
                       $('#progress .progress-bar').css(
                            'width',
                             '0%'
                        );
                     },
                    done: function (e, data) {
                        //console.log(data);

                        $.each(data.result.files, function (index, file) {
                            //console.log(file);
                            if (file.error=="File is too big") {
                                $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url("admin/product/ajax_img_hold"); ?>",
                                    data: {
                                        "file": "",
                                        "file_path": "",
                                        "alt": "ไฟล์ "+file.name+" ขนาดไหญ่เกินไป",
                                    }
                                })
                                .done(function(data) {
                                    $("#img_hold_parent").append(data);
                                });
                            }else{
                                $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url("admin/product/ajax_img_hold"); ?>",
                                    data: {
                                        "file": file.name,
                                        "file_path": "<?echo site_url();?>media/temp/"+file.name,
                                        "alt": "",
                                    }
                                })
                                .done(function(data) {
                                    $("#img_hold_parent").append(data);
                                });
                            }
                        });
                        
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
            </script>                                         

            
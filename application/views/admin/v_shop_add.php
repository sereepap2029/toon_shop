<?
$ci =& get_instance();
?>
<style type="text/css">
.row-fluid .no-margin-left{margin-left: 0px;}
</style>
<link rel="stylesheet" href="<?echo site_url();?>css/jquery.fileupload.css">
<link rel="stylesheet" href="<?echo site_url();?>css/style.css">
<script src="<?echo site_url();?>js/ckeditor/ckeditor.js"></script> 
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
                                   <form class="form-horizontal" id="submit_form" method="post" action="<? if(isset($edit)){echo site_url('admin/shop_edit/'.$shop->id);}else{echo site_url('admin/shop_add');}?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">name</label>
                                                  <div class="controls">
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="name">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="name" value="<?echo $shop->name;?>" disabled>
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">short_des</label>
                                                  <div class="controls">
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="short_des">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="short_des" value="<?echo $shop->short_des;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">rating</label>
                                                  <div class="controls">
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused" id="" type="text" name="rating"> /10
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused" id="" type="text" name="rating" value="<?echo $shop->rating;?>">/10
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">publish_time</label>
                                                  <div class="controls">
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused datepicker" id="" type="text" name="publish_time">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused datepicker" id="" type="text" name="publish_time" value="<? echo $ci->m_time->unix_to_datepicker($shop->publish_time);?>">
                                                      <?
                                                    }
                                                    ?>
                                                  </div>
                                                </div>
                                                <div class="span12 no-margin-left">
                                                  <label class="control-label" for="focusedInput">content</label>
                                                  <div class="span12 no-margin-left" id="content_field" style="min-height:100px;background-color:#cccccc" contenteditable="true">
                                                     
                                                  </div>
                                                    
                                                    <?
                                                    if (!isset($edit)) {
                                                      ?>
                                                      <input class="focused datepicker" id="content_input" type="hidden" name="content">
                                                      <?
                                                    }else{
                                                      ?>
                                                      <input class="focused datepicker" id="content_input" type="hidden" name="content" value="<?echo $shop->content;?>">
                                                      <?
                                                    }
                                                    ?>
                                                  
                                                </div>
                                                <div class="span12 no-margin-left">
                                                </div>
                                                <div class="control-group">
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>เลือกรูปหน้าปก</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload" type="file" name="files[]" >
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="span12 no-margin-left" style="margin-bottom:20px;">
                                                    <img src="" id="file_tmp" class="span10">
                                                    <input type="hidden" id="file_path" name="file_path">
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
                                                $( ".datepicker" ).datepicker({
                                                  changeMonth: true,
                                                  changeYear: true,
                                                  beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }     
                                                });
                                                $('.datetimepicker').datetimepicker();

                                                CKEDITOR.disableAutoInline = true;

                                                var editor = CKEDITOR.inline( 'content_field',{
                                                  allowedContent:true
                                                });
                                                $(document).on('click', ".send_form", function(){
                                                  $("#content_input").val($("#content_field").html());
                                                  //console.log($("#content_input").val());
                                                    document.getElementById('submit_form').submit();
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
                                $("#file_tmp").attr("alt","ไฟล์ขนาดไหญ่เกินไป");
                                $("#file_tmp").attr("src","");
                            }else{
                                $("#file_tmp").attr( "src","<?echo site_url();?>media/temp/"+file.name);
                                $("#file_path").val(file.name);
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

                                          

            
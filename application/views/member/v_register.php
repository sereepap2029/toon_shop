<?
$ci =& get_instance();
?>
<style type="text/css">
.row-fluid .no-margin-left{margin-left: 0px;}
.warning{
  color: red;
}
</style>
<div class="container-fluid">
            <div class="row-fluid">                
                <div class="span12" id="content">

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">สมัครสมาชิก </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <h5> <?if (isset($err_msg)) {
                                        echo "*******".$err_msg."*******";
                                    }?></h5>
                                   <form id="reg_form" class="form-horizontal" method="post" action="<?echo site_url('member/register');?>">
                                        <fieldset>
                                          
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Username <font id="username" class="warning"></font> </label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="username">
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Password <font class="warning" id="password"></font> </label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="password" name="password">
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Confirm Password </label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="password" name="confirm_password">
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ชื่อ <font class="warning" id="firstname"></font></label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="firstname">
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">นามสกุล <font class="warning" id="lastname"></font></label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="lastname">
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">เบอร์โทร <font class="warning" id="phone"></font></label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="phone">
                                                  </div>
                                                </div>   
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">Email <font class="warning" id="email"></font></label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="email">
                                                  </div>
                                                </div>   
                                                <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ตอบคำถามต่อไปนี้ <br>
                                                  <font style="color:red"><? echo $x." ".$cap_res['operator']." ".$y;?><br></font>
                                                  <font class="warning" id="capcha"></font>
                                                  </label>
                                                  <div class="controls">
                                                      <input class="focused" id="" type="text" name="capcha">
                                                  </div>
                                                </div>                                                
                                                <div class="control-group">
                                                  <a href="javascript:submit_form();" class="btn btn-primary">สมัคร</a>
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
        function submit_form(){
          //alert($("input[name='username']").val());
          $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url("member/check_valid_reg"); ?>",
                                    data: {
                                        "username": $("input[name='username']").val(),
                                        "password": $("input[name='password']").val(),
                                        "confirm_password": $("input[name='confirm_password']").val(),
                                        "firstname": $("input[name='firstname']").val(),
                                        "lastname": $("input[name='lastname']").val(),
                                        "phone": $("input[name='phone']").val(),
                                        "email": $("input[name='email']").val(),
                                        "capcha": $("input[name='capcha']").val(),
                                    }
                                })
                                .done(function(data) {
                                  $("#username").html("");
                                  $("#password").html("");
                                  $("#firstname").html("");
                                  $("#lastname").html("");
                                  $("#phone").html("");
                                  $("#email").html("");
                                  $("#capcha").html("");
                                  var issub=true;
                                  if (data['username']!="OK") {
                                    $("#username").html(data['username']);
                                    issub=false;
                                  };
                                  if (data['password']!="OK") {
                                    $("#password").html(data['password']);
                                    issub=false;
                                  };
                                  if (data['firstname']!="OK") {
                                    $("#firstname").html(data['firstname']);
                                    issub=false;
                                  };
                                  if (data['lastname']!="OK") {
                                    $("#lastname").html(data['lastname']);
                                    issub=false;
                                  };
                                  if (data['phone']!="OK") {
                                    $("#phone").html(data['phone']);
                                    issub=false;
                                  };
                                  if (data['email']!="OK") {
                                    $("#email").html(data['email']);
                                    issub=false;
                                  };
                                  if (data['capcha']!="OK") {
                                    $("#capcha").html(data['capcha']);
                                    issub=false;
                                  };
                                  if (issub) {
                                    f1=document.getElementById('reg_form');
                                    f1.submit();
                                  };
                                });
        }
        </script>

                                          

            
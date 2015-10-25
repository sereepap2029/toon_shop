<?
$ci =& get_instance();
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="<?echo site_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?echo site_url();?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?echo site_url();?>assets/styles.css" rel="stylesheet" media="screen">
        
        <link href="<?echo site_url();?>assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?echo site_url();?>assets/jquery.mCustomScrollbar.css" rel="stylesheet" media="screen">

        <link href="<?echo site_url();?>assets/css/jquery-ui.css" rel="stylesheet" />
        <link href="<?echo site_url();?>assets/css/jquery.datetimepicker.css" rel="stylesheet" />
        <link href="<?echo site_url();?>css/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?echo site_url();?>assets/styles_atom.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?echo site_url();?>vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?echo site_url();?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?echo site_url();?>assets/js/jquery-ui.js"></script>
        <script src="<?echo site_url();?>assets/js/jquery.datetimepicker.js"></script> 
        <script src="<?echo site_url();?>js/jquery.mCustomScrollbar.js"></script>
        <script src="<?echo site_url();?>js/jquery.fancybox.js"></script> 
        <link href="<?echo site_url();?>vendors/chosen.min.css" rel="stylesheet" media="screen">
        <script src="<?echo site_url();?>vendors/chosen.jquery.min.js"></script>
    </head>
    <style type="text/css">
    .white-nav-bar{
            background-image:-moz-linear-gradient(top,#fff,#f2f2f2);
            background-image:-webkit-gradient(linear,0 0,0 100%,from(#fff),to(#f2f2f2));
            background-image:-webkit-linear-gradient(top,#fff,#f2f2f2);
            background-image:-o-linear-gradient(top,#fff,#f2f2f2);
            background-image:linear-gradient(to bottom,#fff,#f2f2f2);
        }
    </style>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner white-nav-bar">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>                    
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                        <?
                        if (isset($user_data->firstname)) {
                        ?>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> 
                                <i class="icon-user"></i> <?echo $user_data->firstname." ".$user_data->lastname;?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<? echo site_url('member');?>">Profile</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<? echo site_url('member/cart');?>">Cart <i class="icon-shopping-cart"></i></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="<? echo site_url('member/logout');?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <?
                        }else{

                            ?>
                            <li class="">
                                        <a href="<?echo site_url("member/login");?>" >Login</b>

                                        </a>
                                    </li>
                             <li class="">
                                        <a href="<?echo site_url("member/register");?>" >Register</b>

                                        </a>
                                    </li>       
                            <?
                        }
                        ?>
                        </ul>
                        <ul class="nav">   
                                    <li class="">
                                        <a href="<?echo site_url();?>" >Home</b>

                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="<?echo site_url("shop");?>">Shop</b>

                                        </a>
                                    </li>                     
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
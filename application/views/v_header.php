<?
$ci =& get_instance();
$ci->load->model('m_cart');
?>
    <!DOCTYPE html>
    <html class="no-js">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>BRABUZA</title>
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
    .white-nav-bar {
        background-image: -moz-linear-gradient(top, #fff, #f2f2f2);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#f2f2f2));
        background-image: -webkit-linear-gradient(top, #fff, #f2f2f2);
        background-image: -o-linear-gradient(top, #fff, #f2f2f2);
        background-image: linear-gradient(to bottom, #fff, #f2f2f2);
    }
    
    @media (min-width: 979px) {
        body {
            padding-top: 0px;
        }
    }
    </style>

    <body>
        <div class="container-fluid no-padding">
            <div class="row-fluid">
                <div class="span12 no-margin-left header-region">
                    <div class="span12 no-margin-left">
                        <div class="span1 no-margin-left">
                        </div>
                        <div class="span5 no-margin-left">
                            <img src="<?echo site_url();?>images/logo.png">
                        </div>
                        <div class="span5 no-margin-left">
                            <div class="span12 no-margin-left">
                                <div class="header-a-item pull-right">
                                    <img src="<?echo site_url();?>images/icon/icon_user.png">
                                    <?
                                if (isset($user_data->firstname)) {
                                    ?>
                                        <a href="<? echo site_url('member');?>"><?echo $user_data->firstname." ".$user_data->lastname;?></a>
                                        <a href="<? echo site_url('member/logout');?>">Logout</a>
                                        <?
                                    
                                }else{
                                    ?>
                                            <a href="<?echo site_url("member/login");?>">Login</a>
                                            <a href="<?echo site_url("member/register");?>">Register</a>
                                            <?
                                }
                                ?>
                                </div>
                                <a class="header-a-item pull-right" href=""><img src="<?echo site_url();?>images/icon/icon_wishlist.png">Wish List</a>
                                <a class="header-a-item pull-right" href="<? echo site_url('member/cart');?>"><img src="<?echo site_url();?>images/icon/icon_cart.png">
                                <?
                                if (isset($user_data->firstname)) {
                                    $cart_item=$ci->m_cart->get_all_item_by_usn($user_data->username);
                                    ?>
                                    <span class="badge badge-warning"><?=count($cart_item)?></span>
                                    <?
                                }else{
                                    ?>
                                    <span class="badge badge-warning">0</span>
                                    <?
                                }

                                ?>
                                </a>
                            </div>
                            <div class="span12 no-margin-left">
                                <div class="control-group pull-right">
                                    <div class="controls">
                                        <input class="focused" id="search_field" placeholder="Search....">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span1 no-margin-left">
                        </div>
                    </div>
                    <div class="span12 no-margin-left header-bottom">
                        <ul class="menu-bar">
                            <li><a href="<?echo site_url();?>" class="<?if(isset($home)){echo "active";}?>">หน้าแรก</a></li>
                            <li><a href="<?echo site_url();?>" class="<?if(isset($about)){echo "active";}?>">เกี่ยวกับเรา</a></li>
                            <li><a href="<?echo site_url("shop");?>" class="<?if(isset($shop)){echo "active ";}?>">สินค้า</a></li>
                            <li><a href="<?echo site_url();?>" class="<?if(isset($promo)){echo "active";}?>">โปรโมชั่น</a></li>
                            <li><a href="<?echo site_url();?>" class="<?if(isset($howtobuy)){echo "active";}?>">วิธีการสั่งซื้อ</a></li>
                            <li><a href="<?echo site_url();?>" class="<?if(isset($itemstat)){echo "active";}?>">เช็คสถานะสินค้า</a></li>
                            <li><a href="<?echo site_url();?>" class="<?if(isset($contact)){echo "active";}?>">ติดต่อเรา</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?/*<div class="navbar">
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
                    <i class="icon-user"></i>
                    <?echo $user_data->firstname." ".$user_data->lastname;?> <i class="caret"></i>
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
                    <a href="<?echo site_url(" member/login ");?>">Login</b>

                                        </a>
                </li>
                <li class="">
                    <a href="<?echo site_url(" member/register ");?>">Register</b>

                                        </a>
                </li>
                <?
                        }
                        ?>
                    </ul>
                    <ul class="nav">
                        <li class="">
                            <a href="<?echo site_url();?>">Home</b>

                                        </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?echo site_url(" shop ");?>">Shop</b>

                                        </a>
                        </li>
                    </ul>
                    </div>
                    <!--/.nav-collapse -->
                    </div>
                    </div>
                    </div>*/?>

<?php
include_once('admin/main/conn.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>

        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Ekiti, Ekiti Parapo Community Uk Ekiti State Nigeria" />
        <meta name="keywords" content="Ekiti, Parapo, UK, Nigeria, Ekiti Parapo Community of Ekiti state," />
        <meta name="author" content="Ezekiel Aliyu ezzzy, Boluwaji Akin" />

        <!-- Page Title -->
        <title>Ekiti Parapo | <?php echo $mytitle; ?></title>

        <!-- Favicon and Touch Icons -->
        <link href="images/logo.jpeg" rel="shortcut icon" type="image/png">
        <link href="images/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
        <link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
        <link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

        <!-- Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="css/animate.css" rel="stylesheet" type="text/css">
        <link href="css/css-plugin-collections.css" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins -->
        <link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
        <!-- CSS | Main style file -->
        <link href="css/style-main.css" rel="stylesheet" type="text/css">
        <!-- CSS | Preloader Styles -->
        <link href="css/preloader.css" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="css/responsive.css" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

        <!-- Revolution Slider 5.x CSS settings -->
        <link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
        <link  href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
        <link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

        <!-- CSS | Theme Color -->
        <link href="css/colors/theme-skin-color-set-5.css" rel="stylesheet" type="text/css">

        <!-- external javascripts -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- JS | jquery plugin collection for this theme -->
        <script src="js/jquery-plugin-collection.js"></script>

        <!-- Revolution Slider 5.x SCRIPTS -->
        <script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
        <script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">
        <div id="wrapper" class="clearfix">
            <!-- preloader -->
            <div id="preloader">
                <div id="spinner">
                    <!--<div class="preloader-dot-loading">-->
                    <div class="preloader-jackhammer">
                        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                    </div>
                </div>
                <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
            </div> 

            <!-- Header -->
            <header id="header" class="header">
                <div class="header-top bg-theme-color-2 sm-text-center p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget no-border m-0">
                                    <ul class="list-inline font-13 sm-text-center mt-5">
                                        <li>
                                            <a class="text-white" href="./?lnk=faq">FAQ</a>
                                        </li>
                                        <li class="text-white">|</li>
                                        <li>
                                            <a class="text-white" href="./?lnk=down">Lectures/Downloads</a>
                                        </li>
                                        <li class="text-white">|</li>
                                        <li>
                                            <a class="text-white" href="./?lnk=login">Login</a>
                                        </li>
                                        <li class="text-white">|</li>
                                        <li>
                                            <a class="text-white" href="./?lnk=reg">SignUp</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="widget m-0 pull-right sm-pull-none sm-text-center">
                                    <ul class="list-inline pull-right">

                                        <li class="mb-0 pb-0">
                                            <div class="top-dropdown-outer pt-5 pb-10">
                                                <a class="top-search-box has-dropdown text-white text-hover-theme-colored"><i class="fa fa-search font-13"></i> &nbsp;</a>
                                                <ul class="dropdown">
                                                    <li>
                                                        <div class="search-form-wrapper">
                                                            <form method="get" class="mt-10">
                                                                <input type="text" onfocus="if (this.value === 'Enter your search') { this.value = ''; }" onblur="if (this.value === '') { this.value = 'Enter your search'; }" value="Enter your search" id="searchinput" name="s" class="">
                                                                <label><input type="submit" name="submit" value=""></label>
                                                            </form>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
                                    <ul class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                                        <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                                        <li><a href="https://www.twitter.com/#" target="_blank"><i class="fa fa-twitter text-white"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-middle p-0 bg-lightest xs-text-center">
                    <div class="container pt-0 pb-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-5">
                                <div class="widget no-border m-0">
                                    <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="./?lnk=home"><img src="images/logo.jpeg" alt=""></a>
                                    <h4>&nbsp;</h4>
                                </div>
                                <h4 style="text-transform: uppercase; color: red;">Ekiti Parapo In UK</h4>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-phone-square text-theme-colored font-36 mt-5 sm-display-block"></i></li>
                                        <li>
                                            <a href="#" class="font-12 text-gray text-uppercase">Call us today!</a>
                                            <h5 class="font-14 m-0"> +(44) 744 248 4888</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>  
                            <div class="col-xs-12 col-sm-4 col-md-2">
                                <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-calculator text-theme-colored font-36 mt-5 sm-display-block"></i></li>
                                        <li>
                                            <a href="#" class="font-12 text-gray text-uppercase">Charity Number!</a>
                                            <h5 class="font-13 text-black m-0"> 1065740</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-2">
                                <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-tv text-theme-colored font-36 mt-5 sm-display-block"></i></li>
                                        <li>
                                            <a href="#" class="font-12 text-gray text-uppercase">Ekiti Radio</a>
                                            <h5 class="font-13 text-black m-0"> UK</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px">
                        <div class="container">
                            <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
                                <ul class="menuzord-menu">
                                    <li class="active"><a href="./?lnk=home">Home</a></li>
                                    <li><a href="#">About</a>
                                        <ul class="dropdown">
                                            <li><a href="./?lnk=about">About Us</a></li>
                                            <li><a href="./?lnk=history">Our History</a></li>
                                            <li><a href="./?lnk=vision">Our Vision</a></li>
                                            <li><a href="./?lnk=mision">Our Mission</a></li>
                                            <li><a href="./?lnk=aim">Our Aims/Objectives</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a href="#">Administration</a>
                                        <ul class="dropdown">
                                            <li><a href="./?lnk=scholars">Our Leaders</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">Facilities</a>
                                        <ul class="dropdown">
                                            <li><a href="./?lnk=hospital">Hospitals</a></li>
                                            <li><a href="./?lnk=schools">Schools</a></li>
                                            <li><a href="./?lnk=roads">Road Networks</a></li>
                                            <li><a href="./?lnk=markets">Markets</a></li>
                                        </ul>
                                    </li>
                                    
                                     <li><a href="#">Projects & Gallery</a>
                                        <ul class="dropdown">
                                            <li><a href="./?lnk=gallery">Photo Gallery</a></li>
                                            <?php
                                                ?>
                                                <?php
                                            ?>
                                        </ul>
                                    </li>
                                                                        
                                    <li><a href="#home">News & Events</a>
                                        <ul class="dropdown">
                                            <li><a href="./?lnk=news&which=today">Today's News</a></li>
                                            <li><a href="./?lnk=news&which=month"><?php echo date('M'); ?>'s News</a></li>
                                            <li><a href="./?lnk=news&which=year"><?php echo date('Y'); ?>'s News</a></li>
                                            <li><a href="./?lnk=news&which=older">Older News</a></li>
                                            <li><a href="./?lnk=events&which=today">Today's Events</a></li>
                                            <li><a href="./?lnk=events&which=upcoming">Upcoming Events</a></li>
                                            <li><a href="./?lnk=events&which=past">Past Events</a></li>
                                            <li><a href="./?lnk=calendar">Calendar Event</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="./?lnk=blog">Articles</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Support</a>
                                        <ul class="dropdown">
                                            <li><a href="./?lnk=faq">FAQs</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="pull-right flip hidden-sm hidden-xs">
                                    <li>
                                        <!-- Modal: Book Now Starts -->
                                        <!--<a class="btn btn-colored btn-flat bg-theme-color-2 text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" data-toggle="modal" data-target="#BSParentModal" href="ajax-load/reservation-form.html">Book Now</a>-->
                                        <!-- Modal: Book Now End -->
                                    </li>
                                </ul>
                                <div id="top-search-bar" class="collapse">
                                    <div class="container">
                                        <form role="search" action="#" class="search_form_top" method="get">
                                            <input type="text" placeholder="Type text and press Enter..." name="s" class="form-control" autocomplete="off">
                                            <span class="search-close"><i class="fa fa-search"></i></span>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

<?php
session_name("SAdmin");
session_start();
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YES"){
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  header('Location: signin.php');
  exit;
}
if($_SESSION['who'] != "sadmin" && !in_array($prev, $_SESSION['privilege'])){
  $pmsg = "Oops!!! You do not have the sufficient privilleges to manage this page";
  header('Location: home.php?pmsg='.$pmsg);
  exit;
}
//print_r($_SESSION['privilege']);
//exit;
include("conn.php");
$adminid = $_SESSION['rec'];
?>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">  

  <title><?php echo $_SESSION['swtitle']; ?></title>

  <link rel="stylesheet" href="../lib/Hover/hover.css">
  <link rel="stylesheet" href="../lib/fontawesome/css/font-awesome.css">
  <link rel="stylesheet" href="../lib/weather-icons/css/weather-icons.css">
  <link rel="stylesheet" href="../lib/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="../lib/jquery-toggles/toggles-full.css">
  <link rel="stylesheet" href="../lib/morrisjs/morris.css">
  <link rel="stylesheet" href="../lib/summernote/summernote.css">
  <link rel="stylesheet" href="../lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.css">

  <link rel="stylesheet" href="../css/quirk.css">

  <script src="../lib/modernizr/modernizr.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body>

<header>
  <div class="headerpanel">

    <div class="logopanel">
        <h2><a href="./?lnk=home">ekitiParapo<!--<img height="55" src="images/cdllogo.png" />--></a></h2>
    </div><!-- logopanel -->

    <div class="headerbar">

      <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


      <div class="header-right">
          <ul class="headermenu">
            <li>
              <div id="noticePanel" class="btn-group">
                <!--<button class="btn btn-notice alert-notice" data-toggle="dropdown">
                  <i class="fa fa-globe"></i>
                </button>-->
                <div id="noticeDropdown" class="dropdown-menu dm-notice pull-right">
                  <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active"><a data-target="#notification" data-toggle="tab">Notifications (2)</a></li>
                      <li><a data-target="#reminders" data-toggle="tab">Reminders (4)</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="notification">
                        <ul class="list-group notice-list">
                          
                          
                        </ul>
                        <a class="btn-more" href="#">View More Notifications <i class="fa fa-long-arrow-right"></i></a>
                      </div><!-- tab-pane -->

                      <div role="tabpanel" class="tab-pane" id="reminders">
                        <h1 id="todayDay" class="today-day">...</h1>
                        <h3 id="todayDate" class="today-date">...</h3>

                        <h5 class="today-weather"><i class="wi wi-hail"></i> Cloudy 77 Degree</h5>
                        <p>Thunderstorm in the area this afternoon through this evening</p>

                        <h4 class="panel-title">Upcoming Events</h4>
                        <ul class="list-group">
                          
                        </ul>
                        <a class="btn-more" href="#">View More Events <i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-logged" data-toggle="dropdown">
                  <img src="pics/user.png" alt="" />
                  <?php echo $_SESSION['name']; ?>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                  <li><a href="#" data-toggle="modal" data-target="#myPassword"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
                  <!--<li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>-->
                  <li><a href="./?lnk=logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div><!-- header-right -->
      </div><!-- headerbar -->
    </div><!-- header-->
</header>

<section>

  <div class="leftpanel">
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->

      <div class="media leftpanel-profile">
        <div class="media-left">
          <a href="#">
              <img src="pics/user.png" alt="" class="media-object img-circle">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $_SESSION['name']; ?> <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
          <span><?php //echo $_SESSION['who']; ?></span>
        </div>
      </div><!-- leftpanel-profile -->

      <!--<div class="leftpanel-userinfo collapse" id="loguserinfo">        
        <h5 class="sidebar-title">Contact</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <label class="pull-left">Las Login</label>
            <span class="pull-right"><?php //echo $ezzzy->getval("id",$adminid,"_accounts","lastlogin"); ?></span>
          </li>
          <li class="list-group-item">
            <label class="pull-left">Mobile</label>
            <span class="pull-right"><?php //echo $ezzzy->getval("id",$adminid,"_accounts","phone"); ?></span>
          </li>
          <li class="list-group-item">
            <label class="pull-left">Social</label>
            <div class="social-icons pull-right">
              <a href="#"><i class="fa fa-facebook-official"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
          </li>
        </ul>--
      </div><!-- leftpanel-userinfo -->

      <ul class="nav nav-tabs nav-justified nav-sidebar">
        <li class="tooltips active" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
        <!--<li class="tooltips <?php// if($dmail_count>0) { ?>unread<?php// } ?>" data-toggle="tooltip" title="Check Mail"><a data-toggle="tab" data-target="#emailmenu"><i class="tooltips fa fa-envelope"></i></a></li>
        <li class="tooltips" data-toggle="tooltip" title="Settings"><a data-toggle="tab" data-target="#settings"><i class="fa fa-cog"></i></a></li>-->
        <li class="tooltips" data-toggle="tooltip" title="Log Out"><a href="./?lnk=logout"><i class="fa fa-sign-out"></i></a></li>
      </ul>

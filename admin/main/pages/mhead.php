<?php
session_name("SuperAdmin");
session_start();
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    header('Location: signin.php');
    exit;
}
if ($_SESSION['who'] != "sadmin" && !in_array($prev, $_SESSION['privilege'])) {
    $pmsg = "Oops!!! You do not have the sufficient privilleges to manage this page";
    header('Location: home.php?pmsg=' . $pmsg);
    exit;
}
include("conn.php");
$adminid = $_SESSION['rec'];
$action = @$_GET['action'];
$row = $ezzzy->getrow("id",$adminid,"dir_members");
$myphoto = "";
//$myphoto = $ezzzy->getval("id",$adminid,"dir_members","photo");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/favicon.png" type="image/png">

        <title><?php echo $_SESSION['name']; ?> | </title>

        <link rel="stylesheet" href="../lib/Hover/hover.css">
        <link rel="stylesheet" href="../lib/fontawesome/css/font-awesome.css">
        <link rel="stylesheet" href="../lib/weather-icons/css/weather-icons.css">
        <link rel="stylesheet" href="../lib/ionicons/css/ionicons.css">
        <link rel="stylesheet" href="../lib/jquery-toggles/toggles-full.css">
        <link rel="stylesheet" href="../lib/morrisjs/morris.css">

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
                    <h2><a href="dashboard.php"><img src="logos/20180513184750-nnss_logo-150x150.jpg" width="215" height="60"></a></h2>
                </div><!-- logopanel -->

                <div class="headerbar">

                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


                    <div class="header-right">
                        <ul class="headermenu">
                            <li>
                                <div id="noticePanel" class="btn-group">
                                    <button class="btn btn-notice" data-toggle="dropdown">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </div>
                            </li>                            <li>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                        <?php echo $_SESSION['name']; ?><span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#" data-toggle="modal" data-target="#myPassword"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
                                        <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div><!-- header-right -->
                </div><!-- headerbar -->
            </div><!-- header-->
        </header>

        <section><div class="leftpanel">
                <div class="leftpanelinner">

                    <!-- ################## LEFT PANEL PROFILE ################## -->

                    <div class="media leftpanel-profile">

                        <div class="media-body">
                            <h4 class="media-heading">Hello <?php echo $_SESSION['name']; ?>! <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
                        </div>
                    </div><!-- leftpanel-profile -->

                    <div class="leftpanel-userinfo collapse" id="loguserinfo">

                        <h5 class="sidebar-title">Contact</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label class="pull-left">Email</label>
                                <span class="pull-right">nnss/ph/21/3165</span>
                            </li>
                            <li class="list-group-item">
                                <label class="pull-left">Mobile</label>
                                <span class="pull-right"></span>
                            </li>
                        </ul>
                    </div><!-- leftpanel-userinfo -->


                    <ul class="nav nav-tabs nav-justified nav-sidebar">
                        <li class="tooltips active" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
                        <li class="tooltips" data-toggle="tooltip" title="Log Out"><a href="logout.php"><i class="fa fa-sign-out"></i></a></li>
                    </ul>


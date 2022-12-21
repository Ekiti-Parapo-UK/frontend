<?php
$shet = "home";
$prev = "home";
include_once("pages/phead.php");
include_once("pages/pleft.php");
?>

</div><!-- leftpanelinner -->
</div><!-- leftpanel -->

<div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

        <div class="row">
            <div class="col-md-9 col-lg-8 dash-left">
                <?php if (isset($_REQUEST['msg']) && $_REQUEST['msg'] !== '') { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?php echo $_REQUEST['msg']; ?></strong>
                    </div>
                <?php } ?>
                <div class="panel panel-announcement">
                    <ul class="panel-options">
                        <li><a><i class="fa fa-refresh"></i></a></li>
                        <li><a class="panel-remove"><i class="fa fa-remove"></i></a></li>
                    </ul>
                    <div class="panel-heading">
                        <h4 class="panel-title">Latest Announcement</h4>
                    </div>
                    <div class="panel-body">
                        <h2>The new Title</h2>
                        <h4>The Little New <a href="#">More</a></h4>
                    </div>
                </div><!-- panel -->

                <div class="row panel-quick-page">
                    <div class="col-xs-4 col-sm-5 col-md-4 page-user">
                        <div class="panel" onClick="javascript:location.href = 'server_scholar.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">Administrators Directory</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-person-stalker"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 page-products">
                        <div class="panel" onClick="javascript:location.href = 'server_blog.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">Blog</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon icon ion-clock"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-2 page-events">
                        <div class="panel" onClick="javascript:location.href = 'server_faq.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">FAQs</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="fa fa-wheelchair"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-2 page-messages">
                        <div class="panel" onClick="javascript:location.href = 'sys_mroles.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">Roles</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-medkit"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-5 col-md-2 page-reports">
                        <div class="panel" onClick="javascript:location.href = 'server_gallery.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">Photos</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="fa fa-photo"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 page-statistics">
                        <div class="panel" onClick="javascript:location.href = 'server_testimony.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">Testimonials</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-ios-pulse-strong"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 page-support">
                        <div class="panel" onClick="javascript:location.href = 'server_news.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">News</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="fa fa-comments"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 page-privacy">
                        <div class="panel" onClick="javascript:location.href = 'server_events.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">Events</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 page-settings">
                        <div class="panel" onClick="javascript:location.href = 'sett_siteinfo.php'">
                            <div class="panel-heading" align="center">
                                <h4 class="panel-title">Site Info</h4>
                            </div>
                            <div class="panel-body">
                                <div class="page-icon"><i class="icon ion-gear-a"></i></div>
                            </div>
                        </div>
                    </div>

                    <?php if ($_SESSION["position"] == 'Staff' && mysqli_num_rows(mysqli_query($con, "select id from dir_staff where account='$account' and email='$em' and privs like '%acc%'")) == 0) {
                        ?>
                        <div class="col-xs-4 col-sm-5 col-md-4 page-user">
                            <div class="panel" onClick="javascript:location.href = 'library.php'">
                                <div class="panel-heading" align="center">
                                    <h4 class="panel-title">Library Manager</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="page-icon"><i class="glyphicon glyphicon-book"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 page-statistics">
                            <div class="panel" onClick="javascript:location.href = 'inventory.php'">
                                <div class="panel-heading" align="center">
                                    <h4 class="panel-title">Inventory Manager</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="page-icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 page-events">
                            <div class="panel" onClick="javascript:location.href = 'transport.php'">
                                <div class="panel-heading" align="center">
                                    <h4 class="panel-title">Fleet Manager</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="page-icon"><i class="fa fa-bus"></i></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div><!-- row -->

                <?php if ($_SESSION["position"] == "Administrator" or $_SESSION["position"] == "Staff") {
                    ?>
                    <div class="row row-col-join panel-earnings">
                        <div class="col-xs-3 col-sm-4 col-lg-3">
                            <div class="panel">
                                <ul class="panel-options">
                                    <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                                </ul>
                                <div class="panel-heading">
                                    <h4 class="panel-title">Total Income</h4>
                                </div>
                                <div class="panel-body">
                                    <?php if ($tincome > 0) { ?>
                                        <h3 class="earning-amount"><?php echo @$_SESSION['currency']; ?><?php echo str_replace('.00', '', number_format($tincome, 2, '.', ',')); ?></h3>
                                        <h4 class="earning-today"><?php echo date('F, Y'); ?></h4>
                                    <?php } else { ?>
                                        <h3 class="earning-amount"><?php echo @$_SESSION['currency']; ?>0.00</h3>
                                        <h4 class="earning-today"><?php echo date('F, Y'); ?></h4>
                                    <?php } ?>

                                    <ul class="list-group">
                                        <li class="list-group-item">Expenses <span class="pull-right"><?php echo @$_SESSION['currency']; ?><?php echo number_format($texpenses, 2, '.', ','); ?></span></li>
                                        <li class="list-group-item"><b><?php echo $nlabel; ?> <span class="pull-right"><?php echo @$_SESSION['currency']; ?><?php echo number_format($ndiff, 2, '.', ','); ?></span></b></li>
                                    </ul>
                                    <hr class="invisible">
                                    <a href="acc_pl.php?recmon=<?php echo date('M'); ?>&recyear=<?php echo date('Y'); ?>" class="btn btn-primary btn-block"> Profit &amp; Loss Account </a>
                                </div>
                            </div><!-- panel -->
                        </div>
                        <div class="col-xs-9 col-sm-8 col-lg-9">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Traffic Overview</h4>
                                </div>
                                <div class="panel-body">
                                    <div id="line-chart" class="body-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div><!-- col-md-9 -->
            <?php include_once("pages/pright.php"); ?>
        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->

</section>

<?php
include_once("pages/pfooter.php");

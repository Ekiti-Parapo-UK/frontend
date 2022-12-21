<?php
$shet = "home";
$prev = "home";
include_once('pages/mhead.php');
include_once('pages/mleft.php');
$id = $adminid;
$fullname = $row['name'];
$regno = $row['regno'];
$dob = $row['dob'];
$sex = $row['sex'];
$nationality = $ezzzy->getval("id",$row['nationality'],"countries","name");
$country = $ezzzy->getval("id",$row['country'],"countries","name");
$chapter = $ezzzy->getval("id",$row['chapter'],"states","name");
$town = $ezzzy->getval("id",$row['town'],"cities","name");
$senated = $ezzzy->getval("id",$row['senated'],"senated","name");
?>

</div><!-- leftpanelinner -->
</div><!-- leftpanel --><!-- Modal -->


<div class="mainpanel">

    <div class="contentpanel">

        <div class="row profile-wrapper">
            <div class="col-xs-12 col-md-3 col-lg-2 profile-left">

                <div class="profile-left-heading">
                    <ul class="panel-options">
                        <li><a href="#"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                    <a href="#" class="profile-photo">
                        <img class='img-circle img-responsive' src='pics/user.png' alt=''></a>
                    <h2 class="profile-name">
                        <?php echo $_SESSION['name']; ?></h2>
                    <h4 class="profile-designation"><?php echo $regno; ?></h4>

                    <ul class="list-group">
                        <li class="list-group-item">Reg. No <a href="#"><?php echo $regno; ?></a></li>
                        <li class="list-group-item">Chapter <a href="#"><?php echo $chapter; ?></a></li>
                        <li class="list-group-item">Town <a href="#"><?php echo $town; ?></a></li>
                    </ul>
                </div>

                <div class="profile-left-body">

                    <h4 class="panel-title">Birthday</h4>
                    <p><i class="glyphicon glyphicon-calendar mr5"></i> <?php echo $dob; ?></p>

                    <hr class="fadeout">

                    <h4 class="panel-title">Gender</h4>
                    <p><i class="glyphicon glyphicon-user mr5"></i> <?php echo $sex; ?></p>

                    <hr class="fadeout">

                </div>
            </div>

            <?php
            if ($action == "") {
                include_once("m_profile.php");
            }
            ?>

            <div class="col-md-3 col-lg-2 profile-sidebar">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="panel panel-primary list-announcement">
                            <div class="panel-heading">
                                <h4 class="panel-title">News Feed</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled mb20">
                                    <?php /* $rec = $ezzzy->runQuery("SELECT id, title, descr, durl, iauthor, category, dtime, downloads from newsfeed where account='$account' order by id desc limit 5");
                                      //while (@list($sid, $title, $descr, $durl, $iauthor, $category, $dtime, $downloads) = mysqli_fetch_row($rec)) {
                                      foreach ($rec as $recordset) {
                                      $sid = $recordset['id'];
                                      $title = $recordset['title'];
                                      $descr = $recordset['descr'];
                                      $durl = $recordset['durl'];
                                      $iauthor = $recordset['iauthor'];
                                      $category = $recordset['category'];
                                      $dtime = $recordset['dtime'];
                                      $downloads = $recordset['downloads'];
                                      include("newsfeed_read.php");
                                      ?>
                                      <li>
                                      <a href="#" data-toggle="modal" data-target="#myModalView<?php echo $sid; ?>"><?php echo $title; ?></a>
                                      <small><?php echo $dtime; ?></small>
                                      </li>
                                      <?php } */ ?>					

                                </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="newsfeed_std.php" class="btn btn-primary btn-block">View More Updates <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>


                </div><!-- row -->

            </div>
        </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->
<?php
include_once("pages/pfooter.php");

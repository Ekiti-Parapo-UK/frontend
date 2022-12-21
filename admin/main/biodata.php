<?php
include_once("pages/nhead.php");
include_once("pages/nleft.php");
$row = $ezzzy->getrow("id",$adminid,"dir_students");
$pgid = $row['pgid'];
$lvlid = $row['lvlid'];
$action = @$_REQUEST['action'];
?>
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->
    
    <div class="contentpanel">

        <div class="row profile-wrapper">
          <div class="col-xs-12 col-md-3 col-lg-2 profile-left">
            <div class="profile-left-heading">
              <ul class="panel-options">
                <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
              </ul>
              <a href="#" class="profile-photo"><img class="img-circle img-responsive" src="../images/photos/profilepic.png" alt=""></a>
              <h2 class="profile-name"><?php echo $_SESSION['name']; ?></h2>
              <h4 class="profile-designation"><?php echo $row['regno']; ?></h4>

              <ul class="list-group">
                <!--<li class="list-group-item">College: <a href="#"></a></li>
                <li class="list-group-item">Faculty: <a href="#"></a></li>
                <li class="list-group-item">Department <a href="#"></a></li>
                <li class="list-group-item">Programme: <a href="#"></a></li>
                <li class="list-group-item">Current Level: <a href="#"></a></li>-->
              </ul>


              <!--<button class="btn btn-danger btn-quirk btn-block profile-btn-follow">Follow</button>-->
            </div>
            <div class="profile-left-body">
              <hr class="fadeout">
              <h4 class="panel-title">College</h4>
              <p><i class="glyphicon glyphicon-book mr5"></i> <?php echo $ezzzy->getval("id",$row['colid'],"colleges","name"); ?></p>
              
              <hr class="fadeout">
              <h4 class="panel-title">Faculty</h4>
              <p><i class="glyphicon glyphicon-book mr5"></i> <?php echo $ezzzy->getval("id",$row['fid'],"faculties","name"); ?></p>
              
              <hr class="fadeout">
              <h4 class="panel-title">Department</h4>
              <p><i class="glyphicon glyphicon-book mr5"></i> <?php echo $ezzzy->getval("id",$row['did'],"departments","name"); ?></p>
              
              <hr class="fadeout">
              <h4 class="panel-title">Programme</h4>
              <p><i class="glyphicon glyphicon-book mr5"></i> <?php echo $ezzzy->getval("id",$row['pgid'],"programmes","name"); ?></p>
              
              <hr class="fadeout">
              <h4 class="panel-title">Current Level</h4>
              <p><i class="glyphicon glyphicon-book mr5"></i> <?php echo $ezzzy->getval("id",$row['lvlid'],"levels","name"); ?></p>
              
              <hr class="fadeout">
              <h4 class="panel-title">Email</h4>
              <p><i class="glyphicon glyphicon-book mr5"></i> <?php echo $row['email']; ?></p>

              <hr class="fadeout">

              <h4 class="panel-title">Phone</h4>
              <p><i class="glyphicon glyphicon-phone mr5"></i> <?php echo $row['phone']; ?></p>

              <hr class="fadeout">

              <h4 class="panel-title">Social</h4>
              <ul class="list-inline profile-social">
                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>

            </div>
          </div>
           <!--Beginning of my main content-->
            <?php
            if ($action == '') {
                include("editbio.php");
            } else if ($action == "invoice") {
                include('changepic.php');
            }
            ?>
           <!--Ending of my main content--> 
          <div class="col-md-3 col-lg-2 profile-sidebar">
            <div class="row">
              <div class="col-sm-6 col-md-12">
                <div class="panel">
                  <div class="panel-heading">
                    <h4 class="panel-title">People You May Know</h4>
                  </div>
                  <div class="panel-body">
                    <ul class="media-list user-list">
                      <li class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object img-circle" src="../images/photos/user9.png" alt="">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#">Ashley T. Brewington</a></h4>
                          <span>5,323</span> Followers
                        </div>
                      </li>
                    </ul>
                  </div>
                </div><!-- panel -->
              </div>
              <div class="col-sm-6 col-md-12">
                <div class="panel">
                  <div class="panel-heading">
                    <h4 class="panel-title">Following Activity</h4>
                  </div>
                  <div class="panel-body">
                    <ul class="media-list user-list">
                      <li class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object img-circle" src="../images/photos/user2.png" alt="">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading nomargin"><a href="#">Floyd M. Romero</a></h4>
                          is now following <a href="#">Christina R. Hill</a>
                          <small class="date"><i class="glyphicon glyphicon-time"></i> Just now</small>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div><!-- panel -->
              </div>
            </div><!-- row -->

          </div>
        </div><!-- row -->

    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

</section>

<?php include_once("pages/pfooter.php");

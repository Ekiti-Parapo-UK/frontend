<?php
$module = "registry";
$typ = "delstaff"; //when we want to delete
$shet = "staff";
$serveradd = $_SERVER['REQUEST_URI']; //when we want to delete
include_once("pages/phead.php");
include_once("pages/pleft.php");
$action = @$_REQUEST['action'];
$recid = $_GET['id'];
$row = $ezzzy->getrow("id",$recid,"dir_staff");
//let us get the members privilleges
$mpri = $ezzzy->getOne("SELECT privss fROM _accounts WHERE uid='$recid' and position='Staff'");
$mpriv = explode(",", $mpri['privss']);
$mprivs = array();
for($z = 0; $z < count($mpriv); $z++){
    $mprivs[] = $ezzzy->getval("id",$mpriv[$z],"privss","rolename");        
}
?>



</div><!-- leftpanelinner -->
</div><!-- leftpanel -->

<div class="mainpanel">

    <div class="contentpanel">

        <div class="row profile-wrapper">
            <div class="col-xs-12 col-md-3 col-lg-2 profile-left">
                <div class="profile-left-heading">
                    <ul class="panel-options">
                        <li><a href="staff_view_details.php?id=<?php echo $recid; ?>&action=changepic" title="click to change picture"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                    <a href="staff_view_details.php?id=<?php echo $recid; ?>&action=changepic" class="profile-photo" title="click to change picture">
                        <img class='img-circle img-responsive' src='pics/user.png' alt=''>
                    </a>
                    <h2 class="profile-name" onClick="javascript:location.href = 'staff_view_details.php?id=<?php echo $recid; ?>'" style="cursor:pointer" title="click to refresh profile">
                        <?php echo ucwords($row['fullname']); ?></h2>
                    <h4 class="profile-designation"><?php echo ucwords($row["isection"]); ?></h4>

                    <ul class="list-group">
                        <li class="list-group-item">Staff. ID: <a href="#"><?php echo $row['scode']; ?></a></li>
                        <li class="list-group-item">GENDER: <a href="#"><?php echo $row['gender']; ?></a></li>
                        <li class="list-group-item">BIRTHDAY: <a href="#"><?php echo $row['dobdd']; ?></a></li>
                        <li class="list-group-item">CATEGORY: <a href="#"><?php echo $row['iposition']; ?></a></li>
                        <li class="list-group-item">RELIGION: <a href="#"><?php echo $row['religion']; ?></a></li>
                    </ul>

                    <!--<a href="std_view_details.php?id=<?php //echo $recid; ?>&action=setclass" class="btn btn-danger btn-quirk btn-block profile-btn-follow">Class Setting</a>-->
                    <!--<a href="std_view_details.php?id=<?php //echo $recid; ?>&amp;action=enroll" class="btn btn-warning btn-quirk btn-block profile-btn-follow">Course Enrollment</a>-->
                    <!--<a href="std_view_details.php?id=<?php //echo $recid; ?>&amp;id=<?php //echo $id; ?>&action=recordsc&jclass=<?php //echo $iclass; ?>&jgroup=<?php //echo $igroup; ?>" class="btn btn-success btn-quirk btn-block profile-btn-follow">Record Scores</a>-->
                </div>
                <div class="profile-left-body">

                    <h4 class="panel-title">Birthday</h4>
                    <p><i class="glyphicon glyphicon-calendar mr5"></i> <?php //echo $dobdd; ?>-<?php //echo $dobmm; ?>-<?php //echo $dobyyyy; ?></p>

                    <hr class="fadeout">

                    <h4 class="panel-title">Gender</h4>
                    <p><i class="glyphicon glyphicon-user mr5"></i> <?php echo $row['sex']; ?></p>

                    <hr class="fadeout">
                    
                    <h4 class="panel-title">Roles</h4>
                    <p><i class="glyphicon glyphicon-user mr5"></i> <?php echo implode(",", $mprivs); ?></p>

                    <hr class="fadeout">

                </div>
            </div>

            <?php
            if ($action == '') {
                include("staff_profile.php");
            } else if ($action == "privs") {
                include('staff_profile_privs.php');
            }else if ($action == "courses") {
                include('staff_profile_courses.php');
            } else if ($action == 'setprofile') {
                include("staff_profile_edit.php");
            } else if ($action == 'setlogin') {
                include("staff_profile_login.php");
            } else if ($action == 'changepic') {
                include("staff_changepic.php");
            }
            ?>


            <div class="col-md-3 col-lg-2 profile-sidebar">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="panel">

                            <div class="panel-body">
                                <a href="staff_view_details.php?id=<?php echo $recid; ?>&action=privs" class="btn btn-success btn-quirk btn-block profile-btn-follow">Manage Privileges</a>
                                <a href="staff_view_details.php?id=<?php echo $recid; ?>&action=courses" class="btn btn-success btn-quirk btn-block profile-btn-follow">Manage Courses</a>
                                <a data-toggle="modal" data-target="#myModalSendMsg<?php echo $id; ?>&amp;who=staff" class="btn btn-success btn-quirk btn-block profile-btn-follow">Send Message</a>
                                <a href="staff_view_details.php?id=<?php echo $recid; ?>&action=setprofile" class="btn btn-success btn-quirk btn-block profile-btn-follow">Edit Profile</a>
                                <a href="staff_view_details.php?id=<?php echo $recid; ?>&action=changepic&amp;who=staff" class="btn btn-success btn-quirk btn-block profile-btn-follow">Change Picture</a>
                                <a href="staff_view_details.php?id=<?php echo $recid; ?>&action=setlogin&amp;who=staff" class="btn btn-success btn-quirk btn-block profile-btn-follow">Login Manager</a>
                                <a href="#" data-toggle="modal" data-target="#myModalDeactivate<?php echo $id; ?>" class="btn btn-danger btn-quirk btn-block profile-btn-follow">Deactivate Profile</a>

                            </div>
                        </div><!-- panel -->
                    </div>

                </div><!-- row -->

            </div>
        </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->

</section>

<?php
include_once("pages/pfooter.php");

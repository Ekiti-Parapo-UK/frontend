<?php
$module = "registry";
$typ = "delmem"; //when we want to delete
$shet = "member";
$prev = "mmemprof";
$serveradd = $_SERVER['REQUEST_URI']; //when we want to delete
include_once("pages/phead.php");
include_once("pages/pleft.php");
$action = @$_REQUEST['action'];
$recid = $_GET['id'];
$row = $ezzzy->getrow("id",$recid,"dir_members");
if(isset($_GET['todo']) && $_GET['todo'] == "bypassp"){
    //we shall set the astatus=ACTIVE/INACTIVE
    $perform = $_GET['perform'];    
    $ezzzy->runQuery("UPDATE dir_members SET astatus='$perform' WHERE id='$recid'");
    $_SESSION["msg"] = "School fees payment has been bypassed for the said student";
}//end of the if stament that says we are by passing the student payment
?>



</div><!-- leftpanelinner -->
</div><!-- leftpanel -->

<div class="mainpanel">

    <div class="contentpanel">

        <div class="row profile-wrapper">
            <div class="col-xs-12 col-md-3 col-lg-2 profile-left">
                <div class="profile-left-heading">
                    <ul class="panel-options">
                        <li><a href="mem_view_details.php?id=<?php echo $recid; ?>&action=changepic" title="click to change picture"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                    <a href="mem_view_details.php?id=<?php echo $recid; ?>&action=changepic" class="profile-photo" title="click to change picture">
                        <img class='img-circle img-responsive' src='pics/user.png' alt=''>
                    </a>
                    <h2 class="profile-name" onClick="javascript:location.href = 'mem_view_details.php?id=<?php echo $recid; ?>'" style="cursor:pointer" title="click to refresh profile">
                        <?php echo ucwords($row['name']); ?></h2>
                    <h4 class="profile-designation"><?php //echo ucwords($isection); ?></h4>

                    <ul class="list-group">
                        <li class="list-group-item">Reg. No: <a href="#"><?php echo $row['regno']; ?></a></li>
                        <li class="list-group-item">Chapter: <a href="#"><?php echo $ezzzy->getval("id",$row['chapter'],"states","name"); ?></a></li>
                        <li class="list-group-item">Town: <a href="#"><?php echo $ezzzy->getval("id",$row['town'],"cities","name"); ?></a></li>
                    </ul>

                    <!--<a href="mem_view_details.php?id=<?php echo $recid; ?>&action=setclass" class="btn btn-danger btn-quirk btn-block profile-btn-follow">Class Setting</a>
                    <a href="mem_view_details.php?id=<?php echo $recid; ?>&amp;action=enroll" class="btn btn-warning btn-quirk btn-block profile-btn-follow">Subject Enrollment</a>
                    <a href="mem_view_details.php?id=<?php echo $recid; ?>&amp;id=<?php echo $recid; ?>&action=recordsc&jclass=<?php //echo $row['iclass']; ?>&jgroup=<?php //echo $row['igroup']; ?>" class="btn btn-success btn-quirk btn-block profile-btn-follow">Record Scores</a>-->
                </div>
                <div class="profile-left-body">

                    <h4 class="panel-title">Birthday</h4>
                    <p><i class="glyphicon glyphicon-calendar mr5"></i> <?php echo $row["dob"]; ?>-<?php //echo $row["dobmm"]; ?>-<?php //echo $row["dobyyyy"]; ?></p>

                    <hr class="fadeout">

                    <h4 class="panel-title">Gender</h4>
                    <p><i class="glyphicon glyphicon-user mr5"></i> <?php echo $row['sex']; ?></p>

                    <hr class="fadeout">

                </div>
            </div>

            <?php
            if ($action == '') {
                include("mem_profile.php");
            } else if ($action == 'setprofile') {
                include("mem_profile_edit1.php");
            } else if ($action == 'setlogin') {
                include("mem_profile_login.php");
            } else if ($action == 'payhistory') {
                include("mem_payhistory.php");
            } else if ($action == 'confirmetranspay') {
                include("confirmetranspay.php");
            }
            ?>


            <div class="col-md-3 col-lg-2 profile-sidebar">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="panel">

                            <div class="panel-body">
                                <a href="mem_view_details.php?id=<?php echo $recid; ?>&action=payhistory" class="btn btn-success btn-quirk btn-block profile-btn-follow">Payment History</a>
                                <hr />
                                <!--<a href="disc_manager.php?id=<?php echo $recid; ?>&scode=<?php echo $scode; ?>" class="btn btn-success btn-quirk btn-block">Disciplinary Records</a>-->
                                <hr />                                
                                <a href="#" data-toggle="modal" data-target="#myModalMsg" class="btn btn-success btn-quirk btn-block profile-btn-follow">Send Message</a>
                                <a href="mem_view_details.php?id=<?php echo $recid; ?>&action=setprofile" class="btn btn-success btn-quirk btn-block profile-btn-follow">Bio-Data Manager</a>
                                <a href="mem_view_details.php?id=<?php echo $recid; ?>&action=setlogin" class="btn btn-success btn-quirk btn-block profile-btn-follow">Login Manager</a>
                                <a target="_stdlogin" href="check_login.php?id=<?php echo $recid; ?>&username=<?php echo $ezzzy->getval("id",$recid,"dir_members","username"); ?>&password=<?php echo $ezzzy->getval("id",$recid,"dir_members","password"); ?>" class="btn btn-success btn-quirk btn-block profile-btn-follow">Login as Member</a>
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

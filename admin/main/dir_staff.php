<?php
$module = "registry";
$typ = "delstaff"; //when we want to delete
$shet = "staff";
$prev = "mstfprof";
$serveradd = $_SERVER['REQUEST_URI']; //when we want to delete
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
        <b>
            <ol class="breadcrumb breadcrumb-quirk">
                <li><a href="./?lnk=home"><i class="fa fa-home mr5"></i> Dashboard</a></li>
                <li><a href="#">Registries</a></li>
                <li class="active">Staff Directory</li>
            </ol>
        </b>

        <div class="row">
            <div class="col-sm-8 col-md-9 col-lg-10 people-list">
                <div class="people-options clearfix">
                    <div class="btn-toolbar pull-left">
                        <label class="btn btn-default btn-quirk" onClick="javascript:location.href = 'dir_staff.php'">STAFF DIRECTORY</label>                        
                        <button type="button" class="btn btn-success btn-quirk" data-toggle="modal" data-target="#myModalNewStaff"> Add Staff <i class="fa fa-user-plus"></i> </button>
                        <button type="button" class="btn btn-warning btn-quirk" data-toggle="modal" data-target="#myModalUploadStaff"> Upload Staff <i class="fa fa-upload"></i> </button>
                    </div>

                    <div class="btn-group pull-right people-pager">
                        <a href="./?lnk=dir_staff" class="btn btn-default" title="click to view directory of active staff"><i class="glyphicon glyphicon-user"></i></a>
                        <a href="#" class="btn btn-default-active" title="click to view archive (disabled profiles of staff)"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>


                    <span class="people-count pull-right">Total Number of Active Staff:  <strong><?php //echo $ptotal;  ?></strong></span>
                </div><!-- people-options -->

                <b><?php echo $_SESSION["msg"]; ?></b>
                <!--This is the beginning of my main contents-->
                <?php
                $recs = "";
                    if(isset($_POST['filter'])){
                        
                    }
                    else{
                        $recs = $ezzzy->runQuery("SELECT * FROM dir_staff order by rand() limit 30");
                    }
                    foreach($recs as $row){
                ?>
                <div class="panel panel-profile list-view">
                    <div class="panel-heading">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class='media-object img-circle' src='pics/user.png' alt=''>";
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="staff_view_details.php?id=<?php echo $row['id'];  ?>" title="click to view profile"><?php echo ucwords($row['name']);  ?></a></h4>
                                <p class="media-usermeta">Staff ID: <?php echo $row['staffid'];  ?> ...  Current <?php //echo ucwords($lab4);  ?>: <?php //echo $iclass;  ?> ... Date Employed: <?php //echo $date_admit;  ?></p>
                            </div>
                        </div><!-- media -->
                        <ul class="panel-options">
                            <li><a class="tooltips" href="staff_view_details.php?id=<?php echo $row['id'];  ?>" data-toggle="tooltip" title="View Profile"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                        </ul>
                    </div>
                    <div class="panel-body people-info">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="info-group">
                                    <label>Gender</label>
                                    <?php echo ucwords($row['sex']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="info-group">
                                    <label>Birthday</label>
                                    <?php //echo $dobdd; ?> - <?php //echo $dobmm; ?> - <?php //echo $dobyyyy; ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="info-group">
                                    <label>State of Origin</label>
                                    <?php echo $row['state']; ?> (<?php echo $row['lga']; ?>)
                                </div>
                            </div>
                        </div><!-- row -->

                    </div>
                </div><!-- panel -->
                <?php
                    }//end of the while loop that brings for the staff
                ?>
                
                    <!--We shall now work on the pagination-->
                    <?php /*
                        if ($nume > $limit) {
                                    ?>
                                    <div class="pagination-bar text-center">
                                        <ul class="pagination">
                                            <?php
                                            if ($nume > $limit) {
                                                $i = 0;
                                                $l = 1;
                                                for ($i = 0; $i < $nume; $i = $i + $limit) {
                                                    if ($i <> $eu) {
                                                        echo " <li><a href='$page_name?start=$i&search={$search}&iclass={$jclass}&igroup={$jgroup}&isection={$jsection}&imale={$jmale}&ifemale={$jfemale}' title='click to navigate to this page'>$l</a></li> ";
                                                    } else {
                                                        echo " <li  class='active'><a href='#'>$l</a></li>";
                                                    }
                                                    $l = $l + 1;
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                    <?php } //*/ ?>
                    <!--/We shall now work on the pagination-->
                <!--/This is the ending of my main contents-->
            </div><!-- col-md-9 -->
            <?php
            if($module == "registry"){
                include_once("pages/stdright.php"); 
            }
            else{
                include_once("pages/pright.php"); 
            }
            ?>
        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->

</section>

<?php
include_once("pages/pfooter.php");
include("new_staff.php");
include("uploadstaff.php");

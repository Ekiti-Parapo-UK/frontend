<?php
$module = "registry";
$typ = "delstd"; //when we want to delete
$shet = "student";
$prev = "mstdprof";
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
                <li class="active">Students Directory</li>
            </ol>
        </b>

        <div class="row">
            <div class="col-sm-8 col-md-9 col-lg-10 people-list">
                <div class="people-options clearfix">
                    <div class="btn-toolbar pull-left">
                        <label class="btn btn-default btn-quirk" onClick="javascript:location.href = 'dir_students.php'">STUDENTS DIRECTORY</label>                        
                        <button type="button" class="btn btn-success btn-quirk" data-toggle="modal" data-target="#myModalNewStudent"> Add Student <i class="fa fa-user-plus"></i> </button>
                        <button type="button" class="btn btn-warning btn-quirk" data-toggle="modal" data-target="#myModalUploadStudent"> Upload Students <i class="fa fa-upload"></i> </button>
                    </div>

                    <div class="btn-group pull-right people-pager">
                        <a href="./?lnk=dir_students" class="btn btn-default" title="click to view directory of active students"><i class="glyphicon glyphicon-user"></i></a>
                        <a href="#" class="btn btn-default-active" title="click to view archive (disabled profiles of students)"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>


                    <span class="people-count pull-right">Total Number of Active Students:  <strong><?php //echo $ptotal;  ?></strong></span>
                </div><!-- people-options -->

                <b><?php echo $_SESSION["msg"]; ?></b>
                <!--This is the beginning of my main contents-->
                <?php
                $recs = "";
                    if(isset($_POST['filter'])){
                        //get all the parsed parameter
                        $lvll = $_POST['lvl'];
                        $col = $_POST['col'];
                        $fac = $_POST['fac'];
                        $deps = $_POST['deps'];
                        $pgs = $_POST['pgs'];
                        $search = $_POST['search'];
                        $ye = $_POST['ye'];
                        $yg = $_POST['yg'];
                        $jmale = $_POST['imale'];
                        $jfemale = $_POST['ifemale'];
                        $jgender = "";
                        if ($jmale == '' and $jfemale == '') {
                            $jgender = '';
                        }
                        if ($jmale == 'yes' and $jfemale == 'yes') {
                            $jgender = '';
                        }
                        if ($jmale == '' and $jfemale == 'yes') {
                            $jgender = 'Female';
                        }
                        if ($jmale == 'yes' and $jfemale == '') {
                            $jgender = 'Male';
                        }
                        $recs = $ezzzy->runQuery("SELECT * FROM dir_students WHERE colid like '%$col' and fid like '%$fac%' and did like '%$deps%' and pgid like '%$pgs%' and lvlid like '%$lvll%' and (regno like '%$search%' or matricno like '%$search%' or name like '%$search%') and sex like '%$jgender%' and sessadm like '%$ye%' order by rand()");
                        //$recs = $ezzzy->runQuery("SELECT * FROM dir_students WHERE colid='$col' and fid='$fac' and did='$deps' and pgid='$pgs' and lvlid='$lvll' and regno like '%$search%' and matricno like '%$search%' and name like '%$search%' and sex like '%$jgender%' and sessadm='$ye' order by rand()");                        
                        //$recs = $ezzzy->runQuery("SELECT * FROM dir_students WHERE colid='$col' or fid='$fac' or did='$deps' or pgid='$pgs' or lvlid='$lvll' or regno like '%$search%' or matricno like '%$search%' or name like '%$search%' or sex like '%$jgender%' or sessadm='$ye' order by rand()");                        
                    }
                    else{
                        $recs = $ezzzy->runQuery("SELECT * FROM dir_students order by rand() limit 20");
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
                                <h4 class="media-heading"><a href="std_view_details.php?id=<?php echo $row['id'];  ?>" title="click to view profile"><?php echo ucwords($row['fullname']);  ?></a></h4>
                                <p class="media-usermeta">Reg. No.: <?php echo $row['scode'];  ?> ...  Current Class: <?php echo $row['iclass'];  ?> ... Date Admitted: <?php echo $row["date_admit"];  ?></p>
                            </div>
                        </div><!-- media -->
                        <ul class="panel-options">
                            <li><a class="tooltips" href="std_view_details.php?id=<?php echo $row['id'];  ?>" data-toggle="tooltip" title="View Profile"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                        </ul>
                    </div>
                    <div class="panel-body people-info">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="info-group">
                                    <label>Gender</label>
                                    <?php echo ucwords($row['gender']); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="info-group">
                                    <label>Birthday</label>
                                    <?php echo $row["dobdd"]; ?> - <?php echo $row["dobmm"]; ?> - <?php echo $row["dobyyyy"]; ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="info-group">
                                    <label>State of Origin</label>
                                    <?php echo $row['ostate']; ?> (<?php echo $row['lga']; ?>)
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
include("new_student.php");
include("uploadstudent.php");

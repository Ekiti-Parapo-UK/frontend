<?php
$module = "bursary";
$shet = "pamentrec";
$prev = "payrec";
include_once("pages/phead.php");
include_once("pages/pleft.php");
$typ = "delpayrec";//when we want to delete
$serveradd = $_SERVER['REQUEST_URI'];//when we want to delete
?>

<script type="text/javascript">
    function showLevel(str){
    //alert('I am here: '+str);
  if(str === ""){
    document.getElementById('ddepp').value="";
    return;
  }
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  }
  else{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    document.getElementById('dlvl').innerHTML = xmlhttp.responseText;
                    console.log(xmlhttp.responseText);
                }
            };
            xmlhttp.open("GET", "getlvl1.php?q=" + str, true);
            xmlhttp.send();
        }//end of the function show Dept
</script>

</div><!-- leftpanelinner -->
</div><!-- leftpanel -->

<div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

        <div class="row">
            <div class="col-md-9 col-lg-8 dash-left">
                <!--This is the beginning of my main contents-->
                <div class="row">
                    <div class="panel panel-inverse panel-site-traffic">
                        <div class="panel-heading">
                            <h4 class="panel-title"> RECORD SCORE</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you manage Scores entry for selected courses</font><br><br>
                            <strong><?php echo @$_REQUEST['msg']; ?></strong>
                            <form name="fm1" method="post" action="exm_recordsc.php" class="form-horizontal">
                                <input type="hidden" name="selectp" value="yes">
                                <table class="table-responsive" width="100%">
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF">
                                            -Department/Programme-
                                            <select name="ddepp" id="ddepp" class="form-control" required="required" onchange="showLevel(this.value);">
                                                <option value="">--select one--</option>
                                                <?php
                                                $depts = $ezzzy->runQuery("SELECT id,name FROM departments order by name asc");
                                                foreach($depts as $dept){
                                                ?>
                                                <option value="<?php echo $dept['id']."-D"; ?>"><?php echo $dept['name']; ?></option>
                                                <?php
                                                }//end of the foreach statement for the depts
                                                //we shall now get other programmes that doesnt have department*/
                                                $progs = $ezzzy->runQuery("SELECT id,name FROM programmes where did='' or did IS NULL order by name asc");
                                                foreach($progs as $prog){
                                                ?>
                                                <option value="<?php echo $prog['id']."-P"; ?>"><?php echo $prog['name']; ?></option>
                                                <?php
                                                }//end of the foreach statement for programmes
                                                ?>
                                            </select>
                                        </td>
                                        <td width="" bgcolor="#FFFFFF">
                                            -Academic Session-
                                            <select name="dsession" class="form-control" required>                                                               
                                                <option value="">--Select one--</option>
                                                <?php
                                                $se= $ezzzy->getallresult("sesses","name","A");
                                                foreach($se as $ses){
                                                ?>
                                                <option value="<?php echo $ses['id']; ?>"><?php echo $ses['name']; ?></option>
                                                <?php
                                                }//end of the foreach statement for the depts
                                                ?>
                                            </select>
                                        </td>
                                        <td width="" bgcolor="#FFFFFF">
                                            -Semester-
                                            <select name="dsem" class="form-control" required> 
                                                <option value="">--Select One--</option>
                                                <?php 
                                                    $sem = $ezzzy->getallresult("semesters","name","A");
                                                    foreach($sem as $sems){
                                                  ?>
                                                  <option value="<?php echo $sems['id']; ?>"><?php echo $sems['name']; ?></option>
                                                <?php
                                                    }//end of the if statement that brings out the programme categories
                                                ?>
                                            </select>
                                        </td>
                                        <td width="" bgcolor="#FFFFFF">
                                            -Level/Part-
                                            <select name="dlvl" id="dlvl" class="form-control" required>
                                                <option value="">--</option>                                                
                                            </select>
                                        </td>
                                       
                                        <td width="" align="center" bgcolor="#FFFFFF">
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-quirk"> Continue... </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>

                            <hr />
                            <?php if(isset($_REQUEST['selectp']) && $_REQUEST['selectp'] == "yes"){
                                //let us get the parsed parameter
                                $ddepp = explode("-", $_REQUEST['ddepp']);
                                $where = "";
                                $wherev = "";
                                if($ddepp[1] == "D"){
                                    $where = "did";
                                    $wherev = $ddepp[0];
                                }
                                else if($ddepp[1] == "P"){
                                    $where = "pgid";
                                    $wherev = $ddepp[0];
                                }
                                $dsession = $_REQUEST['dsession'];
                                $dsem = $_REQUEST['dsem'];
                                $dlvl = $_REQUEST['dlvl'];
                                ?>
                            <table class="table table-striped nomargin table-bordered">
                                <tr>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> S/N </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> COURSE </th>
                                    <th width="" bgcolor="#F0F1EB" align="center">&nbsp;</th>
                                </tr>				
                                <?php
                                if ($ezzzy->getrecords("lvlcourses",$where,$wherev,"semester",$dsem) == 0) {
                                    echo "<br /><font color=red>No courses defined yet for this department and this level yet</font><br />";
                                } else {
                                    $i = 1;
                                    $record = $ezzzy->runQuery("SELECT cid FROM lvlcourses WHERE $where='$wherev' and lvlid='$dlvl' and semester='$dsem'");
                                    foreach ($record as $reco){
                                        ?>
                                        <tr>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $i; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $ezzzy->getval("id",$reco['cid'],"courses","ccodes") ." - ". $ezzzy->getval("id",$reco['cid'],"courses","ctitle"); ?> </td>
                                            <td bgcolor="#F0F1EB" align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Action</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="./?lnk=exm_recordsc&amp;cid=<?php echo $reco['cid']; ?>&amp;depp=<?php echo $_REQUEST['ddepp']; ?>&amp;sem=<?php echo $dsem; ?>&amp;sess=<?php echo $dsession; ?>&amp;lvl=<?php echo $dlvl; ?>&amp;action=downloadtut">Tutorial List</a></li>
                                                        <li><a href="./?lnk=exm_recscore&amp;cid=<?php echo $reco['cid']; ?>&amp;depp=<?php echo $_REQUEST['ddepp']; ?>&amp;sem=<?php echo $dsem; ?>&amp;sess=<?php echo $dsession; ?>&amp;lvl=<?php echo $dlvl; ?>">Record Scores</a></li>
                                                        <li><a href="./?lnk=exm_upscore&amp;cid=<?php echo $reco['cid']; ?>&amp;depp=<?php echo $_REQUEST['ddepp']; ?>&amp;sem=<?php echo $dsem; ?>&amp;sess=<?php echo $dsession; ?>&amp;lvl=<?php echo $dlvl; ?>">Upload Scores</a></li>
                                                        <li><a href="./?lnk=exm_apsc&amp;cid=<?php echo $reco['cid']; ?>&amp;depp=<?php echo $_REQUEST['ddepp']; ?>&amp;sem=<?php echo $dsem; ?>&amp;sess=<?php echo $dsession; ?>&amp;lvl=<?php echo $dlvl; ?>">Approve Scores</a></li>
                                                        <li><a href="./?lnk=exm_recordsc&amp;cid=<?php echo $reco['cid']; ?>&amp;depp=<?php echo $_REQUEST['ddepp']; ?>&amp;sem=<?php echo $dsem; ?>&amp;sess=<?php echo $dsession; ?>&amp;lvl=<?php echo $dlvl; ?>&amp;action=downloadscores">Download Scores</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

        <?php
        $i++;
    }//end of the for each loop
}//end of the els e statekent tahts says there is a record
?>				
                            </table>
                            <?php
                            }//end of the if statement that says we are selectigng a course to record
                            else if(isset($_GET['action']) && $_GET['action'] == "downloadtut"){
                                $prev = "mstdtl";
                                include_once("pcheck.php");
                                
        /*         * ********************************************************************************************* */
        //display_error("I am here");
        // check submitted values
          $cid = $_GET['cid'];
          $depp = explode("-", $_GET['depp']);
          $where = "";
          $table = "";
            $wherev = "";
            if($depp[1] == "D"){
                $where = "did";
                $wherev = $depp[0];
                $table = "departments";
            }
            else if($depp[1] == "P"){
                $where = "pgid";
                $wherev = $depp[0];
                $table = "programmes";
            }
          $ses = $_GET['sess'];
          $lvl = $_GET['lvl'];
          $sem = $_GET['sem'];
          //lets do some translation
          $cdet = $ezzzy->getrow("id",$cid,"courses");
          $level = $ezzzy->getval("id",$lvl,"levels","name");
          $semester = $ezzzy->getval("id",$lvl,"semesters","name");
          $session = $ezzzy->getval("id",$lvl,"sesses","name");
          $department = $ezzzy->getval("id",$where,$wherev,$table,"name");
          
        //what if all is well
        include_once("functions/excelwriter.inc.php");
        //$filename = $vid.$did.$tid."schedule.xls";
        $filename = $cdet['ccodes']."_tutorial_list.xls";

        $excel = new ExcelWriter($filename);

        if ($excel == false)
            echo $excel->error;

        $myArr = array("S/N", "REG. NO", "FULL NAME","DEPARTMENT/PROGRAMME","LEVEL/PART","SESSION","SEMESTER","COURSE CODE", "COURSE TITLE","COURSE UNIT","CA","EXAM");
        $excel->writeLine($myArr);
        $r = 1;

        $result = $ezzzy->runQuery("SELECT * from coursereg where $where='$wherev' and lvlid='$lvl' and cid='$cid' and sess='$ses' and semester='$sem' order by stdid asc");
        foreach ($result as $row) {
            $regno = $ezzzy->getval("id",$row['stdid'],"dir_students","regno");
            $name = $ezzzy->getval("id",$row['stdid'],"dir_students","name");

            $myArr = array($r, $regno, $name, $department, $level,$session,$semester,$cdet['ccodes'],$cdet['ctitle'],$cdet['cunits'],0,0);
            $excel->writeLine($myArr);
            $r++;
        }//end of the while loop
        $excel->close();
        $mmsg = "Data writen into " . $filename . " Successfully.<br> Click <a href='$filename'>Here</a> to download.";
        echo $mmsg;                                   
                            }//end of the else statement that says we are downloading the tutorial list
                            else if(isset($_GET['action']) && $_GET['action'] == "downloadscores"){
                                $prev = "mdsc";
                                include_once("pcheck.php");
                                
        /*         * ********************************************************************************************* */
        //display_error("I am here");
        // check submitted values
          $cid = $_GET['cid'];
          $depp = explode("-", $_GET['depp']);
          $where = "";
          $table = "";
            $wherev = "";
            if($depp[1] == "D"){
                $where = "did";
                $wherev = $depp[0];
                $table = "departments";
            }
            else if($depp[1] == "P"){
                $where = "pgid";
                $wherev = $depp[0];
                $table = "programmes";
            }
          $ses = $_GET['sess'];
          $lvl = $_GET['lvl'];
          $sem = $_GET['sem'];
          //lets do some translation
          $cdet = $ezzzy->getrow("id",$cid,"courses");
          $level = $ezzzy->getval("id",$lvl,"levels","name");
          $semester = $ezzzy->getval("id",$lvl,"semesters","name");
          $session = $ezzzy->getval("id",$lvl,"sesses","name");
          $department = $ezzzy->getval("id",$where,$wherev,$table,"name");
          
        //what if all is well
        include_once("functions/excelwriter.inc.php");
        //$filename = $vid.$did.$tid."schedule.xls";
        $filename = $cdet['ccodes']."_scores.xls";

        $excel = new ExcelWriter($filename);

        if ($excel == false)
            echo $excel->error;

        $myArr = array("S/N", "REG. NO", "FULL NAME","DEPARTMENT/PROGRAMME","LEVEL/PART","SESSION","SEMESTER","COURSE CODE", "COURSE TITLE","COURSE UNIT","CA","EXAM","TOTAL");
        $excel->writeLine($myArr);
        $r = 1;

        $result = $ezzzy->runQuery("SELECT * from results where $where='$wherev' and lvlid='$lvl' and cid='$cid' and sess='$ses' and semester='$sem' order by stdid asc");
        foreach ($result as $row) {
            $regno = $ezzzy->getval("id",$row['stdid'],"dir_students","regno");
            $name = $ezzzy->getval("id",$row['stdid'],"dir_students","name");

            $myArr = array($r, $regno, $name, $department, $level,$session,$semester,$cdet['ccodes'],$cdet['ctitle'],$cdet['cunits'],$row['cas'],$row['exs'],$row['totals'],);
            $excel->writeLine($myArr);
            $r++;
        }//end of the while loop
        $excel->close();
        $mmsg = "Data writen into " . $filename . " Successfully.<br> Click <a href='$filename'>Here</a> to download.";
        echo $mmsg;                                   
                            }//end of the else statement that says we are downloading the tutorial list
                            ?>
                        </div>
                    </div>
                </div>

                <!--/This is the ending of my main contents-->
            </div><!-- col-md-9 -->
<?php include_once("pages/pright.php"); ?>
        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->

</section>

<?php
include_once("pages/pfooter.php");
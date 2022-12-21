<?php

session_name("SAdmin");
session_start();
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    header('Location: signin.php');
    exit;
}
include("conn.php");
$adminid = $_SESSION['rec'];

include("function_sql_safe.php");

$no=@count($_POST['crscs']);
$lprec= $_POST["lprec"]; //this is the level or part rec_id
$dsem= $_POST["dsem"]; //this is the semester we are talking about
//we shall get the departmental id using the lprec (=the level or part id)
$where = "";
$wherev = "";
$did = $ezzzy->getval("id",$lprec,"levels","did");//this is the deparmental id corresponding to the level ID
if($did == ""){
    $pid = $ezzzy->getval("id",$lprec,"levels","pid");//this is the programmes id corresponding to the level ID
    $where = "pgid";
    $wherev = $pid;
}
else{
    //$pid = $ezzzy->getval("id",$lprec,"levels","pid");//this is the programmes id corresponding to the level ID
    $where = "did";
    $wherev = $did;
}
$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
    //befor we start any processing, let us first of all delete all the existing definistions of courses for this lvl
    $ezzzy->runQuery("DELETE FROM lvlcourses WHERE $where='$wherev' and lvlid='$lprec' and semester='$dsem'");
    for($ch=0; $ch<$no; $ch++){
       if(isset($_POST['crscs'][$ch]) && $_POST['crscs'][$ch] != ""){
           $coid = $_POST['crscs'][$ch];
           $result = $ezzzy->runQuery("INSERT INTO lvlcourses($where,lvlid,cid,semester) VALUES('$wherev','$lprec','$coid','$dsem')");
           if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            }
       }//end of the if statement that checks if a course has beem checked
    }//end of the for loop that loops through the whole course    
    $_SESSION["msg"] = '<font color=green><b>Course Successfully Defined for the selected level! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
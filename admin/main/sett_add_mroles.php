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
$who = $_SESSION['who'];

include("function_sql_safe.php");

$no=@count($_POST['role']);
$rname= $_POST["rname"]; //this is the role name
$roles= implode(",",$_POST["role"]); //this is the selected roles
$now = date('Y-m-d H:i:s');

if($_POST['rname'] == ""){
    display_error("Please enter the role name for this  privilege");
}
if(count($_POST['role']) == 0){
    display_error("Please select at least one privilege for this role");
}

$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
    if($ezzzy->getrecords("privss","rolename",$rname) != 0){
    display_error("It seems you have entered this role name before");    
}
if($ezzzy->getrecords("privss","roles",$roles) != 0){
    display_error("It seems you have another role name with this(ese) set of privilege(s) before ");    
}
    //befor we start any processing, let us first of all delete all the existing definistions of courses for this lvl
    $ezzzy->runQuery("DELETE FROM privss WHERE rolename='$rname' or roles='$roles'");
    //for($ch=0; $ch<$no; $ch++){
       //if(isset($_POST['role'][$ch]) && $_POST['role'][$ch] != ""){
           //$coid = $_POST['role'][$ch];
           $result = $ezzzy->runQuery("INSERT INTO privss(rolename,roles,addedby,addate,whoadd) VALUES('$rname','$roles','$adminid','$now','$who')");
           if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            }
       //}//end of the if statement that checks if a course has beem checked
    //}//end of the for loop that loops through the whole course    
    $_SESSION["msg"] = '<font color=green><b>Role Successfully Created! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    //befor we start any processing, let us first of all delete all the existing definistions of courses for this lvl
    //$ezzzy->runQuery("DELETE FROM privss WHERE rolename='$rname' or roles='$roles'");
    //for($ch=0; $ch<$no; $ch++){
       //if(isset($_POST['role'][$ch]) && $_POST['role'][$ch] != ""){
           //$coid = $_POST['role'][$ch];
           $result = $ezzzy->runQuery("UPDATE privss SET rolename='$rname',roles='$roles' WHERE id='$rec'");
           if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            }
       //}//end of the if statement that checks if a course has beem checked
    //}//end of the for loop that loops through the whole course    
    $_SESSION["msg"] = '<font color=green><b>Role Successfully updated! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
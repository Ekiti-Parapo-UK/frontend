<?php
/*
session_name("SAdmin");
session_start();
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    header('Location: signin.php');
    exit;
}
include("conn.php");
$adminid = $_SESSION['rec'];
$who = $_SESSION['who'];*/
include("conn.php");
$now = date('Y-m-d H:i:s');
$dat = date('Y-m-d');

include("function_sql_safe.php");

$adminid = trim(sql_safe($_POST["reccid"]));
$who = trim(sql_safe($_POST["who"]));
$where = trim(sql_safe($_POST["where"]));
$opass = trim(sql_safe($_POST["opass"]));
$npass = trim(sql_safe($_POST["npass"]));
$cnpass = trim(sql_safe($_POST["cnpass"]));
$rec = trim(sql_safe($_POST["reccid"]));

$whereid = 0;
$table = "";

if($where == "dir_staff"){
    $det = $ezzzy->getOne("SELECT id from _accounts WHERE uid='$adminid' and position='Staff'");  
    $whereid = $det['id'];
    $table = $where;
}
else if($where == "dir_students"){
    $det = $ezzzy->getOne("SELECT id from _accounts WHERE uid='$adminid' and position='Student'");  
    $whereid = $det['id'];
    $table = $where;
}
else if($who == "sadmin"){
    $det = $ezzzy->getOne("SELECT id from _accounts WHERE uid='$adminid' and position='SuperAdmin'");  
    $whereid = $det['id']; 
    $table = $where;
}
//display_error($whereid);
//$now = date('Y-m-d H:i:s');
$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
    if ($opass == "" || $npass == "" || $cnpass == "") {
        display_error("Please, specify all the fields");
    }
    if($npass != $cnpass){
        display_error("Passwords does not match");
    }
    else if($ezzzy->getval("id",$whereid,"_accounts","password") != $opass){
        display_error("I am so sorry, I cannot confirm your old password as it seems wrong");        
    } 
    else {
        //all is well
        $result = $ezzzy->runQuery("UPDATE _accounts SET password='$npass' WHERE id='$whereid'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> '. ' No action taken. Try again<br><br></font>';
        }
        else{
            if($where != "_accounts"){
                $result = $ezzzy->runQuery("UPDATE $table SET password='$npass' WHERE id='$adminid'");
                $_SESSION["msg"] = '<font color=green><b>Password Change Successful! </b> ' . ' <br /><br /></font>';
            }
        }
    }//08066521144
    $_SESSION["msg"] = '<font color=green><b>Password Change Successful! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
    //header("location: ./?lnk=home");
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
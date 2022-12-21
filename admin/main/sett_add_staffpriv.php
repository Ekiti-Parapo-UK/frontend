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

$no=@count($_POST['pri']);
$rec= $_POST["rec"]; //this is the role name
$privs= implode(",",$_POST["pri"]); //this is the selected roles
$now = date('Y-m-d H:i:s');

if($no == 0){
    display_error("Please select at least one privilege for this role");
}

$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
           $result = $ezzzy->runQuery("UPDATE _accounts SET privss='$privs' WHERE uid='$rec' and position='Staff'");
           if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            }
    $_SESSION["msg"] = '<font color=green><b>Role Successfully added for this staff! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
           $result = $ezzzy->runQuery("UPDATE _accounts SET privss='$privs' WHERE uid='$rec' and position='Staff'");
           if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            }
    $_SESSION["msg"] = '<font color=green><b>Role Successfully updated for this staff! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
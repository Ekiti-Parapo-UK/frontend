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

$regno = trim(sql_safe($_POST["regno"]));
$pass = trim(sql_safe($_POST["pass"]));
$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
    
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    if ($pass == '') {
        display_error("Please, enter a new password for this Student");
    }
    else {
        //display_error($rec);
        //all is well
        //we shall now insert the refords
        $fields = "password";
        $vals = "$pass";
        $result = $ezzzy->updateval($fields, $vals, "dir_students","id",$rec);
        //$result = $ezzzy->runQuery("UPDATE courses SET ccodes='$ccode',ctitle='$ctitle',cunits='$cunit',semester='$csem',ctypes='$ctyp' where id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }
        else{
            $ezzzy->runQuery("UPDATE _accounts SET password='$pass' WHERE uid='$rec' and position='Student'");
        }
    }//end of the else statekent that says all is well
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
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
$now = date('Y-m-d H:i:s');
$adate = date('Y-m-d');

include("function_sql_safe.php");

$testifier = trim(sql_safe($_POST["testifier"]));
$testimony = trim(sql_safe($_POST["testimony"]));

$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {

    if ($testifier == "" || $testimony == "") {
        display_error("Please, specify all fields");
    } else if ($ezzzy->getrecords("faqs","question",$ques) != 0) {
        display_error("Oops!! It seems you have added this itme before");
    } else {
        //all is well
        //we shall now insert the refords
        $fields = "title,,ntype,,descp";
        $vals = "'$testifier',,'TESTIMONY',,'$testimony'";
        $result = $ezzzy->addlist($fields, $vals, "news");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> '. ' No action taken. Try again<br><br></font>';
        }
    }//08066521144
    header("location: ".$saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    if ($testifier == "" || $testimony == "") {
        display_error("Please, specify all fields");
    } else {
        //all is well
        //we shall now update the refords
        $fields = "title,,descp";
        $vals = "$testifier,,$testimony";
        $result = $ezzzy->updateval($fields, $vals, "news","id",$rec);
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }
    }
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
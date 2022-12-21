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

include("function_sql_safe.php");

$subhtyp = trim(sql_safe($_POST["subhtyp"]));
$amt = trim(sql_safe($_POST["amt"]));
$dat = trim(sql_safe($_POST["dat"]));
$notes = trim(sql_safe($_POST["notes"]));
$ttype = trim(sql_safe($_POST["ttype"]));
$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {

    if ($subhtyp == "" || $amt == "" || $dat == "" || $notes == "") {
        display_error("Please, specify all the fields");
    } else {
        //all is well
        //we shall now insert the refords
        $fields = "sid,,scode,,amount,,descp,,dates,,ttype";
        $vals = "'$adminid',,'$subhtyp',,'$amt',,'$notes',,'$dat',,'$ttype'";
        $result = $ezzzy->addlist($fields, $vals, "incomexp");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> '. ' No action taken. Try again<br><br></font>';
        }
    }//08066521144
    header("location: ".$saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    if ($subhtyp == "" || $amt == "" || $dat == "" || $notes == "") {
        display_error("Please, specify all the fields");
    } else {
        //all is well
        //we shall now update the refords
        $fields = "scode,,amount,,descp,,dates";
        $vals = "$subhtyp,,$amt,,$notes,,$dat";
        $result = $ezzzy->updateval($fields, $vals, "incomexp","id",$rec);
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }
    }
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
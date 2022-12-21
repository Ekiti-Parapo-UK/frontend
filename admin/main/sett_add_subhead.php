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

$subhcode = trim(sql_safe($_POST["subhcode"]));
$subhdesc = trim(sql_safe($_POST["subhdesc"]));
$subhtyp = trim(sql_safe($_POST["subhtyp"]));
$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {

    if ($subhcode == "" || $subhdesc == "" || $subhtyp == "") {
        display_error("Please, specify all the fields");
    } else if ($ezzzy->getrecords("subheads","code",$subhcode) != 0) {
        display_error("Oops!! It seems you have added this subhead itme before");
    } else {
        //all is well
        //we shall now insert the refords
        $fields = "code,,descp,,subheadtype";
        $vals = "'$subhcode',,'$subhdesc',,'$subhtyp'";
        $result = $ezzzy->addlist($fields, $vals, "subheads");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> '. ' No action taken. Try again<br><br></font>';
        }
    }//08066521144
    header("location: ".$saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    if ($ntitle == "" || $ndesc == "") {
        display_error("Please, specify the News Title and hence provide a description for the News");
    } else {
        //all is well
        //we shall now update the refords
        $fields = "code,,descp,,subheadtype";
        $vals = "$subhcode,,$subhdesc,,$subhtyp";
        $result = $ezzzy->updateval($fields, $vals, "subheads","id",$rec);
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }
    }
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
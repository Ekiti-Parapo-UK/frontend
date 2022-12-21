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

$ntitle = trim(sql_safe($_POST["ntitle"]));
$ndesc = trim(sql_safe($_POST["ndesc"]));
$saddr = $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {

    if ($ntitle == "" || $ndesc == "") {
        display_error("Please, specify the project Title and hence provide a description for the project");
    } else if ($ezzzy->getrecords("news", "title", $ntitle) != 0) {
        display_error("Oops!! It seems you have added this itme before");
    } else {
        //all is well
        if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $target = "uploads";
            $p = $_FILES['pic']['type'];
            $pi = explode("/", $p);
            if ($pi[0] != "image") {
                display_error("The file you want to upload can only be an image. To correct this please try to Edit the record");
            }
            $uiname = basename($_FILES['pic']['name']); // true name of image
            // copy the temp document to the place for storage
            move_uploaded_file($_FILES['pic']['tmp_name'], $target . "/" . $uiname);
            //prepare document for database
            // prepare new name for picture
            $newpic = $uiname;
            $filestore = $target . "/" . $newpic;
            $filest = "pic/" . $newpic;
            /*             * ****************************************************************************************** */
            //we shall now insert the refords
            $fields = "title,,descp,,ntype,,adates,,adt,,picture";
            $vals = "'$ntitle',,'$ndesc',,'PROJECT',,'$adate',,'$now',,'$filest'";
            $result = $ezzzy->addlist($fields, $vals, "news");
            if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            }
        }//end of if(is_uploaded)
        else {
            //we shall now insert the refords
            $fields = "title,,descp,,ntype,,adates,,adt";
            $vals = "'$ntitle',,'$ndesc',,'PROJECT',,'$adate',,'$now'";
            $result = $ezzzy->addlist($fields, $vals, "news");
            if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            }
        }
    }//08066521144
    header("location: " . $saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    if ($ntitle == "" || $ndesc == "") {
        display_error("Please, specify the project Title and hence provide a description for the project");
    } else {
        //all is well
        //we shall now update the refords
        $fields = "title,,descp";
        $vals = "$ntitle,,$ndesc";
        $result = $ezzzy->updateval($fields, $vals, "news", "id", $rec);
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }
    }
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    header("location: " . $saddr);
}//end of the if statement thsta says we are editting an old record
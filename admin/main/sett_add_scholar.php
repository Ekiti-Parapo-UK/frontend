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

$title = trim(sql_safe($_POST["title"]));
$rank = trim(sql_safe($_POST["rank"]));
$name = trim(sql_safe($_POST["name"]));
$sex = trim(sql_safe($_POST["sex"]));
$mstatus = trim(sql_safe($_POST["mstatus"]));
$religion = trim(sql_safe($_POST["religion"]));
$nation = trim(sql_safe($_POST["nation"]));
$dob = trim(sql_safe($_POST["dob"]));
$phone = trim(sql_safe($_POST["phone"]));
$email = trim(sql_safe($_POST["email"]));
$facebook = trim(sql_safe($_POST["facebook"]));
$twitter = trim(sql_safe($_POST["twitter"]));
$linkedin = trim(sql_safe($_POST["linkedin"]));
$bio = trim(sql_safe($_POST["bio"]));
$saddr = $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
    //print_r($_POST);
    //exit;

    if ($title == "" || $name == "" || $rank == "" || $name == "") {
        display_error("Please, specify the the field marked *");
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
            $fields = "title,,rank,,name,,sex,,mstatus,,religion,,nationality,,dob,,phone,,email,,facebook,,twitter,,linkedin,,bio,,picture";
            $vals = "'$title',,'$rank',,'$name',,'$sex',,'$mstatus',,'$religion',,'$nation',,'$dob',,'$phone',,'$email',,'$facebook',,'$twitter',,'$linkedin',,'$bio',,'$filest'";
            $result = $ezzzy->addlist($fields, $vals, "dir_scholars");
            if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            }
        }//end of if(is_uploaded)
        else {
            //display_error("Please, upload a picture for this scholar");
            //we shall now insert the refords
            $fields = "title,,rank,,name,,sex,,mstatus,,religion,,nationality,,dob,,phone,,email,,facebook,,twitter,,linkedin,,bio";
            $vals = "'$title',,'$rank',,'$name',,'$sex',,'$mstatus',,'$religion',,'$nation',,'$dob',,'$phone',,'$email',,'$facebook',,'$twitter',,'$linkedin',,'$bio'";
            $result = $ezzzy->addlist($fields, $vals, "dir_scholars");
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
        display_error("Please, specify the News Title and hence provide a description for the News");
    } else {
        //all is well
        //we shall now update the refords
        $fields = "title,,rank,,name,,sex,,mstatus,,religion,,nationality,,dob,,phone,,email,,facebook,,twitter,,linkedin";
        $vals = "$title,,$rank,,$name,,$sex,,$mstatus,,$religion,,$nation,,$dob,,$phone,,$email,,$facebook,,$twitter,,$linkedin";
        $result = $ezzzy->updateval($fields, $vals, "dir_scholars", "id", $rec);
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }
    }
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    header("location: " . $saddr);
}//end of the if statement thsta says we are editting an old record
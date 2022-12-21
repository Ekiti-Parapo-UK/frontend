<?php

/* session_name("SAdmin");
  session_start();
  if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  header('Location: signin.php');
  exit;
  } */
include("conn.php");
//$adminid = $_SESSION['rec'];

include("function_sql_safe.php");

$regno = trim(sql_safe($_POST["regno"]));
$sname = trim(sql_safe($_POST["sname"]));
$oname = trim(sql_safe($_POST["name"]));
$name = $sname . " " . $oname;

$saddr = $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
    
    header("location: " . $saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    //display_error("I am here");
    $rec = $_POST['rec'];
    if ($regno == '') {
        display_error("Please, specify the Registration Number for this Student");
    } else {
        //display_error($rec);
        //all is well
        //
        $target = "pics";
        if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $p = $_FILES['pic']['type'];
            $pi = explode("/", $p);
            if ($pi[0] != "image") {
                display_error("The file you want to upload can only be an image");
            }
            $uiname = basename($_FILES['pic']['name']); // true name of image
            // copy the temp document to the place for storage
            move_uploaded_file($_FILES['pic']['tmp_name'], $target . "/" . $uiname);
            //prepare document for database
            // prepare new name for picture
            $newpic = $uiname;
            $filestore = $target . "/" . $newpic;
            $filest = "pics/" . $newpic;

            $fields = "photo";
            $vals = "$filest";
            $result = $ezzzy->updateval($fields, $vals, "dir_students", "id", $rec);
            if (!$result) {
                $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
            } else {
                //we need to let the db know that we have edited our biodata and picture because they said, no need to change photo again
                $ezzzy->runQuery("Update dir_students SET cstatus='YES' WHERE id='$rec'");
            }
        }//end of if(is_uploaded)
        //we shall now insert the refords
    }//end of the else statekent that says all is well
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    //we shall log the person out and log the person in again so as to redirect to the appropraite page
    $u = $ezzzy->getval("regno",$regno,"dir_students","username");
    $p = $ezzzy->getval("regno",$regno,"dir_students","password");
    header('Location: check_login.php?username=' . $u . '&password=' . $p);
    //header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
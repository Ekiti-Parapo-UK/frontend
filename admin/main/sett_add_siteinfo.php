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


$do = $_GET['do'];
@$page = $_POST['pagg']; //"about";
$detail = addslashes($_POST['parag1']);
$id = 0;
if (isset($_POST['ID'])) {
    $id = $_POST['ID'];
}
if ($detail == '') {
    display_error("Please type or copy and paste the information for this page");
}//end of if all is not well check
else {
    //if all is well
    switch ($do) {
        case "new":

            $sql = "INSERT INTO siteinfo(page,detail) VALUES('$page','$detail')";
            $result = $ezzzy->runQuery($sql);
            if ($result) {
                $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
            } else {
                echo "Can't update page";
            }            
            header("location: sett_siteinfo.php");
            break; //end of the break statement for case new
        //if the form is displayed for editting
        case "edit":
            $sql = "UPDATE siteinfo SET detail='$detail' WHERE rec_id='$id'";
            $result = $ezzzy->runQuery($sql);
            if ($result) {
                $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
            } else {
                echo "Can't update page";
            }
            header("location: sett_siteinfo.php");
            break; //end of the break statement for case edit
    }//end of the switch case of 'do'
} //end of the else statement if all is well
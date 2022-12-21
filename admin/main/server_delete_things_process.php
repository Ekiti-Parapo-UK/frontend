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

$typ = $_REQUEST["typ"];
$rec = $_REQUEST["rec"];
$serveradd = $_REQUEST["addr"];
if ($typ == "delnews") {
        $result = $ezzzy->runQuery("DELETE FROM news WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a session
else if ($typ == "delevent") {
        $result = $ezzzy->runQuery("DELETE FROM news WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a semester
else if ($typ == "delfaq") {
        $result = $ezzzy->runQuery("DELETE FROM faqs WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a programme
else if ($typ == "delscholar") {
        $result = $ezzzy->runQuery("DELETE FROM dir_scholars WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a faculty
else if ($typ == "deltestimony") {
        $result = $ezzzy->runQuery("DELETE FROM news WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a Department
else if ($typ == "delblog") {
        $result = $ezzzy->runQuery("DELETE FROM news WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a Levels
else if ($typ == "delcourse") {
        $result = $ezzzy->runQuery("DELETE FROM courses WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Course Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a Courses
else if ($typ == "delpays") {
        $result = $ezzzy->runQuery("UPDATE ptypes set delstatus='1' WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Course Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a Courses
else if ($typ == "delpriv") {
        $result = $ezzzy->runQuery("DELETE from privss WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a Courses
else if ($typ == "delprog") {
        $result = $ezzzy->runQuery("DELETE from progcats WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $ezzzy->runQuery("DELETE from programmes WHERE pid='$rec'");
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a Courses
else if ($typ == "delfac") {
        $result = $ezzzy->runQuery("DELETE from faculties WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $ezzzy->runQuery("DELETE from departments WHERE fid='$rec'");
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a faculty
else if ($typ == "deldept") {
        $result = $ezzzy->runQuery("DELETE from departments WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $ezzzy->runQuery("DELETE from programmes WHERE did='$rec'");
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a faculty
else if ($typ == "delpgme") {
        $result = $ezzzy->runQuery("DELETE from programmes WHERE id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }else{
            $_SESSION["msg"] = '<font color=green><b>Record Successfully Deleted! </b> <br /><br /></font>';
        }    
    header("location: ".$serveradd);
}//end of the if statement that says we are deleteing a faculty
else{
    $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
}
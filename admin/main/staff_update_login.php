<?php

session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200);
@session_start();
//---------------
include("conn.php");

//mail check function
function spamcheck($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

include("function_sql_safe.php");

$profile = trim(sql_safe($_POST["profile"]));
$ssid = trim(sql_safe($_POST["ssid"]));
$email = trim(sql_safe($_POST["email"]));
$pword = trim(sql_safe($_POST["pword"]));
$fullname = trim(sql_safe($_POST["fullname"]));
$gender = trim(sql_safe($_POST["gender"]));
$phone = trim(sql_safe($_POST["phone"]));
$uid = trim(sql_safe($_POST["uid"]));

$account = $_SESSION["account"];
$accountid = $_SESSION["accountid"];

$upd = date('d-M-Y h:i:s:a');

//check email duplicate
$check1 = $ezzzy->runQuery("select id, email from dir_students where account='$account' and email='$email'");
$check2 = $ezzzy->runQuery("select id, email from dir_parents where account='$account' and email='$email'");
$check3 = $ezzzy->runQuery("select id, email from dir_staff where account='$account' and email='$email' and sid!='$profile'");

$check_main = $ezzzy->runQuery("select id, email from _accounts where account='$account' and email='$email'");

if (count($check1) > 0 or count($check2) > 0 or count($check3) > 0) {
    $_SESSION["msg"] = '<font color=red><b>Invalid email address supplied! </b></font><br><br>';
    header("location: staff_view_details.php?id={$uid}&action=setlogin");
} else {
    //actually what was there is not too good.
    //we need to check if the account email is empty then we create a new one other wise, we update period
    //so after serious reasoning, we are only doing an update
//check if to create new or update on _accounts table
    /* if(mysqli_num_rows($check_main)>0) {
      mysqli_query($con,"update _accounts set email='$email', pword='$pword', phone='$phone', fullname='$fullname', gender='$gender' where account='$account' and email='$email' and ssid='$ssid'") or die(mysql_error());
      }
      else {
      mysqli_query($con,"insert into _accounts set account='$account', accountid='$accountid', email='$email', pword='$pword', ssid='$ssid', position='Staff', phone='$phone', fullname='$fullname', gender='$gender'") or die(mysql_error());
      } */
    $ezzzy->runQuery("update _accounts set email='$email', pword='$pword', phone='$phone', fullname='$fullname', gender='$gender' where uid='$uid' and position='Staff'");
//----------
//----update student directory account
    $ezzzy->runQuery( "update dir_staff set email='$email', pword='$pword' where id='$uid'");
//----
    if ($pword == '') {
        $_SESSION["msg"] = '<font color=green><b>Login successfully disabled </b></font><img src=images/yes.png align=absmiddle><br><br>';
    } else {
        $_SESSION["msg"] = '<font color=green><b>Login successfully enabled </b></font><img src=images/yes.png align=absmiddle><br><br>';
    }
    header("location: staff_view_details.php?id={$uid}");
}
?>
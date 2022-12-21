<?php

session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200);
@session_start();
//---------------
include("conn.php");

$account = $_SESSION["account"];
$accountid = $_SESSION["accountid"];

include("class.upload.php");
include("function_sql_safe.php");
$picid = date('YmHis');
$profile = trim(sql_safe($_POST["profile"]));

@list(,, $imtype, ) = getimagesize($_FILES['photo']['tmp_name']);

if ($imtype == 3) {
    $ext = "png";
    include("image_foo.php");
    mysqli_query($con, "update dir_staff set photolink='$picid' where sid='$profile' and account='$account' or ssid='$profile' and account='$account'");
    header("location: staff_view_details.php?profile={$profile}");
} elseif ($imtype == 2) {
    $ext = "jpeg";
    include("image_foo.php");
    mysqli_query($con, "update dir_staff set photolink='$picid' where sid='$profile' and account='$account' or ssid='$profile' and account='$account'");
    header("location: staff_view_details.php?profile={$profile}");
} elseif ($imtype == 1) {
    $ext = "gif";
    include("image_foo.php");
    mysqli_query($con, "update dir_staff set photolink='$picid' where sid='$profile' and account='$account' or ssid='$profile' and account='$account'");
    header("location: staff_view_details.php?profile={$profile}");
} else {
    $_SESSION["msg"] = "<font color=red><b>Wrong upload format</b><br>Picture format must be .jpg, .gif or .png</font><br><br>";
    header("location: staff_view_details.php?profile={$profile}");
}
?>
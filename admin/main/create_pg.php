<?php

session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200);
@session_start();
//---------------
include("conn.php");


include("function_sql_safe.php");

$fullname = trim(sql_safe($_POST["fullname"]));
$gender = trim(sql_safe($_POST["gender"]));

$occupation = trim(sql_safe($_POST["occupation"]));
$phone = trim(sql_safe($_POST["phone"]));
$phone2 = trim(sql_safe($_POST["phone"]));
$email = trim(sql_safe($_POST["email"]));
$raddress = trim(sql_safe($_POST["raddress"]));
$rcity = trim(sql_safe($_POST["rcity"]));
$rstate = trim(sql_safe($_POST["rstate"]));

$account = $_SESSION["account"];
$accountid = $_SESSION["accountid"];

$upd = date('d-M-Y h:i:s:a');
$transid = date('YmdHis');

//----create account
$ezzzy->runQuery("INSERT INTO dir_parents set account='$account', accountid='$accountid', fullname='$fullname', gender='$gender', occupation='$occupation', raddress='$raddress', rcity='$rcity', rstate='$rstate', phone='$phone', phone2='$phone2', email='$email', dtime='$upd', lastupdate='$upd', ssid='$transid'");
$uid = $ezzzy->getLastid();
//generate account id
$ezzzy->runQuery("UPDATE dir_parents set sid=id+10000 where ssid='$transid' and account='$account'");

//it will be a very good idea to create the parent account at this point
$ezzzy->runQuery("INSERT INTO _accounts(uid,ssid,account,accountid,status,position) VALUES('$uid','$transid','$account','$accountid','offline','Parent')");
header("location: pg_directory.php");

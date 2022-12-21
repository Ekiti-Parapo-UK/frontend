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

$staffid = trim(sql_safe($_POST["staffid"]));
$profile=trim(sql_safe($_POST["profile"]));
$ssid=trim(sql_safe($_POST["ssid"]));
//$scode=trim(sql_safe($_POST["scode"]));
$fullname=trim(sql_safe($_POST["fullname"]));
$gender=trim(sql_safe($_POST["gender"]));

$dbdd=trim(sql_safe($_POST["dobday"]));
$dbmm=trim(sql_safe($_POST["dobmonth"]));
$dbyyyy=trim(sql_safe($_POST["dobyear"]));

$iposition=trim(sql_safe($_POST["iposition"]));
$nationality=trim(sql_safe($_POST["nationality"]));
$ostate=trim(sql_safe($_POST["ostate"]));
$lga=trim(sql_safe($_POST["lga"]));
$religion=trim(sql_safe($_POST["religion"]));

$raddress=trim(sql_safe($_POST["raddress"]));
$rcity=trim(sql_safe($_POST["rcity"]));
$rstate=trim(sql_safe($_POST["rstate"]));
$phone=trim(sql_safe($_POST["phone"]));
$phone2=trim(sql_safe($_POST["phone2"]));
$email=trim(sql_safe($_POST["email"]));

$account=$_SESSION["account"];
$accountid=$_SESSION["accountid"];
$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
    if ($staffid == '') {
        display_error("Please, specify the Staff ID");
    }
    else if ($name == '') {
        display_error("Please, enter the name for this staff");
    }
    else if ($sex == '') {
        display_error("Please, select the gender for this staff");
    }
    else if ($phone == '') {
        display_error("Please, enter the phone number for this staff");
    }
    else if ($email == '') {
        display_error("Please, enter the email address for this staff");
    }
    else if ($dep== '') {
        display_error("Please, specify the department for this staff");
    }
    else if ($styp== '') {
        display_error("Please, specify the staff type");
    }
    else if ($ezzzy->getrecords("dir_staff","staffid",$staffid) != 0) {
        display_error("Oops!! It seems you have added this Staff before");
    } else {        
        //all is well
        //we shall now insert the refords
        $fields = "colid,,fid,,did,,sunit,,staffid,,name,,sex,,phone,,email,,username,,password,,stype";
        $vals = "'$colid',,'$fac',,'$dep',,'$suni',,'$staffid',,'$name',,'$sex',,'$phone',,'$email',,'$staffid',,'$pass',,'$styp'";
        $result = $ezzzy->addlist($fields, $vals, "dir_staff");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> '. ' No action taken. Try again<br><br></font>'.$ezzzy->errorCode();
        }
        else{
            //we shall now create the account for this staff
            $uid = $ezzzy->getLastid();
            $ezzzy->runQuery("INSERT INTO _accounts(uid,username,password,status,position) VALUES('$uid','$staffid','$pass','offline','Staff')");
            $_SESSION['msg'] = '<font color=green><b>Staff Successfully added! </b> ' . ' <br /><br /></font>';
        }
    }
    header("location: ".$saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    $rec = $_POST['rec'];
    if ($staffid == '') {
        display_error("Please, specify the Staff ID");
    }
    else if ($name == '') {
        display_error("Please, enter the name for this staff");
    }
    else if ($sex == '') {
        display_error("Please, select the gender for this staff");
    }
    else if ($phone == '') {
        display_error("Please, enter the phone number for this staff");
    }
    else if ($email == '') {
        display_error("Please, enter the email address for this staff");
    }
    else if ($dep== '') {
        display_error("Please, specify the department for this staff");
    }
    else if ($styp== '') {
        display_error("Please, specify the staff type");
    }
    else {
        //display_error($rec);
        //all is well
        //we shall now insert the refords
        $fields = "colid,,fid,,did,,sunit,,staffid,,name,,sex,,phone,,email,,username,,password,,stype";
        $vals = "$colid,,$fac,,$dep,,$suni,,$staffid,,$name,,$sex,,$phone,,$email,,$staffid,,$pass,,$styp";
        //$result = $ezzzy->updateval($fields, $vals, "dir_staff","id",$rec);
        $result = $ezzzy->runQuery("update dir_staff set fullname='$fullname', iposition='$iposition', religion='$religion', gender='$gender', dobdd='$dbdd', dobmm='$dbmm', dobyyyy='$dbyyyy', nationality='$nationality', ostate='$ostate', lga='$lga', raddress='$raddress', rcity='$rcity', rstate='$rstate', phone='$phone', phone2='$phone2', email='$email', lastupdate='$upd' where id='$rec'");
        //$result = $ezzzy->runQuery("UPDATE courses SET ccodes='$ccode',ctitle='$ctitle',cunits='$cunit',semester='$csem',ctypes='$ctyp' where id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }
        else{
            $ezzzy->runQuery("update _accounts set email='$email', phone='$phone', fullname='$fullname', gender='$gender' where uid='$rec' and position='Staff'");
        }
    }//end of the else statekent that says all is well
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
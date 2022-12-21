<?php
/*session_name("SAdmin");
session_start();
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    header('Location: signin.php');
    exit;
}*/
include("conn.php");
//$adminid = $_SESSION['rec'];

include("function_sql_safe.php");

$regno = trim(sql_safe($_POST["regno"]));
$sname = trim(sql_safe($_POST["sname"]));
$oname = trim(sql_safe($_POST["name"]));
$name = $sname." ".$oname;
$sex = trim(sql_safe($_POST["sex"])); //this is the semester record ID
$phone = trim(sql_safe($_POST["phone"])); //this is the semester record ID
$email = trim(sql_safe($_POST["email"])); //this is the semester record ID
$sess = trim(sql_safe($_POST["sess"])); //this is the semester record ID
$batch = trim(sql_safe($_POST["batch"])); //this is the semester record ID
$fac = trim(sql_safe($_POST["fac"])); //this is the semester record ID
$colid = $ezzzy->getval("id",$fac,"faculties","colid");
$dep = trim(sql_safe($_POST["dep"])); //this is the semester record ID
$prg = trim(sql_safe($_POST["prg"])); //this is the semester record ID
$lvl = trim(sql_safe($_POST["lvl"])); //this is the semester record ID
$atyp = trim(sql_safe($_POST["atyp"])); //this is the semester record ID
$nokname = trim(sql_safe($_POST["nokname"])); //this is the semester record ID
$nokph = trim(sql_safe($_POST["nokph"])); //this is the semester record ID
$nokem = trim(sql_safe($_POST["nokem"])); //this is the semester record ID
$nokrel = trim(sql_safe($_POST["nokrel"])); //this is the semester record ID
$pass = generate_pass();
$saddr= $_POST["saddr"]; //this is the server address
if ($_GET['typ'] == "new") {
    if ($regno == '') {
        display_error("Please, specify the Registration Number for this Student");
    }
    else if ($name == '') {
        display_error("Please, enter the name for this student");
    }
    else if ($sex == '') {
        display_error("Please, select the gender for this student");
    }
    else if ($phone == '') {
        display_error("Please, enter the phone number for this student");
    }
    else if ($email == '') {
        display_error("Please, enter the email address for this student");
    }    
    
    else if ($ezzzy->getrecords("dir_members","regno",$regno) != 0) {
        display_error("Oops!! It seems you have added this member before");
    } else {        
        //all is well
        //we shall now insert the refords
        $fields = "colid,,fid,,did,,pgid,,lvlid,,regno,,matricno,,name,,sex,,phone,,email,,username,,password,,nokname,,nokphone,,nokemail,,nokrel,,addtype,,sessadm,,batc,,astatus,,stdcat";
        $vals = "'$colid',,'$fac',,'$dep',,'$prg',,'$lvl',,'$regno',,'$regno',,'$name',,'$sex',,'$phone',,'$email',,'$regno',,'$pass',,'$nokname',,'$nokph',,'$nokem',,'$nokrel',,'$atyp',,'$sess','$batch',,'INACTIVE',,'new'";
        $result = $ezzzy->addlist($fields, $vals, "dir_students");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> '. ' No action taken. Try again<br><br></font>'.$ezzzy->errorCode();
        }
        else{
            //we shall now create the account for this staff
            $uid = $ezzzy->getLastid();
            $ezzzy->runQuery("INSERT INTO _accounts(uid,username,password,status,position) VALUES('$uid','$regno','$pass','offline','Student')");
            $_SESSION['msg'] = '<font color=green><b>Student Successfully added! </b> ' . ' <br /><br /></font>';
        }
    }
    header("location: ".$saddr);
}//end of the if statement that says we are adding a new record
else if ($_GET['typ'] == "edit") {
    //display_error("I am here");
    $rec = $_POST['rec'];
    if ($regno == '') {
        display_error("Please, specify the Registration Number for this Student");
    }
    else if ($name == '') {
        display_error("Please, enter the name for this student");
    }
    else if ($sex == '') {
        display_error("Please, select the gender for this student");
    }
    else if ($phone == '') {
        display_error("Please, enter the phone number for this student");
    }
    else if ($email == '') {
        display_error("Please, enter the email address for this student");
    }
    
    else {
        //display_error($rec);
        //all is well
        //we shall now insert the refords
        $fields = "matricno,,phone,,email,,nokname,,nokphone,,nokemail,,nokrel,,addtype";
        $vals = "$regno,,$phone,,$email,,$nokname,,$nokph,,$nokem,,$nokrel,,$atyp";
        $result = $ezzzy->updateval($fields, $vals, "dir_members","id",$rec);
        //$result = $ezzzy->runQuery("UPDATE courses SET ccodes='$ccode',ctitle='$ctitle',cunits='$cunit',semester='$csem',ctypes='$ctyp' where id='$rec'");
        if (!$result) {
            $_SESSION["msg"] = '<font color=red><b>Invalid Operation! </b> ' . ' No action taken. Try again<br><br></font>';
        }
        else{
            //we need to let the db know that we have edited our biodata and picture because they said, no need to change photo again
            //$ezzzy->runQuery("Update dir_students SET bstatus='YES',cstatus='YES' WHERE id='$rec'");
            $ezzzy->runQuery("Update dir_students SET bstatus='YES' WHERE id='$rec'");
        }
        
    }//end of the else statekent that says all is well
    $_SESSION["msg"] = '<font color=green><b>Operation Successful! </b> ' . ' <br /><br /></font>';
    //we shall log the person out and log the person in again so as to redirect to the appropraite page
    $u = $ezzzy->getval("regno",$regno,"dir_students","username");
    $p = $ezzzy->getval("regno",$regno,"dir_students","password");
    header('Location: check_login.php?username=' . $u . '&password=' . $p);
    //header("location: ".$saddr);
}//end of the if statement thsta says we are editting an old record
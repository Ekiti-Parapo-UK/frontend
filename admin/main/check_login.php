<?php

//$username = strtolower($_POST['username']); //Set UserName
//$password = strtolower($_POST['password']); //Set Password
$username = ($_REQUEST['username']); //Set UserName
$password = ($_REQUEST['password']); //Set Password
//$typ = $_POST['ltyp'];
include_once("conn.php");
if ($username == '' || $password == '') {
    display_error('All fields are required please...');
}
$msg = '';
if (isset($username, $password)) {
    ob_start();

    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);

    $count = $ezzzy->getrow_two("username", $myusername, "password", $mypassword, "_accounts");
    //display_error($myusername);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count['id'] != 0 && $count['username'] == $myusername) {
        // Register $myusername, $mypassword and redirect to file "admin.php"
        if ($count['position'] == "SuperAdmin") {
            $dett = $ezzzy->getrow_two("username", $myusername, "password", $mypassword, "_servers");
            session_name("SAdmin");
            session_start();
            $_SESSION['name'] = $dett['fullname'];
            $_SESSION['aid'] = $dett['id'];
            $uid = $dett['id'];
            $_SESSION['rec'] = $count['uid'];
            $_SESSION['who'] = "sadmin";
            $_SESSION['where'] = "_accounts";
            $_SESSION['log'] = "YES";
            $_SESSION['swtitle'] = 'ezzzyAdminPanel&#8482;';
            //$_SESSION['position'];

            $action_taken = "Super Admin User '" . $_SESSION['name'] . "' has logged In";
            //$ezzzy->logAction($count['uid'],$action_taken,"uactivity");
            //display_error("I am here");
            header("location:index.php");
        }//end of the if statement that checks if the user is an ADMIN
        if ($count['position'] == "Staff") {
            $dett = $ezzzy->getrow_two("username", $myusername, "password", $mypassword, "dir_staff");
            session_name("SAdmin");
            session_start();
            $_SESSION['name'] = $dett['name'];
            $_SESSION['aid'] = $dett['id'];
            $uid = $dett['id'];
            $_SESSION['rec'] = $count['uid'];
            $_SESSION['who'] = "subadmin";
            $_SESSION['where'] = "dir_staff";
            $_SESSION['log'] = "YES";
            $_SESSION['swtitle'] = 'ezzzyAdminPanel&#8482;';
            $myprivs = array();
            //let us store the privileges of the staff here
            $spr = explode(",", $count['privss']);
            //we shall get the translations now
            for($z = 0; $z < count($spr); $z++){
                $myprivs[] = explode(",", $ezzzy->getval("id",$spr[$z],"privss","roles"));
            }            
            $nmyprivs = array_flatten($myprivs);
            $nmyprivs[] = "home";
            //$_SESSION['privilege'] = $myprivs; //this array is not a single array. So we will have problem
            $_SESSION['privilege'] = $nmyprivs; //this is the array we really want to use
            //print_r($nmyprivs);
            //exit;
            //$_SESSION['position'];

            $action_taken = "Sub - Admin User '" . $_SESSION['name'] . "' has logged In";
            //$ezzzy->logAction($count['uid'],$action_taken,"uactivity");

            header("location:index.php");
        }//end of the if statement that checks if the user is an SUBADMIN
        else if ($count['position'] == "Member") {
            //display_error("This is called");
            $dett = $ezzzy->getrow_two("username", $myusername, "password", $mypassword, "dir_members");
                //session_name("Member");
                session_name("SuperAdmin");
                session_start();
                $_SESSION['name'] = $dett['name'];
                $uid = $dett['id'];
                $_SESSION['rec'] = $count['uid'];
                $_SESSION['who'] = "Member";
                $_SESSION['where'] = "dir_members";
                $_SESSION['log'] = "YES";
                $_SESSION['swtitle'] = 'ezzzyAdminPanel&#8482;';
                $myprivs = array();
                //let us store the privileges of the staff here
                $spr = explode(",", $count['privss']);
                //we shall get the translations now
                for($z = 0; $z < count($spr); $z++){
                    $myprivs[] = explode(",", $ezzzy->getval("id",$spr[$z],"privss","roles"));
                }            
                $nmyprivs = array_flatten($myprivs);
                $nmyprivs[] = "home";
                //$_SESSION['privilege'] = $myprivs; //this array is not a single array. So we will have problem
                $_SESSION['privilege'] = $nmyprivs; //this is the array we really want to use
                
                $action_taken = "User " . $_SESSION['name'] . " has logged In";
                //$ezzzy->logAction($count['uid'],$action_taken,"uactivity");

                header("Location: dashboard.php");
            
        }//end of the if statement that checks if the user is a member
    }//end of the if statement for the userlogins select
    else {
        $msg = "Wrong Username or Password. Please retry";
        display_error($msg);
        //header("location:../login.html?msg=$msg");
    }

    ob_end_flush();
}//end of the if isset $username & $password
else {
    display_error("Please enter some username and password");
    //header("location:../login.html?msg=Please enter some username and password");
}
<?php
include_once('conn.php');
if(isset($_POST['upl'])) {    
           	// let be sure of what we want to do first
         	if (isset($_POST['toad']) && $_POST['toad'] =="add") { 
                     //display_error("I am here again");
                    // check submitted values
                    $l_table = "dir_students";
                    $sess = $_POST['sess'];
                    $batch = $_POST['batch'];
                    $fid = $_POST['fac'];
                    $dep = $_POST['dep'];
                    $prg = $_POST['prg'];
                    $lvl = $_POST['lvl'];
                    //print_r($_POST);
                    //exit;
                    //display_error("FID: ".$fid." DID: ".$dep." PGID: ".$prg);
                    if($lvl == ""){
                        display_error("Please, Select at least the Level for this upload");
                    }
                    //some more validations
                    //if($fac != "")
                        $d = date('Y-m-d');
                         $t = date('H:i:s');
                         $n = 0;
                                                  
                         //$l_table = "phgh";
                         $f0 = prepdate(time());
                         // 
                         if (is_uploaded_file($_FILES['Import']['tmp_name'])) {
                     // check
                         $filename = basename($_FILES['Import']['name']);
                          // copy file to backup directory before restoration
                          move_uploaded_file($_FILES['Import']['tmp_name'], "pics" ."/". $filename);
                         // path to file
                         $filepath = "pics" ."/". $filename; 
                      // process file
                         $sammy = explode(".",$filename);
                         if ($sammy[1] == "txt") {
                             // this is a text file, process it
                             $fhd = fopen($filepath,"rb");
                             if ($fhd){
                                $mn = 0;
                                 while($eline = fgets($fhd)){
                                      // get each line and process it
                                      $lines = explode(",",$eline);
                                      if (!isset($lines[1])) {
                                          $lines[1] ="";
                                      }
                                      if (!isset($lines[2])) {
                                          $lines[2] ="";
                                      }
                                      if (!isset($lines[3])) {
                                          $lines[3] ="";
                                      }
                                      if (!isset($lines[4])) {
                                          $lines[4] ="";
                                      }
                                      if (!isset($lines[5])) {
                                          $lines[5] ="";
                                      }
                                      if (!isset($lines[6])) {
                                          $lines[6] ="";
                                      }
                                      $percent = $extra->calculatePercenAmount($lines[4],50);
                                      $amtg = $percent + $lines[4];
                                      // prepare for database
                                      $field = "name,,phone,,bankn,,bankact,,amountp,,dates,,times,,amounttg,,status,,ttyp,,pdate,,plan";
                                      $vals = "'$lines[0]',,'$lines[1]',,'$lines[2]',,'$lines[3]',,'$lines[4]',,'$d',,'$t',,$amtg,,'NOT PAIRED',,'PH',,'$pdate',,''";
                                      $ezzzy->addlist($field,$vals,$l_table,0);
                                      $mn++;
                                 }
                                 // close file handle
                                 fclose($fhd);
                                 // delete imported file
                                  if ($filepath !="") {
                                      unlink($filepath);
                                  }
                                 $action_taken = "User ". $_SESSION['name'] ." has imported a text file - ". $filename ." ($mn records) - to database";
                                 //$auth->logAction($action_taken,"uactivity");
                                 // show success
                                 $mmsg .= "Your text file ' ". $filename ." ' has been imported successfully. ($mn records)";
                                 show_success($mmsg);
                             }
                             else{
                                 display_error("Error opening file for reading, Please try again");
                             }
                         }
                         elseif ($sammy[1] == "xls") {
                             display_error("I got here");
                             // this is excel file, process it
                             error_reporting(E_ALL ^ E_NOTICE);
                             require_once "functions/excel_reader2.php";
                             //read the excel file
                             if ($data = new Spreadsheet_Excel_Reader($filepath,false)){
                             // process it
                             // hwo many rows of data do we have in sheet 0
                             $nrow = $data->rowcount($e_sheet=0);
                             // how many columns of data do we have
                             $ncol = $data->colcount($e_sheet=0);
                             for($x=2; $x<= $nrow; $x++){
                                      // get column 1
                                      // if column 1 is not telephone, show error 
                                      $cols1 = htmlentities(addslashes($data->value($x,1))); //regno
                                      // echo
                                      // get column 2 
                                      $cols2 = htmlentities(addslashes($data->value($x,2)));//surname
                                      // get column 3 
                                      if (!$data->value($x,3)) {
                                          $cols3 ="";
                                      }
                                      else{
                                          $cols3 = htmlentities(addslashes($data->value($x,3)));//othernames
                                      }
                                      // get column 4 
                                      if (!$data->value($x,4)) {
                                          $cols4 ="";
                                      }
                                      else{
                                          $cols4 = htmlentities(addslashes($data->value($x,4)));//sex
                                      }
                                      // get column 5 
                                      if (!$data->value($x,5)) {
                                          $cols5 ="";
                                      }
                                      else{
                                          $cols5 = htmlentities(addslashes($data->value($x,5)));//phone
                                      }
                                      // get column 6 
                                      if (!$data->value($x,6)) {
                                          $cols6 ="";
                                      }
                                      else{
                                          $cols6 = htmlentities(addslashes($data->value($x,6)));//email
                                      }
                                      // get column 7 
                                      if (!$data->value($x,7)) {
                                          $cols7 ="";
                                      }
                                      else{
                                          $cols7 = htmlentities(addslashes($data->value($x,7)));//parent phone
                                      }
                                      // get column 8 
                                      if (!$data->value($x,8)) {
                                          $cols8 ="";
                                      }
                                      else{
                                          $cols8 = htmlentities(addslashes($data->value($x,8))); //subject combo
                                      }
                                      // get column 9 
                                      if (!$data->value($x,9)) {
                                          $cols9 ="";
                                      }
                                      else{
                                          $cols9 = htmlentities(addslashes($data->value($x,9)));
                                      }
                                      // get column 10 
                                      if (!$data->value($x,10)) {
                                          $cols10 ="";
                                      }
                                      else{
                                          $cols10 = htmlentities(addslashes($data->value($x,10)));
                                      }
                                      // get column 11 
                                      if (!$data->value($x,11)) {
                                          $cols11 ="";
                                      }
                                      else{
                                          $cols11 = htmlentities(addslashes($data->value($x,11)));
                                      }
                                      // get column 12 
                                      if (!$data->value($x,12)) {
                                          $cols12 ="";
                                      }
                                      else{
                                          $cols12 = htmlentities(addslashes($data->value($x,12)));
                                      }
                                      // get column 13 
                                      if (!$data->value($x,13)) {
                                          $cols13 ="";
                                      }
                                      else{
                                          $cols13 = htmlentities(addslashes($data->value($x,13)));
                                      }
                                      // get column 14 
                                      if (!$data->value($x,14)) {
                                          $cols14 ="";
                                      }
                                      else{
                                          $cols14 = htmlentities(addslashes($data->value($x,14)));
                                      }
                                      // get column 15 
                                      if (!$data->value($x,15)) {
                                          $cols15 ="";
                                      }
                                      else{
                                          $cols15 = htmlentities(addslashes($data->value($x,15)));
                                      }
                                      // get column 16 
                                      if (!$data->value($x,16)) {
                                          $cols16 ="";
                                      }
                                      else{
                                          $cols16 = htmlentities(addslashes($data->value($x,16)));
                                      }
                                      // get column 17 
                                      if (!$data->value($x,17)) {
                                          $cols17 ="";
                                      }
                                      else{
                                          $cols17 = htmlentities(addslashes($data->value($x,17)));
                                      }
                                      // get column 18 
                                      if (!$data->value($x,18)) {
                                          $cols18 ="";
                                      }
                                      else{
                                          $cols18 = htmlentities(addslashes($data->value($x,18)));
                                      }
                                      // get column 19 
                                      if (!$data->value($x,19)) {
                                          $cols19 ="";
                                      }
                                      else{
                                          $cols19 = htmlentities(addslashes($data->value($x,19)));
                                      }
                                      // get column 20
                                      if (!$data->value($x,20)) {
                                          $cols20 ="";
                                      }
                                      else{
                                          $cols20 = htmlentities(addslashes($data->value($x,20)));
                                      }
                                      
                                      //let us do some funny things
                                      //we need to get the surname
                                      $names = $cols2." ".$cols3;//Thus is now the full names
                                      //the gender
                                      $gender = ucfirst(strtolower($cols4));
                                      //display_error($gender);
                                      
                                      $field0="";
                                      $vals0="";
                                      //but sincerely, we need to check for duplicate of student number before we proceed
//----create account
$ezzzy->runQuery("INSERT INTO dir_students set colid='$colid', fid='$fid', did='$dep', pgid='$prg', lvlid='$lvl', regno='$cols1', name='$names', sex='$gender', phone='$cols5',email='$cols6',username='$cols1',password='$cols1',nokphone='$cols7',subcombo='$cols8',sessadm='$sess',batc='$batch',astatus='INACTIVE',stdcat='new'") or die(mysqli_error($con));
$uid = $ezzzy->getLastid();

//we shall now generate the scode (This is the admission number)
//$sid = 1000+$uid;
//$scode="NNSS/".date('y')."/".$sid;

//it will be a very good idea to create the parent account at this point
$ezzzy->runQuery("INSERT INTO _accounts(uid,username,password,status,position) VALUES('$uid','$cols1','$cols1','offline','Student')");

                                    
//generate account id
//mysqli_query($con, "UPDATE dir_students set sid=id+20000,scode='$scode' where id='$uid'");


                                  }//end of the for loop
                                  // delete imported file
                                  if ($filepath !="") {
                                      unlink($filepath);
                                  }
                                 $action_taken = "User ". $_SESSION['name'] ." has imported an excel file - ". $filename ." ($nrow records) - to database";
                                 //$auth->logAction($action_taken,"uactivity");
                                 // show success
                                 $mmsg = "Your excel file ' ". $filename ." ' has been imported successfully. ($nrow records)";
                                 //show_success($mmsg);
                                 header("location: dir_students.php");
                             }
                             else{
                                 display_error("Error opening file for reading, Please try again");
                             }
                         }//end of the else statement that its an xls file
                         elseif ($sammy[1] == "xlsx") {
                             // this is excel file, process it
                             error_reporting(E_ALL ^ E_NOTICE);
                             require_once "../functions/excel_reader2.php";
                             //read the excel file
                             if ($data = new Spreadsheet_Excel_Reader($filepath,false)){
                             // process it
                             // hwo many rows of data do we have in sheet 0
                             $nrow = $data->rowcount($e_sheet=0);
                             // how many columns of data do we have
                             $ncol = $data->colcount($e_sheet=0);
                             for($x=1; $x<= $nrow; $x++){
                                      // get column 1
                                      // if column 1 is not telephone, show error 
                                      $cols1 = $data->value($x,1);
                                      // echo
                                      // get column 2 
                                      $cols2 = $data->value($x,2);
                                      // get column 3 
                                      if (!$data->value($x,3)) {
                                          $cols3 ="";
                                      }
                                      else{
                                          $cols3 = $data->value($x,3);
                                      }
                                      // get column 4 
                                      if (!$data->value($x,4)) {
                                          $cols4 ="";
                                      }
                                      else{
                                          $cols4 = $data->value($x,4);
                                      }
                                      // get column 5 
                                      if (!$data->value($x,5)) {
                                          $cols5 ="";
                                      }
                                      else{
                                          $cols5 = $data->value($x,5);
                                      }
                                      // get column 6 
                                      if (!$data->value($x,6)) {
                                          $cols6 ="";
                                      }
                                      else{
                                          $cols6 = $data->value($x,6);
                                      }
                                      // get column 7 
                                      if (!$data->value($x,7)) {
                                          $cols7 ="";
                                      }
                                      else{
                                          $cols7 = $data->value($x,7);
                                      }
                                      // prepare for database
                                      $percent = $extra->calculatePercenAmount($cols5,50);
                                      $amtg = $percent + $cols5;
                                      $field = "name,,phone,,bankn,,bankact,,amountp,,dates,,times,,amounttg,,status,,ttyp,,pdate,,plan";
                                      $vals = "'$cols1',,'$cols2',,'$cols3',,'$cols4',,'$cols5',,'$d',,'$t',,$amtg,,'NOT PAIRED',,'PH',,'$pdate',,''";
                                      //$l_fld = "tgroupid,,gsmnumber,,varable1,,varable2,,varable3,,varable4,,varable5,,varable6,,uid";
                                      //$l_val = "'$f1',,'$cols1',,'$cols2',,'$cols3',,'$cols4',,'$cols5',,'$cols6',,'$cols7',,'$f2'" ;
                                      $ezzzy->addlist($field,$vals,$l_table,0);
                                  }
                                  // delete imported file
                                  if ($filepath !="") {
                                      unlink($filepath);
                                  }
                                 $action_taken = "User ". $_SESSION['name'] ." has imported an excel file - ". $filename ." ($nrow records) - to database";
                                 //$auth->logAction($action_taken,"uactivity");
                                 // show success
                                 $mmsg .= "Your excel file ' ". $filename ." ' has been imported successfully. ($nrow records)";
                                 //show_success($mmsg);
                             }
                             else{
                                 display_error("Error opening file for reading, Please try again");
                             }
                         }
                         elseif ($sammy[1] == "csv") {
                             // this is a csv file
                             $fhd = fopen($filepath,"rb");
                             if ($fhd){
                                 $mn = 0;
                                 while(($lines = fgetcsv($fhd, 1024, ",")) !== FALSE){
                                     // process 
                                      if (!isset($lines[1])) {
                                          $lines[1] ="";
                                      }
                                      if (!isset($lines[2])) {
                                          $lines[2] ="";
                                      }
                                      if (!isset($lines[3])) {
                                          $lines[3] ="";
                                      }
                                      if (!isset($lines[4])) {
                                          $lines[4] ="";
                                      }
                                      if (!isset($lines[5])) {
                                          $lines[5] ="";
                                      }
                                      if (!isset($lines[6])) {
                                          $lines[6] ="";
                                      }
                                      $percent = $extra->calculatePercenAmount($lines[4],50);
                                      $amtg = $percent + $lines[4];
                                      // prepare for database
                                      $field = "name,,phone,,bankn,,bankact,,amountp,,dates,,times,,amounttg,,status,,ttyp,,pdate,,plan";
                                      $vals = "'$lines[0]',,'$lines[1]',,'$lines[2]',,'$lines[3]',,'$lines[4]',,'$d',,'$t',,$amtg,,'NOT PAIRED',,'PH',,'$pdate',,''";
                                      //$l_fld = "tgroupid,,gsmnumber,,varable1,,varable2,,varable3,,varable4,,varable5,,varable6,,uid";
                                      //$l_val = "'$f1',,'$lines[0]',,'$lines[1]',,'$lines[2]',,'$lines[3]',,'$lines[4]',,'$lines[5]',,'$lines[6]',,'$f2'";
                                      $ezzzy->addlist($field,$vals,$l_table,0);
                                   $mn++;
                                 }
                                 // close file handle
                                 fclose($fhd);
                                 // delete imported file
                                  if ($filepath !="") {
                                      unlink($filepath);
                                  }
                                 $action_taken = "User ". $_SESSION['name'] ." has imported a csv file - ". $filename ." ($mn records) - to database";
                                 //$auth->logAction($action_taken,"uactivity");
                                 // show success
                                 $mmsg .= "Your csv file ' ". $filename ." ' has been imported successfully. ($mn records)";
                                 //show_success($mmsg);
                             }
                             else{
                                 display_error("Error opening file for reading, Please try again");
                             }
                         }
                         else{
                            // error
                            display_error("The file to import can only be a text, microsoft excel or csv file.");
                         }
                        
                            ?>
                             <center> <a href="<?php //echo $_SERVER['PHP_SELF']; ?>"> Import Another File </a>  &nbsp; </center>
                            <?php
                         }                        
         			}
         			else {
         				// Display the add new
//                                    if (isset($_GET['gid']) && $_GET['gid'] !="") {
//                                       // process it                                                               
//                                       $gid = cleana($_GET['gid']);
//                                       // get the detail
//                                       $whr = "id";
//                                       $table = "templategroup";
//
//                                     $grp = $ezzzy->getrow($whr,$gid,$table);
//                                    }
                                }
}//end of the if statement that says the submit button has been clicked
<?php
include_once('admin/main/conn.php');
if (isset($_POST['createp'])) {
    $target = "admin/pic";
    $nationality = $_POST['nationality'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $raddr = $_POST['addressr'];
    $country = $_POST['country'];
    $hstate = $_POST['hstate'];
    $hcity = $_POST['hcity'];
    $senated = $_POST['senated'];
    
    $pass = strtolower(generateACode());
    $uname = strtolower($email);

    $now = date('Y-m-d H:i:s');

    if ($name == "" || $phone == "" || $email == "" || $country == "" || $hstate == "" || $hcity == "") {
        display_error("All Fields marked * are required please");
    }
    if ($ezzzy->getrecords("dir_members", "phone", $phone) != 0) {
        display_error("This phone number already exist. Only a phone number is required per member");
    }
    if ($ezzzy->getrecords("dir_members", "email", $email) != 0) {
        display_error("This email already exist. Only an email is required per member");
    }    
     else {
        //all is well        
        $fields = "";
        $vals = "";
        /*         * ****************************************************************************************** */
        $union = $ezzzy->runQuery("INSERT INTO dir_members SET name='$name',sex='$sex',dob='$dob',phone='$phone',email='$email',nationality='$nationality',country='$country',chapter='$hstate',town='$hcity',senated='$senated',raddr='$raddr',username='$uname',password='$pass',datereg='$now'");
        $sid = $ezzzy->getLastid();

        //let us generate the appid
        $cdd = 1000 + $sid;
        $cd = "EKP" . date('y') . "" . $cdd;
        
        //$ezzzy->runQuery("UPDATE dir_members SET regno='$cd',qrcode='$tfname',qrhash='$myrand' WHERE id='$sid'");
        $ezzzy->runQuery("UPDATE dir_members SET regno='$cd' WHERE id='$sid'");
        /*         * ***************************************************************************************************** */

        if ($union) {
            //we can actually send the activation mail here
            //**********************************************************************************/
            $to = $email;
            $subject = "Ekiti-Parapo Registration Confirmation";
            $from = "info@ekitiparapouk.org";
            //let us compose the mail
            $message = "<img src='https://www.ekitiparapouk.org/images/logo.jpeg' />" . "<br /><br />";
            $message .= "Thank you " . $name . ",<br /><br />";
            $message .= "Welcome to Ekiti-Parapo. We are glad to have you on board.<br />";
            $message .= "Your Username is: " . $uname . "<br /> ";
            $message .= "Your Password is: " . $pass . "<br /> ";
            
            $message .= "<br /><br />";
            $message .= "Regards<br />";
            $message .= "Ekiti-Parapo Administrative Team<br /><br />";

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            //mail($to, $subject, $message, $headers);
            
            $extra->sendEmail($to, "", $from, "EkitiParapo", "", "", $subject, $message, strip_tags($message), $smtphost, $smtpmail, $smtppass);
            ///**********************************************************************************/
            //we end the mail sending here
            $ezzzy->runQuery("INSERT INTO _accounts(uid,username,password,position) VALUE('$sid','$uname','$pass','Member')");
            
            header('Location: admin/main/check_login.php?username=' . $uname . '&password=' . $pass);
        }//end of the if statement that says the inser or update was successful
    }//end of the else statement that checks if all isw well
}//end of the else statement that cheks if we are entering the record
$mytitle = "Sign up";
include_once('pages/header.php');
?>

<script type="text/javascript">
    function getState(str) {
        //alert("The cuntry: "+str);
        //str is the country id
        if (str === "") {
            //document.getElementById('supid').value = "";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById('stateselect').innerHTML = xmlhttp.responseText;
                //document.getElementById('hstate').value = xmlhttp.responseText;
                //writer();
                console.log(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET", "admin/main/getstate.php?q=" + str, true);
        //xmlhttp.open("GET", "getstate.php?q=" + str+"&pid="+pid, true);
        xmlhttp.send();
    }//end of the function show state

    function getCity(str) {
        if (str === "") {
            //document.getElementById('supid').value = "";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById('cityselect').innerHTML = xmlhttp.responseText;
                //document.getElementById('hstate').value = xmlhttp.responseText;
                //writer();
                console.log(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET", "admin/main/getcity.php?q=" + str, true);
        //xmlhttp.open("GET", "getstate.php?q=" + str+"&pid="+pid, true);
        xmlhttp.send();
    }//end of the function show state


</script>
<!-- Start main-content -->
<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/web/tede2.jpg">
        <div class="container pt-70 pb-20">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title text-white">My Account</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="./?lnk=home">Home</a></li>
                            <li class="active text-gray-silver">Sign Up</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <h4 class="text-gray mt-0 pt-5"> Sign Up</h4>
                    <hr>
                    <p>Register to be part of us</p>
                    <form name="login-form" method="post" action="./.?lnk=reg" class="clearfix">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_name">Full Name <span class="text-danger">*</span></label>
                                <input id="form_name" name="name" class="form-control" type="text" placeholder="e.g: ezzzy Boluwaji" required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_email">Email <span class="text-danger">*</span></label>
                                <input id="form_email" name="email" class="form-control" type="email" placeholder="e.g: ezzzy@domain.com" required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_phone">Phone <span class="text-danger">*</span></label>
                                <input id="form_phone" name="phone" class="form-control" type="tel" placeholder="e.g: +2348023456789" required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_dob">Birth date <span class="text-danger">*</span></label>
                                <input id="form_dob" name="dob" class="form-control" type="date" placeholder="e.g:" required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_sex">Gender <span class="text-danger">*</span></label>
                                <select id="form_sex" name="sex" class="form-control" required="required">
                                    <option>--Select One--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_addressr">Residential Address <span class="text-danger">*</span></label>
                                <textarea id="form_addressr" name="addressr" class="form-control" placeholder="e.g: 127.0.0.1" required="required"></textarea>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_nationality">Nationality <span class="text-danger">*</span></label>
                                <select id="nationality" name="nationality" class="form-control">
                                    <option value="">--Select One--</option>
                                    <?php
                                    $nat = $ezzzy->runQuery("select * from countries order by name");
                                    foreach ($nat as $fac) {
                                        ?>
                                        <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                        <?php
                                    }//end of the if statement that brings out the faculties
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <hr />
                            <h4>Membership Details</h4>
                            <hr />
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_mcountry">Country <span class="text-danger">*</span></label>
                                <select id="countryselect" name="country" class="form-control" onchange="getState(this.value)">
                                    <option value="">--Select One--</option>
                                    <?php
                                    $facs = $ezzzy->runQuery("select * from countries order by name");
                                    foreach ($facs as $fac) {
                                        ?>
                                        <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                        <?php
                                    }//end of the if statement that brings out the faculties
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_mcountry">Chapter <span class="text-danger">*</span></label>
                                <select id="stateselect" name="hstate" id="hstate" class="form-control" onchange="getCity(this.value)">
                                    <option value="">--Select One--</option>
                                    <?php
                                    $facs1 = $ezzzy->runQuery("select * from states where country_id='160'");
                                    foreach ($facs1 as $fac) {
                                        ?>
                                        <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                        <?php
                                    }//end of the if statement that brings out the faculties
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_mcountry">Town <span class="text-danger">*</span></label>
                                <select id="cityselect" name="hcity" class="form-control">
                                    <option value="">--Select One--</option>
                                    <?php
                                    $facs2 = $ezzzy->getallresult("cites", "name", "A");
                                    foreach ($facs1 as $fac) {
                                        ?>
                                        <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                        <?php
                                    }//end of the if statement that brings out the faculties
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="form_mcountry">Senatorial District <span class="text-danger">*</span></label>
                                <select id="senated" name="senated" class="form-control">
                                    <option value="">--Select One--</option>
                                    <?php
                                    $facs3 = $ezzzy->runQuery("select * from senated order by name");
                                    foreach ($facs3 as $fac) {
                                        ?>
                                        <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                        <?php
                                    }//end of the if statement that brings out the faculties
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="checkbox pull-left mt-15">
                            <label for="form_checkbox">
                                <input id="form_checkbox" name="form_checkbox" type="checkbox" required="required">
                                I agree to <a href="#">Terms &amp; Conditions</a> </label>
                        </div>
                        <div class="form-group pull-right mt-10">
                            <button type="submit" name="createp" class="btn btn-dark btn-sm">Sign up</button>
                        </div>
                        <div class="clear text-center pt-10">
                            Have an account?<a class="text-theme-colored font-weight-600 font-12" href="./?lnk=login"> Login</a> Instead
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end main-content -->

<!-- Footer -->
<?php
include_once('pages/footer.php');

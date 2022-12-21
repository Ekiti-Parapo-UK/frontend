<?php
$module = "administration";
$prev = "msiteinfo";
$shet = "siteinfo";
include_once("pages/phead.php");
include_once("pages/pleft.php");
?>
</div><!-- leftpanelinner -->
</div><!-- leftpanel -->

<div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

        <div class="row">
            <div class="col-md-9 col-lg-8 dash-left">
                <!--This is the beginning of my main contents-->
                <div class="row">
                    <div class="panel panel-inverse panel-site-traffic">
                        <div class="panel-heading">
                            <h4 class="panel-title"> WEBSITE &raquo; INFORMATION MANAGER</h4>
                        </div>

                        <div class="panel-body">
                            <strong><?php echo $_SESSION['msg']; ?></strong>

                            <font color="#990000">This option helps you to add information/contents to the website</font><br><br>
                            <hr>
                            
                            <form name="fm1" method="post" action="sett_siteinfo.php" class="form-horizontal">
                                <input type="hidden" name="proceed" value="yes" />
                                <table class="table-responsive" width="100%">

                                    <tr>

                                        <td width="22%" bgcolor="#FFFFFF">
                                            -<?php echo "Class"; ?>-
                                            <select name="pagee" class="form-control" required>
                                                <option value="">Select page</option>
                                                <option value="home">Home page Welcome Address</option>
                                                <option value="about">About Us</option>
                                                <option value="mision">Our Mission</option>
                                                <option value="vision">Our Vision</option>
                                                <option value="aim">Our Aims/Objectives</option>
                                                <option value="history">Our History</option>
                                                <option value="oriki">Oriki Ilu Tede</option>
                                                <option value="hospital">Facility: Hospital</option>
                                                <option value="school">Facility: Schools</option>
                                                <option value="market">Facility: Markets</option>
                                                <option value="roads">Facility: Road Network</option>
                                                <option value="how2support">How to Support</option>
                                                <option value="contact">Contact Address</option>
                                                <option value="privacy">Privacy Policy</option>
                                                <option value="terms">Terms of Use</option>
                                            </select>
                                        </td>

                                        <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                                        <td width="10%" align="center" bgcolor="#FFFFFF">
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-quirk"> Proceed </button>
                                        </td>

                                    </tr>
                                </table>
                            </form><hr />
                            
                            <?php
                            if (isset($_POST['proceed']) && $_POST['proceed'] == "yes") {
                                //display_error("I am here");
                                //$mysam = new SamMysql($con);
                                $page = $_POST['pagee'];
                                $table = "siteinfo";
                                if ($page == '') {
                                    display_error('You must select a page to edit');
                                }//end of if null value was sent
                                else {
                                    //if all is well
                                    //let us check if the page has been added before
                                    //if it has not been added let us display the form for new information
                                    if ($ezzzy->getrecords($table, "page", $page) == 0) {
                                        //if it has not been added let us display the form for new information
                                        //if($page == 'about'){
                                        ?>
                                        <form enctype="multipart/form-data" action="./?lnk=sett_add_siteinfo&amp;do=new" method="post" onsubmit="return checkb(this)">
                                            <input type="hidden" name="pagg" value="<?php echo $page; ?>" />
                                            <table>
                                                <tr><th>Add Site Information to the <?php echo $page; ?> Page</th></tr>
                                                <tr><td>
                                                        <div><label for="title"> </label> <input class="form-control" type="hidden" name="title"></div>
                                                        <div><label for="text1"> Detail Information</label><textarea class="form-control" id="text11" name="parag1"> </textarea>
                                                            <script language="javascript1.2">
                                                                //generate_wysiwyg('text1');
                                                            </script>
                                                        </div>
                                                        <br />

                                                        <div> <input class="btn btn-success" type="submit" name="Submit" value="Add" id="btnSubmit" onmouseover="" onmouseout="btnSubmit.style.color = '';" />
                                                            <input class="btn btn-primary" type="reset" value=" Reset " id="btnReset" onmouseover="btnReset.style.color = '#FF0011';" onmouseout="btnReset.style.color = '';"/>
                                                        </div>
                                                    </td></tr>
                                            </table>
                                            <script type="text/javascript">
                                                // <--
                                                function checkb(form) {
                                                    if (form.parag1.value === '') {
                                                        alert('Please type or copy and paste the information for this page');
                                                        form.parag1.focus();
                                                        return false;
                                                    }
                                                    if (form.pict.value === '' && form.title1.value !== '') {
                                                        alert('Please select the picture you want to add so that you can upload it');
                                                        form.pict.focus();
                                                        return false;
                                                    }
                                                    return true;
                                                }
                                                // -->
                                            </script>
                                        </form>
                                        <?php
                                    } // end of if page selected is equal to 'about us' and case new information
                                    else if ($ezzzy->getrecords($table, "page", $page) != 0) {
                                        // page already exists, display edit form
                                        $catdetail = $ezzzy->getrow("page", $page, $table);
                                        $pageid = $ezzzy->getval("page", $page, $table, "rec_id");
                                        ?>
                                        <form enctype="multipart/form-data" action="./?lnk=sett_add_siteinfo&amp;do=edit" method="post" onsubmit="return checkb(this)">
                                            <input type="hidden" name="ID" value="<?php echo $pageid; ?>">
                                            <table>
                                                <tr><th>Add Site Information to the <?php echo $page; ?> Page</th></tr>
                                                <tr><td>
                                                        <div><label for="title"> </label> <input class="txt form-control" type="hidden" name="title"></div>
                                                        <div><label for="text1"> Detail Information</label><textarea class="form-control" id="text11" name="parag1"><?php echo $catdetail['detail']; ?> </textarea>
                                                            <script language="javascript1.2">
                                                                //generate_wysiwyg('text1');
                                                            </script>
                                                        </div>
                                                        <br />
                                                        <div> <input type="submit" class="btn btn-success" name="Submit" value=" Add " id="btnSubmit" onmouseover="" onmouseout="" />
                                                            <input type="reset" class="btn small color1" value=" Reset " id="btnReset" onmouseover="btnReset.style.color = '#FF0011';" onmouseout="btnReset.style.color = '';"/>
                                                        </div>
                                                    </td></tr>
                                            </table>
                                            <script type="text/javascript">
                                                // <--
                                                function checkb(form) {
                                                    if (form.parag1.value === '') {
                                                        alert('Please type or copy and paste the information for this page');
                                                        form.parag1.focus();
                                                        return false;
                                                    }
                                                    if (form.pict.value === '' && form.title1.value !== '') {
                                                        alert('Please select the picture you want to add so that you can upload it');
                                                        form.pict.focus();
                                                        return false;
                                                    }
                                                    return true;
                                                }
                                                // -->
                                            </script>
                                        </form>
                                        <?php
                                    } // end of else if page selected is equal to 'about us' and displayed for editting
                                    /*                                     * *************************************************************************************** */
                                }//end of if a ll is well
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <!--/This is the ending of my main contents-->
            </div><!-- col-md-9 -->
            <?php include_once("pages/pright.php"); ?>
        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->

</section>

<?php
include_once("pages/pfooter.php");

<?php
if($_SESSION['sess_active_all'] != "ACTIVE"){
    display_error("This season is not yet activated");    
}
//since all is okay, we shall load his current settings
$csettings = $ezzzy->getrow("pgid",$_SESSION['pgid'],"csettings");
$csem = $csettings['semester'];
$csess = $csettings['sess'];
?>

<script language="javascript">
    function loadclass() {
        val = document.form11.iclass.value;
        window.location.href = 'std_view_details.php?id=<?php echo $recid; ?>&action=setclass&cat=' + val;
//alert(val)
    }
</script>
<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">
        <!-- Nav tabs -->


        <!-- Tab panes -->
        <div class="tab-content">

            <div class="tab-pane active" id="activity">
                <h4>COURSE REGISTRATION FORM</h4>
                <hr />
                <script type="text/javascript" src="ezzzyajax.js"></script>
                <form enctype="multipart/form-data" name="form1" method="post" action="creg_process.php?typ=new">
                    <input type="hidden" name="toad" value="add" />
                    <input type="hidden" name="pgid" value="<?php echo $pgid; ?>" />
                    <input type="hidden" name="lvlid" value="<?php echo $lvlid; ?>" />
                    <input type="hidden" name="csem" value="<?php echo $csem; ?>" />
                    <input type="hidden" name="csess" value="<?php echo $csess; ?>" />
                    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
                    <input type="hidden" name="rec" value="<?php echo $recid; ?>" />
                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you register courses for this semester </font>
                    <br /><br />

                    <table class="table table-bordered table-default table-striped nomargin">
                        <thead class="success">
                            <tr>
                                <th>S/N</th>
                                <th class="text-right">CODE</th>
                                <th class="text-right">TITLE</th>
                                <th class="text-right">UNIT</th>
                                <th class="text-right">TYPE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $atot = array();
                            $schf = $ezzzy->runQuery("SELECT * FROM lvlcourses WHERE pgid='$pgid' and lvlid='$lvlid' and semester='$csem'"); //we shall add the semester in the where clause
                            foreach ($schf as $schfe) {
                                $ccode = $ezzzy->getval("id", $schfe['cid'], "courses", "ccodes");
                                $ctit = $ezzzy->getval("id", $schfe['cid'], "courses", "ctitle");
                                $cunit = $ezzzy->getval("id", $schfe['cid'], "courses", "cunits");
                                $ctyp = $ezzzy->getval("id", $schfe['cid'], "courses", "ctypes");
                                $cctyp = "";
                                if($ctyp == "core"){
                                    $cctyp = "CORE";
                                }
                                else if($ctyp == "RE"){
                                    $cctyp = "RESTRICTED ELECTIVE";                                    
                                }
                                else if($ctyp == "SE"){
                                    $cctyp = "SPECIAL ELECTIVE";                                    
                                }
                                else if($ctyp == "FE"){
                                    $cctyp = "FREE ELECTIVE";                                    
                                }
                                ?>
                                <tr>
                                    <td><?php echo $i; ?>: <input class="" <?php if($ezzzy->getrecords("coursereg","stdid",$adminid,"cid",$schfe['cid'],"sess",$csess,"semester",$dsem) != 0){ echo "checked='checked'"; } ?> type="checkbox" name="cid[]" id="cid[]" value="<?php echo $schfe['cid']; ?>" /></td>
                                    <td class="text-right"><?php echo $ccode; ?></td>
                                    <td class="text-right"><?php echo $ctit; ?></td>
                                    <td class="text-right"><?php echo $cunit; ?></td>
                                    <td class="text-right"><?php echo $cctyp; ?></td>
                                </tr>
                                <?php
                                $i++;
                            }//end of the foerach loop that brings up the payment for this person
                            
                            ?>
                            
                            <tr>
                                <td>#</td>
                                <td>Total</td>
                                <td style="background-color: black; color: white;"><?php //echo toMoney($tamt); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <br />
                    <button type="submit" name="upl" class="btn btn-primary">Continue...</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div><!-- tab-pane -->

        </div>
    </div>
</div>
<?php
//$recid = $_GET['id'];
//$row = $ezzzy->getrow("id",$recid,"dir_students");
?>
<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified nav-line">
            <li class="active"><a href="#activity" data-toggle="tab"><strong>Profile Details</strong></a></li>
            <li><a href="#exams" data-toggle="tab"><strong><!--Exams Result History--></strong></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="activity">

                <div class="panel panel-post-item">
                    <div class="panel-body">
                        <b><?php echo $_SESSION["msg"]; ?></b>

                        <?php
                        echo "<p><font color=#000000><b>Nationality:</b></font> {$row['country']}</p>";
                        echo "<p><font color=#000000><b>State of origin:</b></font> {$row['state']}</p>";
                        echo "<p><font color=#000000><b>Local Govt:</b></font> {$row['lga']}</p>";
                        echo "<p><font color=#000000><b>Religion:</b></font> {}</p>";
                        echo "<p><font color=#000000><b>Blood Group:</b></font> {}</p>";
                        echo "<p><font color=#000000><b>Genotype:</b></font> {}</p>";

                        echo "<hr />";
                        echo "<p><font color=#000000><b>Residential Address:</b></font> {}</p>";
                        
                        echo "<p><font color=#000000><b>Email Address:</b></font> {$row['email']}</p>";
                        echo "<p><font color=#000000><b>Phone Number (1):</b></font> {$row['phone']}</p>";
                        echo "<p><font color=#000000><b>Phone Number (2):</b></font> {}</p>";
                        
                        echo "<hr />";

                        echo "<p><font color=#000000><b>Date Employed:</b></font> {}</p>";
                        
                        ?>
                    </div>

                </div><!-- panel panel-post -->


            </div><!-- tab-pane -->


            <div class="tab-pane" id="exams">
                <h4>Performance (Exams) History</h4>
                <hr />

                <form name="fm1" method="post" action="exm_history_try.php" class="form-horizontal">
                    <input type="hidden" name="stid" value="<?php echo $recid; ?>" />
                    <input type="hidden" name="scode" value="<?php echo $row['regno']; ?>" />
                    <input type="hidden" name="fullname" value="<?php echo $row['name']; ?>" />
                    <table class="table-responsive" width="100%">

                        <tr>

                            <td width="20%" bgcolor="#FFFFFF">
                                -Academic Session-
                                <select name="dsession" class="form-control" required>
                                    <option value="">--Select One--</option>
                                    <?php
                                        $ses = $ezzzy->getallresult("sesses");
                                        foreach($ses as $sess){
                                    ?>
                                    <option value="<?php echo $sess['id']; ?>"><?php echo $sess['name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                            <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                            <td width="20%" bgcolor="#FFFFFF">
                                -Semester-
                                <select name="dterm" class="form-control" required>                                    
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                                </select>
                            </td>
                            <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>
                            <td width="20%" bgcolor="#FFFFFF">
                                -Level/Part-
                                <select name="dclass" class="form-control" required>
                                    <option value="">--Select One--</option>
                                </select>
                            </td>
                            <td width="1%" bgcolor="#FFFFFF">&nbsp;</td>

                            <td width="10%" align="center" bgcolor="#FFFFFF">
                                <br>
                                <button type="submit" class="btn btn-primary btn-quirk"> View Result </a>
                            </td>

                        </tr>
                    </table>
                </form>

            </div><!-- tab-pane -->

        </div>
    </div>
</div>
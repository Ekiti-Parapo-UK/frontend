<?php
//$recid = $_GET['id'];
//$row = $ezzzy->getrow("id",$recid,"dir_students");
?>
<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified nav-line">
            <li class="active"><a href="#activity" data-toggle="tab"><strong>Profile Details</strong></a></li>
            <li><a href="#exams" data-toggle="tab"><strong>--</strong></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="activity">

                <div class="panel panel-post-item">
                    <div class="panel-body">
                        <b><?php echo $_SESSION["msg"]; ?></b>

                        <?php
                        echo "<p><font color=#000000><b>Nationality:</b></font> {$row['nationality']}</p>";
                        echo "<p><font color=#000000><b>Chapter:</b></font> {$row['ostate']}</p>";
                        echo "<p><font color=#000000><b>Town:</b></font> {$row['lga']}</p>";
                        //echo "<p><font color=#000000><b>Religion:</b></font> {$row['religion']}</p>";
                        //echo "<p><font color=#000000><b>Blood Group:</b></font> {$row['bgroup']}</p>";
                        //echo "<p><font color=#000000><b>Genotype:</b></font> {$row['gtype']}</p>";

                        echo "<hr />";
                        echo "<p><font color=#000000><b>Residential Address:</b></font> {$row['raddr']}</p>";
                        
                        echo "<p><font color=#000000><b>Email Address:</b></font> {$row['email']}</p>";
                        echo "<p><font color=#000000><b>Phone Number (1):</b></font> {$row['phone']}</p>";
                        echo "<p><font color=#000000><b>Phone Number (2):</b></font> {$row['phone2']}</p>";
                        //echo "<p><font color=#000000><b>Parent/Sponsor:</b></font> {$row['pname']}</p>";
                        //echo "<p><font color=#000000><b>Relationship:</b></font> {$row['prel']}</p>";
                        echo "<hr />";

                        echo "<p><font color=#000000><b>Date Registered:</b></font> {$row['datereg']}</p>";
                        //echo "<p><font color=#000000><b>Class Admitted:</b></font> {$row['class_admit']}</p>";
                        //echo "<p><font color=#000000><b>Previous School:</b></font> {$row['prevschool']}</p>";
                        
                        ?>
                    </div>

                </div><!-- panel panel-post -->


            </div><!-- tab-pane -->


            <div class="tab-pane" id="exams">
                <h4>---</h4>
                <hr />

            </div><!-- tab-pane -->

        </div>
    </div>
</div>
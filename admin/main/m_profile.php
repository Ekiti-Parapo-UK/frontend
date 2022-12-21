<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="activity">

                <div class="panel panel-post-item">
                    <div class="panel-body">
                        <b><?php echo $_SESSION["msg"]; ?></b>

                        <?php
                        //if($tbal>0) {
                        //echo "<p><font color=#FF0000><b>Total Debt: {$tdebt}</b></font></p>";
                        //}
                        echo "<p><font color=#000000><b>Nationality:</b></font> {$nationality}</p>";
                        echo "<p><font color=#000000><b>Country:</b></font> {$country}</p>";
                        echo "<p><font color=#000000><b>Chapter:</b></font> {$chapter}</p>";
                        echo "<p><font color=#000000><b>Town:</b></font> {$town}</p>";
                        echo "<p><font color=#000000><b>Senatorial District:</b></font> {$senated}</p>";
                        //echo "<p><font color=#000000><b>Genotype:</b></font> {$gtype}</p>";

                        /*echo "<hr>";
                        echo "<p><font color=#000000><b>Residential Address:</b></font> {$raddress}</p>";
                        if ($rcity !== '' and $rstate !== '') {
                            echo "<p>{$rcity}, {$rstate} state</p>";
                        }
                        echo "<p><font color=#000000><b>Email Address:</b></font> {$email}</p>";
                        echo "<p><font color=#000000><b>Phone Number (1):</b></font> {$phone}</p>";
                        echo "<p><font color=#000000><b>Phone Number (2):</b></font> {$phone2}</p>";
                        echo "<p><font color=#000000><b>Parent/Sponsor:</b></font> {$pname}</p>";
                        echo "<p><font color=#000000><b>Relationship:</b></font> {$prel}</p>";
                        echo "<hr>";

                        echo "<p><font color=#000000><b>Date Admitted:</b></font> {$date_admit}</p>";
                        echo "<p><font color=#000000><b>Class Admitted:</b></font> {$class_admit}</p>";
                        echo "<p><font color=#000000><b>Previous School:</b></font> {$prevschool}</p>";*/
                        ?>
                    </div>

                </div><!-- panel panel-post -->


            </div><!-- tab-pane -->


        </div>
    </div>
</div>
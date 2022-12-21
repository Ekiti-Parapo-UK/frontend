<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">
        <!-- Nav tabs -->


        <!-- Tab panes -->
        <div class="tab-content">

            <div class="tab-pane active" id="activity">
                <h4>LOGIN MANAGER</h4>
                <p><b>Setup self-service login for selected staff member</b>
                    <br /><font color="#990000">(Make password field blank if you wish to disable login for this person)</font></p>
                <hr>
                <form name="form11" method="post" action="staff_update_login.php">
                    <input type="hidden" name="rec" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="profile" value="<?php echo $profile; ?>">
                    <input type="hidden" name="ssid" value="<?php echo $row['ssid']; ?>">
                    <input type="hidden" name="fullname" value="<?php echo $row["fullname"]; ?>">
                    <input type="hidden" name="gender" value="<?php echo $row["gender"]; ?>">
                    <input type="hidden" name="phone" value="<?php echo $row["phone"]; ?>">
                    <input type="hidden" name="uid" value="<?php echo $id; ?>">
                    <b><?php echo $_SESSION["msg"]; ?></b>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Username/Email Address:</label>
                            <div class="col-sm-9">
                                <p><input name="text" type="email" value="<?php echo $row["email"]; ?>" class="form-control" required></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password:</label>
                            <div class="col-sm-9">
                                <p><input name="pword" type="text" value="<?php echo $row['pword']; ?>" class="form-control"></p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">&nbsp; </label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary"> Update </button>
                                <a href="staff_view_details.php?id=<?php echo $recid; ?>" class="btn btn-default" >Cancel</a>
                            </div>	
                        </div>
                    </div>
                </form>
            </div><!-- tab-pane -->

        </div>
    </div>
</div>
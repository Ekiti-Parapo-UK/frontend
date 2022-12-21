<?php
$prev = "mstdpropoiif";
include('pcheck.php');
?>
<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">
        <!-- Nav tabs -->


        <!-- Tab panes -->
        <div class="tab-content">

            <div class="tab-pane active" id="activity">
                <h4>STUDENT LOGIN MANAGER</h4>
                <hr />
                <form enctype="multipart/form-data" name="form1" method="post" action="sett_add_login.php?typ=edit">
                    <input type="hidden" name="toad" value="add" />
                    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
                    <input type="hidden" name="rec" value="<?php echo $recid; ?>" />
                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you creates a new password for the Student </font>
                    <br><br />

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Student Reg. No.: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input readonly="true" type="text" name="regno" id="regno" value="<?php echo $row['regno']; ?>" required="required" class="form-control" placeholder="Enter Student Reg. No. here e.g 12345678HJ:" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">New Password: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="pass" id="pass" value="" required="required" class="form-control" placeholder="Enter a new password for the student here" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <br />
                    <button type="submit" name="upl" class="btn btn-primary">Continue...</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div><!-- tab-pane -->

        </div>
    </div>
</div>
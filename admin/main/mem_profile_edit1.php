<script language="javascript">
    function loadclass() {
        val = document.form11.iclass.value;
        window.location.href = 'mem_view_details.php?id=<?php echo $recid; ?>&action=setclass&cat=' + val;
//alert(val)
    }
</script>
<?php
/*$atype = "";
if ($row['addtype'] == "REG") {
    $atype = "Regular";
} else if ($row['addtype'] == "DE") {
    $atype = "Direct Entry";
}*/
?>
<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">
        <!-- Nav tabs -->


        <!-- Tab panes -->
        <div class="tab-content">

            <div class="tab-pane active" id="activity">
                <h4>PROFILE MANAGER</h4>
                <hr />
                <script type="text/javascript" src="ezzzyajax.js"></script>
                <form enctype="multipart/form-data" name="form1" method="post" action="sett_add_mem.php?typ=edit">
                    <input type="hidden" name="toad" value="add" />
                    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
                    <input type="hidden" name="rec" value="<?php echo $recid; ?>" />
                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you edit the details of an existing member </font>
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
                            <label class="col-sm-3 control-label">Student Name (Surname First): </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required="required" class="form-control" placeholder="e.g: BALA Chukwuemeka Olajide" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gender: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="sex" id="sex" class="form-control" required="required">
                                        <option value="<?php echo $row['sex']; ?>"><?php echo $row['sex']; ?></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Phone Number: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required="required" class="form-control" placeholder="Enter Staff Phone Number here..e.g: 08064980757" />
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email Address: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control" required="required" placeholder="Enter Staff Phone Number here..e.g: zinconewton2@yahoo.com" />
                                </p>
                            </div>

                        </div>
                    </div>

                    
                    <hr />

                    
                    <br />
                    <button type="submit" name="upl" class="btn btn-primary">Continue...</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div><!-- tab-pane -->

        </div>
    </div>
</div>
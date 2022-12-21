<!-- Modal -->
<form enctype="multipart/form-data" name="form1" method="post" action="sett_change_password.php?typ=new">
    <input type="hidden" name="toad" value="add" />
    <input type="hidden" name="reccid" value="<?php echo $adminid; ?>" />
    <input type="hidden" name="who" value="<?php echo $_SESSION['who']; ?>" />
    <input type="hidden" name="where" value="<?php echo $_SESSION['where']; ?>" />
    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
    <div class="modal bounceIn animated" id="myPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Change Password (<?php //echo $ezzzy->getval("id",$adminid,$_SESSION['where'],"name"); ?>)</h4>
                </div>
                <div class="modal-body2">

                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you change your old password to a new one </font>
                    <br><br />
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Old Password: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="password"  name="opass" id="opass" required="required" class="form-control" placeholder="Enter old password" />
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">New Password: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="password" name="npass" id="npass" required="required" class="form-control" placeholder="Enter new password" />
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Confirm New Password: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="password" name="cnpass" id="cnpass" required="required" class="form-control" placeholder="Confirm your new password" />
                                </p>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <br />
                    <button type="submit" name="upl" class="btn btn-primary">Change</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
</form>

<!-- modal -->
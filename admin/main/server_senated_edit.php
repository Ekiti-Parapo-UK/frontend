<?php
$id = @$row['id'];
?>
<!-- Modal -->
<form name="form1" method="post" action="sett_add_senated.php?typ=edit">
    <div class="modal bounceIn animated" id="myModalSenatedEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <input type="hidden" name="rec" value="<?php echo $id; ?>" />
        <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit District (<?php echo $row['name']; ?>)</h4>
                </div>
                <div class="modal-body2">

                    <b><?php echo @$_SESSION["msg"]; ?></b>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Senatorial District" required /></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><textarea name="desc" class="form-control" placeholder="..." required><?php echo $row['descp']; ?></textarea></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <br />
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
</form>

<!-- modal -->
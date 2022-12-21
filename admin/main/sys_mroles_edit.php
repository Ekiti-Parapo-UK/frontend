<?php
$id = @$row['id'];
//we shall break all the roles so we can use it for somethng good
$roles = explode(",", $row['roles']);
?>
<!-- Modal -->
<form name="form1" method="post" action="sett_add_mroles.php?typ=edit">
    <div class="modal bounceIn animated" id="myModalPrivEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <input type="hidden" name="rec" value="<?php echo $id; ?>" />
        <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Privileges/RoleName (<?php echo $row['rolename']; ?>)</h4>
                </div>
                
                <div class="modal-body2">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><input type="text" name="rname" value="<?php echo $row['rolename']; ?>" class="form-control" placeholder="Faculty name..." required /></p>
                                <?php print_r($roles); ?>
                            </div>
                        </div>
                    </div>
                    
                    <p><input type="checkbox" name="role[]" class="" value="mupstd" <?php if(in_array("mupstd",$roles)){echo "checked=checked"; }?> /> Ability to upload New Students Lists</p>
                    <p><input disabled="true" type="checkbox" name="role[]" class="" value="mro" <?php if(in_array("mro",$roles)){echo "checked=checked"; }?> /> Ability to Manage Roles</p>
                    <p><input disabled="true" type="checkbox" name="role[]" class="" value="mas" <?php if(in_array("mas",$roles)){echo "checked=checked"; }?> /> Ability to Assign Roles</p>
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
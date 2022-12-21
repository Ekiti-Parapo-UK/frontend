<!-- Modal -->
<div class="modal bounceIn animated" id="myModalDeactivate<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirm Action</h4>
            </div>
            <div class="modal-body">
                <form name="form1" method="post" action="confirm_deactivate_std_yes.php">
                    <input type="hidden" name="profile" value="<?php echo $profile; ?>" />
                    <font color="#990000">Do you really want to deactivate this student's profile ? </font>
                    <br /><br />
                    <button type="submit" class="btn btn-primary">Yes Deactivate</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
<!-- Modal -->
<div class="modal bounceIn animated" id="myModalDelete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
      </div>
      <div class="modal-body">
          <form name="form1" method="post" action="server_delete_things_process.php?typ=<?php echo $typ; ?>&addr=<?php echo $serveradd; ?>">
			   <input type="hidden" name="rec" value="<?php echo $row['id']; ?>" />
               <font color="#990000">Do you really wish to delete this record? </font>
			   <br /><br />
        <button type="submit" class="btn btn-primary">Yes Delete</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </form>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->
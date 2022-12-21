<?php
$id = @$row['id'];
?>

<!-- Modal -->
<form name="form1" method="post" action="sett_add_events.php?typ=edit">
    <div class="modal bounceIn animated" id="myModalEventEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <input type="hidden" name="rec" value="<?php echo $id; ?>" />
        <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Event (<?php echo $row['title']; ?>)</h4>
                </div>
                <div class="modal-body2">

                    <b><?php echo @$_SESSION["msg"]; ?></b>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Event Title <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><input type="text" name="ntitle" value="<?php echo $row['title']; ?>" class="form-control" placeholder="News title..." required /></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Event Date <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><input type="date" name="edate" value="<?php echo $row['dates']; ?>" class="form-control" placeholder="News title..." required /></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Event Time <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><input type="time" name="etime" value="<?php echo $row['times']; ?>" class="form-control" placeholder="News title..." required /></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Event Venue <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><input type="text" name="even" value="<?php echo $row['venue']; ?>" class="form-control" placeholder="News title..." required /></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description of News <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><textarea name="ndesc" id="textt1<?php echo $id; ?>" class="form-control" placeholder="Event Description..." required><?php echo $row['descp']; ?></textarea></p>
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

<script src="../lib/jquery/jquery.js"></script>
<script src="../lib/bootstrap/js/bootstrap.js"></script>
<script src="../lib/wysihtml5x/wysihtml5x.js"></script>
<script src="../lib/wysihtml5x/wysihtml5x-toolbar.js"></script>
<script src="../lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.all.js"></script>

<script type="text/javascript">
    $('#myModalEventEdit<?php echo $id; ?>').on('shown.bs.modal', function() {
  $('#textt1<?php echo $id; ?>').wysihtml5({
    toolbar: {
      fa: true
    }
  });
});

</script>
<!-- modal -->
<!-- Modal -->
<form name="form1" method="post" action="msg_send.php">
    <input type="hidden" name="durl" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" />
    <input type="hidden" name="receiver_name" value="<?php echo $receiver_name; ?>" />
    <input type="hidden" name="receiver_email" value="<?php echo $receiver_email; ?>" />

    <div class="modal bounceIn animated" id="myModalMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Send Message</h4>
                </div>
                <div class="modal-body2">

                    <font color="#990000"><b>Send a private message to <?php echo $receiver_name; ?> </b></font>
                    <br><br />


                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Subject: <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><input type="text" name="subject" class="form-control" placeholder="Subject" required></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Message: <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><textarea name="message" class="form-control" placeholder="Your Message" rows="7" required></textarea></p>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <br />
                    <button type="submit" class="btn btn-primary">Send Message</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
</form>

<!-- modal -->
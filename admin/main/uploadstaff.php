<?php
$prev = "mupstf";
include_once("pcheck.php");
?>
<!-- Modal -->
<script type="text/javascript" src="ezzzyajax.js"></script>
<form enctype="multipart/form-data" name="form1" method="post" action="upstaff.php">
    <input type="hidden" name="toad" value="add" />
    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
    <div class="modal bounceIn animated" id="myModalUploadStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Upload Staff</h4>
                </div>
                <div class="modal-body2">

                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you upload multiple students based on some criteria </font>
                    <br><br />

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Faculty: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="fac" id="fac" class="form-control" onChange="showDept(this.value);">
                                        <option value="">--</option>
                                        <?php
                                        $facs = $ezzzy->getallresult("faculties","name","A");
                                         foreach($facs as $fa){
                                            ?>
                                        <option value="<?php echo $fa['id']; ?>"><?php echo $fa['name']; ?></option>
                                        <?php
                                         }//end of the foreach loop for the faculties
                                        ?>
                                    </select>
                                </p>
                            </div>

                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Department: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="dep" id="dep" class="form-control" onchange="showProg(this.value);">
                                        <option value="">--</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Upload File (*.xls*): </label>
                            <div class="col-sm-6">
                                <p><input type="file" name="Import" class="form-control" /></p>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <br />
                    <button type="submit" name="upl" class="btn btn-primary">Continue...</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
</form>

<!-- modal -->
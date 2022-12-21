<?php
$prev = "mupstd";
include_once("pcheck.php");
?>
<!-- Modal -->
<script type="text/javascript" src="ezzzyajax1.js"></script>
<form enctype="multipart/form-data" name="form1" method="post" action="upstd.php">
    <input type="hidden" name="toad" value="add" />
    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
    <div class="modal bounceIn animated" id="myModalUploadStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Upload Students</h4>
                </div>
                <div class="modal-body2">

                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you upload multiple students based on some criteria </font>
                    <br /><br />
                    
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Session: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="sess" id="sess" class="form-control" onchange="showBatch1mm(this.value);">
                                        <option value="">--</option>
                                        <?php
                                        $sess = $ezzzy->getallresult("sesses","name","A");
                                         foreach($sess as $se){
                                            ?>
                                        <option value="<?php echo $se['id']; ?>"><?php echo $se['name']; ?></option>
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
                            <label class="col-sm-3 control-label">Batch: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="batch" id="batch" class="form-control">
                                        <option value="">--</option>
                                        <?php
                                        $batch = $ezzzy->getallresult("batches","name","A");
                                         foreach($batch as $se){
                                            ?>
                                        <option value="<?php echo $se['id']; ?>"><?php echo $se['name']; ?></option>
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
                            <label class="col-sm-3 control-label">Faculty: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="fac" id="fac1" class="form-control" onChange="showDept1(this.value);">
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
                                    <select name="dep" id="dep1" class="form-control" onchange="showProg1(this.value);">
                                        <option value="">--</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Programme: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="prg" id="prg1" class="form-control" onchange="showLevel1(this.value);" required="required">
                                        <option value="">--</option>
                                        <?php
                                            $pgs = $ezzzy->runQuery("SELECT id,name from programmes WHERE did=''");
                                            foreach($pgs as $pg){
                                        ?>
                                        <option value="<?php echo $pg['id']; ?>"><?php echo $pg['name']; ?></option>
                                        <?php
                                            }//end of the for each loop
                                        ?>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Level: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="lvl" id="lvl1" class="form-control" required="required">
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
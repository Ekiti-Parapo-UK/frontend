<?php
$id = @$row['id'];
?>
<!-- Modal -->
<form name="form1" method="post" action="sett_add_expenditure.php?typ=edit">
    <div class="modal bounceIn animated" id="myModalExpenseEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <input type="hidden" name="rec" value="<?php echo $id; ?>" />
        <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Expense (<?php //echo $row['name']; ?>)</h4>
                </div>
                <div class="modal-body2">

                    <b><?php echo @$_SESSION["msg"]; ?></b>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Subhead Code <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p>
                                    <select  name="subhtyp"class="form-control" required="required">
                                        <option value="<?php echo $row['scode']; ?>"><?php echo $ezzzy->getval("id",$row['scode'],"subheads","code")." - ".$ezzzy->getval("id",$row['scode'],"subheads","descp"); ?></option>
                                        <?php
                                        $ex = $ezzzy->getallrow("subheadtype", "Expenditure", "subheads");
                                        foreach ($ex as $exp) {
                                            ?>
                                            <option value="<?php echo $exp['id']; ?>"><?php echo $exp['code'] . " - " . $exp['descp']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p>
                                    <input type="number" name="amt" value="<?php echo $row['amount']; ?>" class="form-control" placeholder="E.g: 1000" required="required" />
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Date <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><input type="date" name="dat" value="<?php echo $row['dates']; ?>" class="form-control" placeholder="Supplier phone..." required /></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Note <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p><textarea name="notes" class="form-control" placeholder="Other notes" required><?php echo $row['descp']; ?></textarea></p>
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
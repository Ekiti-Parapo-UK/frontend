<!-- Modal -->
<script type="text/javascript" src="ezzzyajax.js"></script>
<form enctype="multipart/form-data" name="form1" method="post" action="sett_add_std.php?typ=new">
    <input type="hidden" name="toad" value="add" />
    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
    <div class="modal bounceIn animated" id="myModalNewStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Student</h4>
                </div>
                <div class="modal-body2">

                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you add a new Student </font>
                    <br><br />

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Reg. No.: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="regno" id="regno" required="required" class="form-control" placeholder="Enter Student Reg. No. here e.g 12345678HJ:" />
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Student's Surname: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="sname" id="sname" required="required" class="form-control" placeholder="e.g: BALA" />
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Student's Other names: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="oname" id="oname" required="required" class="form-control" placeholder="e.g: BALA Chukwuemeka Olajide" />
                                </p>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gender: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="sex" id="sex" class="form-control" required="required">
                                        <option value="">--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </p>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Phone Number: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="phone" id="phone" required="required" class="form-control" placeholder="Enter Staff Phone Number here..e.g: 08064980757" />
                                </p>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email Address: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Enter Staff Phone Number here..e.g: zinconewton2@yahoo.com" />
                                </p>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Session: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="sess" id="sess" class="form-control" onchange="showBatchmm(this.value);">
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
                            <label class="col-sm-3 control-label">Programme: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="prg" id="prg" class="form-control" onchange="showLevel(this.value);" required="required">
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
                                    <select name="lvl" id="lvl" class="form-control" required="required">
                                        <option value="">--</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                                                            
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Admission Type: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="atyp" id="styp" class="form-control">
                                        <option value="">--</option>
                                        <option value="REG">Regular</option>
                                        <option value="DE">Direct Entry</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr />
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Next of kin Name: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="nokname" id="nokname" required="required" class="form-control" placeholder="e.g: BALA Chukwuemeka Olajide" />
                                </p>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Next of kin Phone: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="nokph" id="nokph" required="required" class="form-control" placeholder="e.g: 08064980757" />
                                </p>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Next of kin Email: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="email" name="nokem" id="nokem" required="required" class="form-control" placeholder="e.g: zinconewton2@yahoo.com" />
                                </p>
                            </div>

                        </div>
                    </div>
                    
                                                            
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Next of kin Relationship: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="nokrel" id="nokrel" class="form-control">
                                        <option value="">--</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Uncle">Uncle</option>
                                        <option value="Aunt">Aunt</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </p>
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
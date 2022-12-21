<div class="col-md-6 col-lg-8 profile-right">
            <div class="profile-right-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-justified nav-line">
                <li class="active"><a href="#activity" data-toggle="tab"><strong>Bio-data</strong></a></li>
                <li><a href="#photos" data-toggle="tab"><strong>Change Photo</strong></a></li>
                <li><a href="#music" data-toggle="tab"><strong>News</strong></a></li>
                <li><a href="#places" data-toggle="tab"><strong>Contact Us</strong></a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="activity">
                <h4>PROFILE MANAGER</h4>
                <hr />
                <script type="text/javascript" src="ezzzyajax.js"></script>
                <form enctype="multipart/form-data" name="form1" method="post" action="sett_add_std.php?typ=edit">
                    <input type="hidden" name="toad" value="add" />
                    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
                    <input type="hidden" name="rec" value="<?php echo $recid; ?>" />
                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you edit the details of an existing Student </font>
                    <br><br />

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Student Reg. No.: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input readonly="true" type="text" name="regno" id="regno" value="<?php echo $row['regno']; ?>" required="required" class="form-control" placeholder="Enter Student Reg. No. here e.g 12345678HJ:" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Student Name (Surname First): </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required="required" class="form-control" placeholder="e.g: BALA Chukwuemeka Olajide" />
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
                                        <option value="<?php echo $row['sex']; ?>"><?php echo $row['sex']; ?></option>
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
                                    <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required="required" class="form-control" placeholder="Enter Staff Phone Number here..e.g: 08064980757" />
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email Address: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control" required="required" placeholder="Enter Staff Phone Number here..e.g: zinconewton2@yahoo.com" />
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Faculty: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select readonly="true" name="fac" id="fac" class="form-control" onChange="showDept(this.value);">
                                        <option value="<?php echo $row['fid']; ?>"><?php echo $ezzzy->getval("id", $row['fid'], "faculties", "name"); ?></option>
                                        <?php
                                        $facs = $ezzzy->getallresult("faculties", "name", "A");
                                        foreach ($facs as $fa) {
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
                                    <select readonly="true" name="dep" id="dep" class="form-control" onchange="showProg(this.value);">
                                        <option value="<?php echo $row['did']; ?>"><?php echo $ezzzy->getval("id", $row['did'], "departments", "name"); ?></option>
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
                                    <select readonly="true" name="prg" id="prg" class="form-control" onchange="showLevel(this.value);" required="required">
                                        <option value="<?php echo $row['pgid']; ?>"><?php echo $ezzzy->getval("id", $row['pgid'], "programmes", "name"); ?></option>
                                        <?php
                                        $pgs = $ezzzy->runQuery("SELECT id,name from programmes WHERE did=''");
                                        foreach ($pgs as $pg) {
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
                                    <select readonly="true" name="lvl" id="lvl" class="form-control" required="required">
                                        <option value="<?php echo $row['lvlid']; ?>"><?php echo $ezzzy->getval("id", $row['lvlid'], "levels", "name"); ?></option>
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
                                        <option value="<?php echo $row['addtype']; ?>"><?php echo $atype; ?></option>
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
                            <label class="col-sm-3 control-label">Name of Parent/Sponsor: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="nokname" id="nokname" value="<?php echo $row['nokname']; ?>" required="required" class="form-control" placeholder="e.g: BALA Chukwuemeka Olajide" />
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Phone Number of Parent/Sponsor: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="text" name="nokph" id="nokph" value="<?php echo $row['nokphone']; ?>" required="required" class="form-control" placeholder="e.g: 08064980757" />
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email of Parent/Sponsor: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input type="email" name="nokem" id="nokem" value="<?php echo $row['nokemail']; ?>" required="required" class="form-control" placeholder="e.g: zinconewton2@yahoo.com" />
                                </p>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sponsor Relationship: </label>
                            <div class="col-sm-6">
                                <p>
                                    <select name="nokrel" id="nokrel" class="form-control">
                                        <option value="<?php echo $row['nokrel']; ?>"><?php echo $row['nokrel']; ?></option>
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


                    <br />
                    <button type="submit" name="upl" class="btn btn-primary">Continue...</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div><!-- tab-pane -->

                <div class="tab-pane" id="photos">
                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                <div class="tab-pane" id="music">
                  Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
                </div>
              </div>
            </div>
          </div>
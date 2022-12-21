<script language="javascript">
    function loadclass() {
        val = document.form11.iclass.value;
        window.location.href = 'staff_view_details.php?id=<?php echo $recid; ?>&action=setclass&cat=' + val;
//alert(val)
    }
</script>
<?php
//let us get the members privilleges
$mpri = $ezzzy->getOne("SELECT privss fROM _accounts WHERE uid='$recid' and position='Staff'");
$mpriv = explode(",", $mpri['privss']);
?>
<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">
        <!-- Nav tabs -->


        <!-- Tab panes -->
        <div class="tab-content">

            <div class="tab-pane active" id="activity">
                <h4>PRIVILEGE/ROLE MANAGER</h4>
                <hr />
                <script type="text/javascript" src="ezzzyajax.js"></script>
                <form enctype="multipart/form-data" name="form1" method="post" action="sett_add_staffpriv.php?typ=new">
                    <input type="hidden" name="toad" value="add" />
                    <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
                    <input type="hidden" name="rec" value="<?php echo $recid; ?>" />
                    <b><?php echo $_SESSION["msg"]; ?></b>
                    <font color="#990000">This option helps you manage the privileges/Roles of an existing Staff </font>
                    <br><br />

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Staff. ID.: </label>
                            <div class="col-sm-6">
                                <p>
                                    <input readonly="true" type="text" name="regno" id="regno" value="<?php echo $row['staffid']; ?>" required="required" class="form-control" placeholder="Enter Student Reg. No. here e.g 12345678HJ:" />
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Roles: </label>
                            <div class="col-sm-6">
                                <?php
                                 $pri = $ezzzy->runQuery("SELECT id,rolename from privss order by rolename");
                                 foreach($pri as $priv){
                                ?>
                                <p> <input type="checkbox" name="pri[]" id="pri[]" value="<?php echo $priv['id']; ?>" <?php if(in_array($priv['id'], $mpriv)){echo "checked=checked"; }?> class="" /> <?php echo $priv['rolename']; ?> </p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <br />
                    <button type="submit" name="upl" class="btn btn-primary">Continue...</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div><!-- tab-pane -->

        </div>
    </div>
</div>
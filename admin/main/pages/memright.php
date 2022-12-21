<?php
include_once("../conn.php");
?>
<script type="text/javascript" src="../ezzzyajax.js"></script>
<div class="col-sm-4 col-md-3 col-lg-2">

    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title">Filter Members</h4>
        </div>
        <div class="panel-body">
            <form method="post" action="dir_members.php" name="form11">
             
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="ID or Name" value="" />
                </div>
              
                <div class="form-group">
                    <label class="control-label center-block">Gender:</label>
                    <label class="ckbox ckbox-inline mr20">
                        <input checked="checked" type="checkbox" name="ifemale" value="yes"/><span>Female</span>
                    </label>
                    <label class="ckbox ckbox-inline">
                        <input checked="checked" type="checkbox" name="imale" value="yes" /><span>Male</span>
                    </label>
                </div>
                <button name="filter" type="submit" class="btn btn-success btn-quirk btn-block">Filter List</button>
            </form>
        </div>
    </div><!-- panel -->

    <div class="panel list-announcement">

        <div class="panel-footer">

            <!--<a href="./?lnk=dir_students" class="btn btn-default-active active btn-quirk btn-block">Students Directory</a>-->
            <a href="./?lnk=dir_staff" class="btn btn-default-active active btn-quirk btn-block">Staff Directory</a>
        </div>
    </div>
</div>
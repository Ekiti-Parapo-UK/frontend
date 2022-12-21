<?php
$module = "userroles";
$shet = "priv";
include_once("pages/phead.php");
include_once("pages/pleft.php");
$typ = "delpriv";//when we want to delete
$serveradd = $_SERVER['REQUEST_URI'];//when we want to delete
?>



</div><!-- leftpanelinner -->
</div><!-- leftpanel -->

<div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

        <div class="row">
            <div class="col-md-9 col-lg-8 dash-left">
                <!--This is the beginning of my main contents-->
                <div class="row">
                    <div class="panel panel-inverse panel-site-traffic">
                        <div class="panel-heading">
                            <h4 class="panel-title"> MANAGE USER ROLES</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you create/manage new roles/Privileges in the administrative process of the Institution</font><br><br>
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form name="fm1" method="post" action="sett_add_mroles.php?typ=new" class="form-horizontal">
                                <input type="hidden" name="saddr" value="<?php echo $serveradd; ?>" />
                                <table class="table-responsive" width="100%" border="0">
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>ROLE NAME:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="text" name="rname" class="form-control" placeholder="E.g: Part Advising, H.O.D, Bursary" required="true" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>ROLES:</b></td>
                                        <td width="" bgcolor="#FFFFFF" style="text-align: left;">
                                            <p><input type="checkbox" name="role[]" class="" value="mupstd" /> Ability to upload New Students Lists</p>
                                            <p><input disabled="true" type="checkbox" name="role[]" class="" value="mro" /> Ability to Manage Roles</p>
                                            <p><input disabled="true" type="checkbox" name="role[]" class="" value="mas" /> Ability to Assign Roles</p>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2" width="" align="center" bgcolor="#FFFFFF">
                                            <button type="submit" class="btn btn-primary" onClick="fm1.submit();"> <i class="fa fa-plus"></i> CREATE </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <hr />
                            <table class="table table-striped nomargin table-bordered">
                                <tr>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> S/N </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> ROLE NAME </th>
                                    <th width="" bgcolor="#F0F1EB" align="center">&nbsp;</th>
                                </tr>				
                                <?php
                                if ($ezzzy->getrecords("privss") == 0) {
                                    echo "<br><font color=red>No Role added yet</font><br>";
                                } else {
                                    $i = 1;
                                    $sess = $ezzzy->getallresult("privss");
                                    foreach ($sess as $row) {
                                        include('sys_mroles_edit.php');
                                        include('server_delete_things.php');
                                        ?>
                                        <tr>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $i; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['rolename']; ?> </td>
                                            <td bgcolor="#F0F1EB" align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Action</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalPrivEdit<?php echo $row['id']; ?>">Edit</a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $row['id']; ?>">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

        <?php
        $i++;
    }//end of the for each loop
}//end of the els e statekent tahts says there is a record
?>				
                            </table>		
                        </div>
                    </div>
                </div>

                <!--/This is the ending of my main contents-->
            </div><!-- col-md-9 -->
<?php include_once("pages/pright.php"); ?>
        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->

</section>

<?php
include_once("pages/pfooter.php");
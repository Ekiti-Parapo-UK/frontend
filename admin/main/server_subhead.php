<?php
$module = "subhead";
$typ = "delsubhead";//when we want to delete
$shet = "subhead";
$prev = "msubhead";
$serveradd = $_SERVER['REQUEST_URI'];//when we want to delete
include_once("pages/phead.php");
include_once("pages/pleft.php");
?>



</div><!-- leftpanelinner -->
</div><!-- leftpanel -->

<div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

        <div class="row">
            <div class="col-md-12 col-lg-12 dash-left">
                <!--This is the beginning of my main contents-->
                <div class="row">
                    <div class="panel panel-inverse panel-site-traffic">
                        <div class="panel-heading">
                            <h4 class="panel-title"> MANAGE SUBHEADS</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you create/manage new subhead for the store</font><br /><br />
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form enctype="multipart/form-data" name="fm1" method="post" action="sett_add_subhead.php?typ=new" class="form-horizontal">                                
                                <?php if(isset($_REQUEST['id'])){ ?><input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="frec" /> <?php } ?>
                                <input type="hidden" value="<?php echo $serveradd; ?>" name="saddr" />
                                <table class="table-responsive" width="100%">
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>SUBHEAD CODE:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="text" name="subhcode" class="form-control" placeholder="E.g: 101" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>SUBHEAD DESCRIPTION</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <textarea name="subhdesc" class="form-control" placeholder="E.g: Transportation" required="required"></textarea>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>SUBHEAD TYPE:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <select  name="subhtyp"class="form-control" required="required">
                                                <option value=""></option>
                                                <option value="Income">Income</option>
                                                <option value="Expenditure">Expenditure</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>                                        
                                        <td colsapn="2" align="center" bgcolor="#FFFFFF">
                                            <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> ADD </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <hr />
                            <table class="table table-striped nomargin table-bordered">
                                <tr>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> S/N </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> TiTLE </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> DESCRIPTION </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> TYPE </th>
                                    <th width="" bgcolor="#F0F1EB" align="center">&nbsp;</th>
                                </tr>				
                                <?php
                                if ($ezzzy->getrecords("subheads") == 0) {
                                    echo "<br><font color=red>No subhead content added yet</font><br>";
                                }
                                else {
                                    $i = 1;
                                    $depts = $ezzzy->getallresult("subheads");
                                    foreach ($depts as $row) {
                                        include('server_subhead_edit.php');
                                        include('server_delete_things.php');
                                        ?>
                                        <tr>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $i; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['code']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['descp']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['subheadtype']; ?> </td>
                                            <td bgcolor="#F0F1EB" align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Action</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalSubheadEdit<?php echo $row['id']; ?>">Edit</a></li>
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
<?php //include_once("pages/pright.php"); ?>
        </div><!-- row -->

    </div><!-- contentpanel -->

</div><!-- mainpanel -->

</section>

<?php
include_once("pages/pfooter.php");
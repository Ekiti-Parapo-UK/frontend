<?php
$module = "subhead";
$typ = "delincomexp"; //when we want to delete
$shet = "income";
$prev = "mincome";
$serveradd = $_SERVER['REQUEST_URI']; //when we want to delete
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
                            <h4 class="panel-title"> MANAGE INCOME</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you create/manage new Income for the store</font><br><br>
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form enctype="multipart/form-data" name="fm1" method="post" action="sett_add_income.php?typ=new" class="form-horizontal">                                
                                <?php if (isset($_REQUEST['id'])) { ?><input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="frec" /> <?php } ?>
                                <input type="hidden" value="<?php echo $serveradd; ?>" name="saddr" />
                                <input type="hidden" value="Income" name="ttype" />
                                <table class="table-responsive" width="100%">

                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>SUBHEAD CODE:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <select  name="subhtyp"class="form-control" required="required">
                                                <option value=""></option>
                                                <?php
                                                $ex = $ezzzy->getallrow("subheadtype", "Income", "subheads");
                                                foreach ($ex as $exp) {
                                                    ?>
                                                    <option value="<?php echo $exp['id']; ?>"><?php echo $exp['code'] . " - " . $exp['descp']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>AMOUNT:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="number" name="amt" class="form-control" placeholder="E.g: 1000" required="required" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>DATE:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="date" name="dat" class="form-control" placeholder="E.g: dd/mm/yyyy" value="<?php echo date('Y-m-d'); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>NOTE</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <textarea name="notes" class="form-control" placeholder="E.g: Transportation" required="required"></textarea>
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
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> DATE </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> CODE </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> DESCRIPTION </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> AMOUNT </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> TYPE </th>
                                    <th width="" bgcolor="#F0F1EB" align="center">&nbsp;</th>
                                </tr>				
                                <?php
                                if ($ezzzy->getrecords("incomexp") == 0) {
                                    echo "<br><font color=red>No Income/Expenditure content added yet</font><br>";
                                } else {
                                    $amts = array();
                                    $i = 1;
                                    //$depts = $ezzzy->getallrow("ttype","Income","incomexp");
                                    $depts = $ezzzy->runQuery("SELECT * FROM incomexp WHERE ttype='Income' order by id desc limit 50");
                                    foreach ($depts as $row) {
                                        include('server_income_edit.php');
                                        include('server_delete_things.php');
                                        $amts[] = $row['amount'];
                                        ?>
                                        <tr>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $i; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['dates']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $ezzzy->getval("id", $row['scode'], "subheads", "code"); ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $ezzzy->getval("id", $row['scode'], "subheads", "descp"); ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo toMoney($row['amount']); ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['ttype']; ?> </td>
                                            <td bgcolor="#F0F1EB" align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Action</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalIncomeEdit<?php echo $row['id']; ?>">Edit</a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $row['id']; ?>">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php
                                        $i++;
                                    }//end of the for each loop
                                    ?>
                                    <tr>
                                        <th width="" bgcolor="#F0F1EB" valign="middle"> #</th>
                                        <th width="" bgcolor="#F0F1EB" valign="middle"> TOTAL </th>
                                        <th width="" bgcolor="#F0F1EB" valign="middle"> -- </th>
                                        <th width="" bgcolor="#F0F1EB" valign="middle"> -- </th>
                                        <th width="" bgcolor="#F0F1EB" valign="middle"> <?php echo toMoney(array_sum($amts)); ?> </th>
                                        <th width="" bgcolor="#F0F1EB" valign="middle"> -- </th>
                                        <th width="" bgcolor="#F0F1EB" align="center"> -- </th>
                                    </tr>
                                    <?php
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

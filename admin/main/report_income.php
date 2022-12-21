<?php
$module = "report";
$shet = "reportincome";
$prev = "reportincome";
include_once("pages/phead.php");
include_once("pages/pleft.php");
$typ = "delincomexp"; //when we want to delete
$serveradd = $_SERVER['REQUEST_URI'];//when we want to delete
include_once("pages/ezposhead.php");
?>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 100%; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

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
                            <h4 class="panel-title"> INCOME REPORT</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you view income report periodically</font><br><br>
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <div class="pull-right" style="margin-right:100px;">
                                <a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
                            </div>
                            <hr />
                            <form action="./?lnk=report_income" method="post">
                                <center>
                                    <strong>
                                        <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Subhead Code <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <p>
                                    <select name="subhtyp"class="form-control" required="required">
                                        <option value="<?php echo @$_POST['subhtyp']; ?>" /><?php echo $ezzzy->getval("id",$_POST['subhtyp'],"subheads","code")." - ".$ezzzy->getval("id",$_POST['subhtyp'],"subheads","descp"); ?></option>
                                        <?php
                                        $ex = $ezzzy->getallrow("subheadtype", "Income", "subheads");
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
                                        From : <input type="date" style="width: 223px; padding:14px;" name="d1" class="tcal" value="<?php echo @$_POST['d1']; ?>" /> To: <input type="date" style="width: 223px; padding:14px;" name="d2" class="tcal" value="<?php echo @$_POST['d2']; ?>" />
                                        <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit" name="searchr"><i class="fa fa-search icon-large"></i> Search</button>
                                    </strong>
                                </center>
                            </form>
                            <hr />
                            <div class="content" id="content">
                                <table class="table table-bordered" id="resultTable" data-responsive="table">
                                <thead>
                                    <tr>
                                        <th> Date </th>
                                        <th> Code </th>
                                        <th> Translation </th>
                                        <th> Amount </th>
                                        <th> Description </th>
                                        <th> Type </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $id = $rno;
                                    $result = "";
                                    //$result = $ezzzy->getallresult("sales");
                                    if (isset($_POST['searchr'])) {
                                        $sh = $_POST['subhtyp'];
                                        $d1 = $_POST['d1'];//." 00:00:00"; //this is the first date aka from
                                        $d2 = $_POST['d2'];//." 00:00:00";//this is second date aka to
                                        $result = $ezzzy->runQuery("SELECT * FROM incomexp WHERE scode='$sh' and (dates>='$d1' and dates<='$d2') and ttype='Income' order by dates desc");                                        
                                    } else {
                                        //$result = $ezzzy->runQuery("SELECT * FROM sales order by dates desc");
                                    }
                                    $tamt = array();
                                    foreach ($result as $row) {
                                        include('server_income_edit.php');
                                        include('server_delete_things.php');
                                        $tamt[] = $row['amount'];
                                        ?>
                                        <tr class="record">
                                            <td hiddenh><?php echo $row['dates']; ?></td>
                                            <td><?php echo $ezzzy->getval("id",$row['scode'],"subheads","code"); ?></td>
                                            <td><?php echo $ezzzy->getval("id",$row['scode'],"subheads","descp"); ?></td>
                                            <td><?php echo toMoney($row['amount']); ?></td>
                                            <td><?php echo $row['descp']; ?></td>
                                            <td><?php echo $row['ttype']; ?></td>
                                            <td><td><a href="#" data-toggle="modal" data-target="#myModalIncomeEdit<?php echo $row['id']; ?>"><span class="label label-success"><i class="fa fa-edit"></i> Edit </span></a> <br/><a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $row['id']; ?>"><span class="label label-danger"><i class="fa fa-close"></i> Del </span></a></td></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <th> </th>
                                        <th>  </th>
                                        <th>  </th>
                                        <td>  Tot. Amount</td>
                                        <td>  </td>
                                        <td>  </td>
                                        <th>  </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>                                        
                                        <td colspan=""><strong style="font-size: 12px; color: #222222;"> <?php echo toMoney(array_sum($tamt)); ?></strong></td>
                                        <td colspan=""><strong style="font-size: 12px; color: #222222;"> <?php //echo toMoney(array_sum($tsum)); ?></strong></td>
                                        <td colspan=""><strong style="font-size: 12px; color: #222222;"> <?php //echo toMoney(array_sum($tsum)); ?></strong></td>
                                        <td colspan=""><strong style="font-size: 12px; color: #222222;"> <?php //echo toMoney(array_sum($tsum)); ?></strong></td>
                                        </td>
                                        <th></th>
                                    </tr>

                                </tbody>
                            </table>
                            </div><br />
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
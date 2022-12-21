<?php
$module = "administration";
$typ = "delsenated";//when we want to delete
$shet = "senated";
$prev = "senated";
$serveradd = $_SERVER['REQUEST_URI'];//when we want to delete
include_once("pages/phead.php");
include_once("pages/pleft.php");
?>

<script type="text/javascript">
    function getState(str) {
        //alert("The cuntry: "+str);
        //str is the country id
        if (str === "") {
            //document.getElementById('supid').value = "";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById('stateselect').innerHTML = xmlhttp.responseText;
                //document.getElementById('hstate').value = xmlhttp.responseText;
                //writer();
                console.log(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET", "getstate.php?q=" + str, true);
        //xmlhttp.open("GET", "getstate.php?q=" + str+"&pid="+pid, true);
        xmlhttp.send();
    }//end of the function show state
    
    function getCity(str) {
        if (str === "") {
            //document.getElementById('supid').value = "";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById('cityselect').innerHTML = xmlhttp.responseText;
                //document.getElementById('hstate').value = xmlhttp.responseText;
                //writer();
                console.log(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET", "getcity.php?q=" + str, true);
        //xmlhttp.open("GET", "getstate.php?q=" + str+"&pid="+pid, true);
        xmlhttp.send();
    }//end of the function show state
    
    
</script>

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
                            <h4 class="panel-title"> MANAGE SENATORIAL DISTRICT</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you create/manage new senatorial district for the organization</font><br><br>
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form enctype="multipart/form-data" name="fm1" method="post" action="sett_add_senated.php?typ=new" class="form-horizontal">                                
                                <input type="hidden" value="<?php echo $serveradd; ?>" name="saddr" />
                                <table class="table-responsive" width="100%">
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>CHOOSE COUNTRY:</b></td>
                                        <td width="" bgcolor="#FFFFFF">                                            
                                            <select id="countryselect" name="country" class="form-control" onchange="getState(this.value)">
                                                <option value="">--Select One--</option>
                                                <?php
                                                $facs = $ezzzy->runQuery("select * from countries order by name");
                                                foreach ($facs as $fac) {
                                                    ?>
                                                    <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                                    <?php
                                                }//end of the if statement that brings out the faculties
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>CHOOSE CHAPTER:</b></td>
                                        <td width="" bgcolor="#FFFFFF">                                            
                                            <select id="stateselect" name="hstate" id="hstate" class="form-control" onchange="getCity(this.value)">
                                                <option value="">--Select One--</option>
                                                <?php
                                                $facs1 = $ezzzy->runQuery("select * from states where country_id='160'");
                                                foreach ($facs1 as $fac) {
                                                    ?>
                                                    <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                                    <?php
                                                }//end of the if statement that brings out the faculties
                                                ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>CHOOSE TOWN:</b></td>
                                        <td width="" bgcolor="#FFFFFF">                                            
                                            <select id="cityselect" name="hcity" class="form-control">
                                                <option value="">--Select One--</option>
                                                <?php
                                                $facs2 = $ezzzy->getallresult("cites", "name", "A");
                                                foreach ($facs1 as $fac) {
                                                    ?>
                                                    <option value="<?php echo $fac['id']; ?>"><?php echo $fac['name']; ?></option>
                                                    <?php
                                                }//end of the if statement that brings out the faculties
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>NAME:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="text" name="name" class="form-control" placeholder="Senatorial District" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>DESCRIPTION</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <textarea name="desc" class="form-control" placeholder="... is..." required="required"></textarea>
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
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> DISTRICT </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> DESCRIPTION </th>
                                    <th width="" bgcolor="#F0F1EB" align="center">&nbsp;</th>
                                </tr>				
                                <?php
                                if ($ezzzy->getrecords("senated") == 0) {
                                    echo "<br><font color=red>No content added yet</font><br>";
                                }
                                else {
                                    $i = 1;
                                    $depts = $ezzzy->runQuery("select * from senated order by id desc");
                                    foreach ($depts as $row) {
                                        include('server_senated_edit.php');
                                        include('server_delete_things.php');
                                        ?>
                                        <tr>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $i; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['name']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['descp']; ?> </td>
                                            <td bgcolor="#F0F1EB" align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Action</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalSenatedEdit<?php echo $row['id']; ?>">Edit</a></li>
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
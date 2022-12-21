<?php
$module = "registry";
$typ = "delfellow"; //when we want to delete
$shet = "fellow";
$prev = "mfellow";
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
                            <h4 class="panel-title"> MANAGE FELLOWS</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you create/manage fellows for the institution</font><br><br>
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form enctype="multipart/form-data" name="fm1" method="post" action="sett_add_fellow.php?typ=new" class="form-horizontal">
                                <input type="hidden" value="<?php echo $serveradd; ?>" name="saddr" />
                                <table class="table-responsive" width="100%" border="1">
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>CHOOSE YEAR:*</b></td>
                                        <td width="" bgcolor="#FFFFFF">                                            
                                            <select name="yea" id="select1" class="form-control">
                                                <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                                <?php
                                                 for($i = 2015; $i <= date('Y'); $i++){
                                                     ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php
                                                 }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>CHOOSE TITLE:*</b></td>
                                        <td width="" bgcolor="#FFFFFF">                                            
                                            <select name="title" id="select1" class="form-control">
                                                <option value="">--Select One--</option>
                                                <option value="Prof.">Prof.</option>
                                                <option value="Prof. (Mrs)">Prof. (Mrs)</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Dr. (Mrs)">Dr. (Mrs)</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Alhj">Alhj.</option>
                                                <option value="Mal.">Mal.</option>
                                                <option value="Barr.">Barr.</option>
                                            </select>
                                        </td>
                                    </tr>
                                                                                                           
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>FULL NAME:*</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="text" name="name" class="form-control" placeholder="E.g: Ayodeji" required="required" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>SEX:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <select name="sex" class="form-control">
                                                <option value="">--Select One--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>MARITAL STATUS:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <select name="mstatus" class="form-control">
                                                <option value="">--Select One--</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Divorcee">Divorcee</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>RELIGION:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <select name="religion" class="form-control">
                                                <option value="">--Select One--</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Traditionalist">Traditionalist</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>NATIONALITY:*</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="text" name="nation" class="form-control" placeholder="E.g: Nigerian" required="required" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>DATE OF BIRTH:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="date" name="dob" class="form-control" placeholder="+2348012345667" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>PHONE NUMBER:*</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="tel" name="phone" class="form-control" placeholder="+2348012345667" required="required" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>EMAIL:*</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="email" name="email" class="form-control" placeholder="iias@domain.com" required="required" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>FACEBOOK LINK:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="url" name="facebook" class="form-control" placeholder="https://www.facebook.com/iias" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>TWITTER LINK:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="url" name="twitter" class="form-control" placeholder="https://www.twitter.com/iias" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>LINKEDIN LINK:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="url" name="linkedin" class="form-control" placeholder="https://www.twitter.com/iias" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>PICTURE:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="file" name="pic" class="form-control" placeholder="Upload Photo" />
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>BIO:*</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <textarea name="bio" class="form-control" placeholder="Take this opportunity to say more about this fellow"></textarea>
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
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> TITLE </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> NAME </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> PHONE </th>
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> EMAIL </th>
                                    <th width="" bgcolor="#F0F1EB" align="center">&nbsp;</th>
                                </tr>				
                                <?php
                                if ($ezzzy->getrecords("dir_fellows") == 0) {
                                    echo "<br><font color=red>No Fellow added yet</font><br>";
                                } else {
                                    $amts = array();
                                    $i = 1;
                                    $depts = $ezzzy->runQuery("select * from dir_fellows order by id desc");
                                    foreach ($depts as $row) {
                                        include('server_fellow_edit.php');
                                        include('server_delete_things.php');
                                        //$amts[] = $row['amount'];
                                        ?>
                                        <tr>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $i; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['title']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['name']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['phone']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['email']; ?> </td>
                                            <td bgcolor="#F0F1EB" align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Action</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalScholarEdit<?php echo $row['id']; ?>">Edit</a></li>
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

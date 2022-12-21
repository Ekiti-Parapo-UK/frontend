<?php
$module = "newsevent";
$typ = "delnews";//when we want to delete
$shet = "news";
$prev = "news";
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
            <div class="col-md-9 col-lg-8 dash-left">
                <!--This is the beginning of my main contents-->
                <div class="row">
                    <div class="panel panel-inverse panel-site-traffic">
                        <div class="panel-heading">
                            <h4 class="panel-title"> MANAGE NEWS</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you create/manage new News for the institution</font><br><br>
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form enctype="multipart/form-data" name="fm1" method="post" action="sett_add_news.php?typ=new" class="form-horizontal">                                
                                <?php if(isset($_REQUEST['id'])){ ?><input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="frec" /> <?php } ?>
                                <input type="hidden" value="<?php echo $serveradd; ?>" name="saddr" />
                                <table class="table-responsive" width="100%">
                                    
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>NEWS TITLE:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="text" name="ntitle" class="form-control" placeholder="Type news title. e.g: I will plant fire" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>UPLOAD PHOTO:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="file" name="pic" class="form-control" placeholder="Upload Photo" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>NEWS DESCRIPTION</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <textarea name="ndesc" id="text11" class="form-control" placeholder="Describe the News." required="required"></textarea>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>INCLUDE IN SLIDER?:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="checkbox" name="soption" class="form-control" value="1">
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
                                    <th width="" bgcolor="#F0F1EB" align="center">&nbsp;</th>
                                </tr>				
                                <?php
                                if ($ezzzy->getrecords("news","ntype","NEWS") == 0) {
                                    echo "<br><font color=red>No News content added yet</font><br>";
                                }
                                else {
                                    $i = 1;
                                    $depts = $ezzzy->getallrow("ntype","NEWS","news","id","D");
                                    foreach ($depts as $row) {
                                        include('server_news_edit.php');
                                        include('server_delete_things.php');
                                        ?>
                                        <tr>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $i; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['title']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['descp']; ?> </td>
                                            <td bgcolor="#F0F1EB" align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Action</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalNewsEdit<?php echo $row['id']; ?>">Edit</a></li>
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
<?php
$module = "gallery";
$typ = "delgallery";//when we want to delete
$shet = "gallery";
$prev = "gallery";
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
                            <h4 class="panel-title"> MANAGE GALLERY</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you create/manage Photo Albums for the institution</font><br><br>
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form enctype="multipart/form-data" name="fm1" method="post" action="sett_add_gallery.php?typ=new" class="form-horizontal">                                
                                <?php if(isset($_REQUEST['id'])){ ?><input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="frec" /> <?php } ?>
                                <input type="hidden" value="<?php echo $serveradd; ?>" name="saddr" />
                                <table class="table-responsive" width="100%">
                                    
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>TITLE:</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <input type="text" name="title" class="form-control" placeholder="e.g: 2017 Summer Institute" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="" bgcolor="#FFFFFF"><b>DESCRIPTION</b></td>
                                        <td width="" bgcolor="#FFFFFF">
                                            <textarea name="desc" class="form-control" placeholder="This is the photo album for the 2017 ..."></textarea>
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
                                    <th width="" bgcolor="#F0F1EB" valign="middle"> DESCRIPTION </th>
                                    <th width="" bgcolor="#F0F1EB" align="center">&nbsp;</th>
                                </tr>				
                                <?php
                                if ($ezzzy->getrecords("gallery") == 0) {
                                    echo "<br><font color=red>No content added yet</font><br>";
                                }
                                else {
                                    $i = 1;
                                    $depts = $ezzzy->getallresult("gallery");
                                    foreach ($depts as $row) {
                                        //include('server_gallery_edit.php');
                                        include('server_delete_things.php');
                                        ?>
                                        <tr>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $i; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['title']; ?> </td>
                                            <td bgcolor="#F0F1EB" valign="middle"> <?php echo $row['paraa']; ?> </td>
                                            <td bgcolor="#F0F1EB" align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Action</button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#myModalGalleryEdit<?php echo $row['id']; ?>">Edit</a></li>
                                                        <li><a href="./?lnk=server_gallery_photo&id=<?php echo $row['id']; ?>">Upload Photos</a></li>
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
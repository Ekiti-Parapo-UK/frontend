<?php
$module = "gallery";
$typ = "delgallery"; //when we want to delete
$shet = "gallery";
$prev = "gallery";
$serveradd = $_SERVER['REQUEST_URI']; //when we want to delete
include_once("pages/phead.php");
include_once("pages/pleft.php");
$id = $_GET['id'];
?>
<style type="text/css">
    #drop_file_zone {
        background-color: #EEE; 
        border: #999 5px dashed;
        width: 290px; 
        height: 200px;
        padding: 8px;
        font-size: 18px;
    }
    #drag_upload_file {
        width:50%;
        margin:0 auto;
    }
    #drag_upload_file p {
        text-align: center;
    }
    #drag_upload_file #selectfile {
        display: none;
    }    
</style>


<script type="text/javascript">
    var fileobj;
    function upload_file(e) {
        e.preventDefault();
        ajax_file_upload(e.dataTransfer.files);
    }

    function file_explorer() {
        document.getElementById('selectfile').click();
        document.getElementById('selectfile').onchange = function () {
            files = document.getElementById('selectfile').files;
            gid = document.getElementById('gid').value;
            //alert(gid);
            ajax_file_upload(files, gid);
        };
    }

    function ajax_file_upload(file_obj, gid) {
        if (file_obj !== undefined) {
            var form_data = new FormData();
            for (i = 0; i < file_obj.length; i++) {
                form_data.append('file[]', file_obj[i]);
            }
            form_data.append('idd', gid);
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                contentType: false,
                processData: false,
                data: form_data,
                success: function (response) {
                    alert(response);
                    $('#selectfile').val('');
                }
            });
        }
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
            <div class="col-md-9 col-lg-8 dash-left">
                <!--This is the beginning of my main contents-->
                <div class="row">
                    <div class="panel panel-inverse panel-site-traffic">
                        <div class="panel-heading">
                            <h4 class="panel-title"> MANAGE GALLERY PHOTOS</h4>
                        </div>

                        <div class="panel-body">
                            <font color="#990000">This option helps you create/manage Photo Albums for the institution</font><br><br>
                            <strong><?php echo @$_SESSION['msg']; ?></strong>
                            <form>
                                <input type="hidden" id="gid" name="gid" value="<?php echo $id; ?>">
                                <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
                                    <div id="drag_upload_file">
                                        <p>Drop file here</p>
                                        <p>or</p>
                                        <p><input type="button" value="Select File" onclick="file_explorer();"></p>
                                        <input type="file" id="selectfile" multiple>
                                    </div>
                                </div>
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
                                } else {
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

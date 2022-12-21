<?php
//let all include all that we need
include_once("conn.php");
$q = $_GET['q'];
//we shall now use this id to get the payments defined for this faculty or the programmes as it where
$result = $ezzzy->getallrow("fid",$q,"departments");
?>
<select name="dep" id="dep" class="form-control" onchange="showProg(this.value);">
    <option value="">--Select One--</option>
    <?php
foreach ($result as $row){
    ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
    <?php
}//end of the for each loop*/
?>
</select>
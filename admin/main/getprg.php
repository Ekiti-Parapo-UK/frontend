<?php
//let all include all that we need
include_once("conn.php");
$q = $_GET['q'];
//we shall now use this id to get the payments defined for this faculty or the programmes as it where
//$result = $ezzzy->getallrow_two("did",$q,"pid","","programmes");
$result1 = $ezzzy->runQuery("SELECT id,name FROM programmes WHERE did='$q' or did='' or did is null");
?>
<select name="prg" id="prg" class="form-control" required="required" onchange="showLevel(this.value);">
    <option value="">--Select One--</option>
    <?php
foreach ($result1 as $rw){
    ?>
    <option value="<?php echo $rw['id']; ?>"><?php echo $rw['name']; ?></option>
    <?php
}//end of the for each loop*/
?>
</select>
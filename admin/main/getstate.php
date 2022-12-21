<?php
//let all include all that we need
include_once("conn.php");
$q = $_GET['q']; //this is the programme id

$result1 = $ezzzy->runQuery("SELECT id,name FROM states WHERE country_id='$q' order by name");
?>

<select id="stateselect" name="hstate" class="form-control" required="required" onchange="getCity(this.value)">
    <option value="">--Select One--</option>
    <?php
    foreach ($result1 as $rw) {
        ?>
        <option value="<?php echo $rw['id']; ?>"><?php echo $rw['name']; ?></option>
        <?php
    }//end of the if statement that brings out the faculties
    ?>
</select>
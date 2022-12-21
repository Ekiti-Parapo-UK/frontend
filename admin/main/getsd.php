<?php
//let all include all that we need
include_once("conn.php");
$q = $_GET['q'];
//let us get other parameters
$oparams = explode("-", $q);
$id = $oparams[0];
$pid = $oparams[1];//this is the pid
$did = $oparams[2];//this is the did
//we shall use this did to get the fid
//echo $pid;
$whe = "";
$whev = 0;
if($pid != ""){
    $whev = $pid; //this is the programme ID
    $whe = "pid";
}
else if($did != ""){
    $whev = $ezzzy->getval("id",$did,"departments","fid");//thid is the faculty id
    $whe = "fid";
}

//we shall now use this id to get the payments defined for this faculty or the programmes as it where
$result = $ezzzy->getallrow_two($whe,$whev,"sess",$id,"ptypes");
foreach ($result as $row){
    ?>
    <div>
        <label class="">
            <input class="" <?php if($ezzzy->getrecords("lvlpayments","payid",$row['id']) != 0){echo "checked=true"; }?> type=checkbox name="crscs[]" value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?><span><i class="fa fa-arrow-right"></i></span><?php echo toMoney($row['amount']); ?><span><i class="fa fa-arrow-right"></i></span>(<?php echo $ezzzy->getval("id",$row['sess'],"sesses","name"); ?>)<span><i class="fa fa-arrow-right"></i></span>(<?php echo $row['ptype']; ?>)
        </label>
    </div><hr />
    <?php
}//end of the for each loop*/
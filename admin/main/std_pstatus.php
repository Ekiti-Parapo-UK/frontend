<?php
if($_SESSION['sess_active_all'] != "ACTIVE"){
    display_error("This is season is not yet activated");    
}
//since all is okay, we shall load his current settings
$csettings = $ezzzy->getrow("pgid",$_SESSION['pgid'],"csettings");
$csem = $csettings['semester'];
$csess = $csettings['sess'];
?>

<script language="javascript">
    function loadclass() {
        val = document.form11.iclass.value;
        window.location.href = 'std_view_details.php?id=<?php echo $recid; ?>&action=setclass&cat=' + val;
//alert(val)
    }
</script>
<div class="col-md-6 col-lg-8 profile-right">
    <div class="profile-right-body">
        <!-- Nav tabs -->


        <!-- Tab panes -->
        <div class="tab-content">

            <div class="tab-pane active" id="activity">
                <h4>MY PAYMENT ACTIVITIES</h4>
                <hr />
                
                    <table class="table table-bordered table-default table-striped nomargin">
                        <thead class="success">
                            <tr>
                                <th>S/N</th>
                                <th>TRANS. ID/RRR</th>
                                <th>SESSION</th>
                                <th>PAY. TYPE</th>
                                <th>AMOUNT</th>            
                                <th>TRANSACTION DATE</th>            
                                <th>TRANSACTION STATUS</th>            
                                <th>REMITA STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $atot = array();
                            $schf = $ezzzy->runQuery("SELECT * FROM payinfo where regno='$regno' order by dategen");
                            foreach ($schf as $schfe) {
                                ?>
                                <tr>
                                    <td><?php echo $r; ?></td>
                                    <td><?php echo $row['rrr']; ?></td>
                                    <td><?php echo $ezzzy->getval("id",$row['sess'],"sesses","name"); ?></td>
                                    <td><?php echo $row['ptyp']; ?></td>
                                    <td><?php echo toMoney($row['amount']); ?></td>
                                    <td><?php echo $row['dategen']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><a class="visit" href="paymentResponse.php?id=<?php echo $row['rec_id']; ?>&RRR=<?php echo $row['rrr']; ?>&saddr=<?php echo $saddr; ?>">Get Status</a></td>
                                </tr>
                                <?php
                                $i++;
                            }//end of the foerach loop that brings up the payment for this person
                            
                            ?>
                            
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>Total</td>
                                <td style="background-color: black; color: white;"><?php //echo toMoney($tamt); ?></td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                    
            </div><!-- tab-pane -->

        </div>
    </div>
</div>
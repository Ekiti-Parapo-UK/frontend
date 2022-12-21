<?php
// The variables $server_name, $s_username, $s_password, $dbname are
// to be obtained from the configuration script.
// instantiate our class
require_once 'ezzzyMysql.class.php';
// CONNECTING TO MYSQL
$MDSN = "mysql:host=".$server_name.";port=".$s_port.";dbname=".$dbname.";charset=utf8";
//connect to database
while (!isset($ezzzy)) {
    //echo "Connecting to Dadatabe...";        
    $ezzzy = new EzzzyMysql($MDSN, $s_username, $s_password);
    if (!$ezzzy) {
        echo " <br> Could not connect to database..";
        unset($ezzzy);
        sleep(3);
        continue;
    }
    //echo "<br> ... Connected"; 
}
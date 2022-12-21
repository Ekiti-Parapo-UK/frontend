<?php
if($_SESSION['who'] != "sadmin" && !in_array($prev, $_SESSION['privilege'])){
  $pmsg = "Oops!!! You do not have the sufficient privilleges to manage this page";
  display_error($pmsg);
  exit;
}
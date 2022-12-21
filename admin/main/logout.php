<?php
session_name("SAdmin");
session_start();
session_destroy();
session_name("stdfees");
session_start();
session_destroy();
session_name("Students");
session_start();
session_destroy();
session_name("SuperAdmin");
session_start();
session_destroy();
header("location: ../../home.php");
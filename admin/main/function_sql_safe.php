<?php
function sql_safe($s)
{    
if (get_magic_quotes_gpc())        
$s = stripslashes($s);  
$s = strip_tags($s);
$s = htmlentities($s,ENT_QUOTES);    
return addslashes($s);
}
<?php
/**
* ==================================================================================//
*   This script hanldes the Admin page loadings and takes care of 
*   Every Administration tasks. This is the main Application script
*   That loads every other sections/codes to make the program run                                
*   script : index.php
*   
*   Author: Ezekiel Aliyu (zinconewton2@yahoo.com)
*   Copyright (c) 2016 SAMOLTECH STUDIOS LIMITED All rights reserved 
* 
*   No part of this code can be used/modified without prior permission
*   from the Author
* ==================================================================================//
*/
//INITIAL CHECK AND LOAD DEFAULTS
//include("functions/myconfig/myConfig.inc.php");
// which section
$section = "ezzzy Loves JESUS";
$pageclass = "fa fa-bank fa-lg";
@$typ = $_GET['lnk'];
//@$typ1 = $_GET['typ1'];
//=====================================================
//## INVOICE REPORTS
if(isset($typ)){
        $mytitle = "WELCOME |&nbsp;";
        if(!file_exists($typ.'.php')){
            include('404.php');
            exit;            
        }
        else{
        include($typ.'.php');
        exit;
        }
}
//=====================================================
//## DEFAULT PAGE
@include_once('home.php');
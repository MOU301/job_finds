<?php 
session_start();
include 'config/config.php';
include 'helpers/helper.php'; 
spl_autoload_register(function($ClassName){
include 'lib/'.$ClassName.'.php';
});



?>

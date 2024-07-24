<?php 
include 'config/config.php'; 
spl_autoload_register(function($ClassName){
include 'lib/'.$ClassName.'.php';
});



?>

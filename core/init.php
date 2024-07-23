<?php 
include '../core/init.php'; 
spl_autoload_register(function($ClassName){
include '../lib/'.$ClassName.'.php';
});

?>

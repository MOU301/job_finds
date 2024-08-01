<?php 
/*
scurity in php 
1 use md5($pass+$salt) but that is not enough 
2 use password_hash($password,PASSWORD_DEFUALT)
and to check the password use password_verify($pass,$passhash)
$passhash get from database and $pass from user in login
3 use sha1($password), 

*/ 
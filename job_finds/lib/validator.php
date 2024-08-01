<?php 
class validator{
   public function checkempty($field) {
    if(empty($field)){
        return false;
    }
    else{
        return true;
    }
   } 
   public function isRequired($data){
        foreach($data as $data){
            if(empty($_POST[$data])){
                return false;
            }
            else{
                return true;
            }
        }
   }
   public function checkEmail($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{ 
        return false;
    }
   }
   public function checkPass($pass1,$pass2){
    if($pass1==$pass2){
        return true;
    }else{
        return false;
    }
   }
}
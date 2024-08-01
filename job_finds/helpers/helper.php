<?php 
function redirect($page=false,$message=null,$type=null){
    if(is_string($page)){
        $location=$page;
    }
    else{
        $location=$_SERVER['SCRIPT_NAME'];
    }

    if($message !=null){
        $_SESSION['message']=$message;
    }
    if($type !=null){
        $_SESSION['type']=$type;
    }

    header('location:'.$location);
    exit;
}
function DisplayMessage(){
    if(!empty($_SESSION['message'])){
        $message=$_SESSION['message'];
        if(!empty($_SESSION['type'])){
            $type=$_SESSION['type'];
            if($type=='error'){
                echo '<div class="alert alert-danger mt-3">'.$message.'</div>';
            }
            else{
                echo '<div class="alert alert-success mt-3">'.$message.'</div>'; 
            }
           
        
        unset($_SESSION['message']);
        unset($_SESSION['type']);      
    }
    }
    else{
        echo '';
    }
    }
function format_date($date){
$date=date('F j: Y  g:i a',strtotime($date));
return $date;
}
// 'wisdom':::in order to sleep at night, you must be tired during the day
?>
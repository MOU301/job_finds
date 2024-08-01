<?php include 'core/init.php';
$job=new job;
$validator=new validator;
$template= new template('templates/LoginPage.php');
$id=$_GET['id'] ?? null;
if(!is_null($id)){
    $job->LogOut();
    header("location:login.php");
}else{
if(isset($_POST['login'])){

    $fieldArr=['username','password'];
    if($validator->isRequired($fieldArr)){
     $username=$_POST['username'];
     $password=$_POST['password'];
     if($job->login($username,$password)){
        redirect('home.php','success login ',"success");
     }
     else{
        redirect('login.php','please retry again  ','error');

     }
    }
    else{
        
        redirect('login.php','please enter your username and password ','error');
    }
}






}

echo $template;
?>
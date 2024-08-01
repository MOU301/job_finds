<?php include 'core/init.php'; 
$job=new job;
$validator=new validator;
$template= new template('templates/RegisterPage.php');
$template->types=$job->getType();
if(isset($_POST['register'])){ 
    $data=[];
   $fieldArr=['first_name','last_name','email','username','password','confpassword','role'];
   if($validator->isRequired($fieldArr)){
     if($validator->checkEmail($_POST['email'])){
        if($validator->checkPass($_POST['password'],$_POST['confpassword'])){
            $data['password']=$_POST['password'];
            $data['email']=$_POST['email'];
            $data['username']=$_POST['username'];
            $data['first_name']=$_POST['first_name'];
            $data['last_name']=$_POST['last_name'];
            $data['role']=$_POST['role'];
            if($job->InsertUser($data)){
                redirect('login.php',' ','success');
             }else{ 
                redirect('register.php','return again please there is problem in register','error');
            }
         } 
         else{
            redirect('register.php','check your password please ','error');
           }

     }
     else{
       redirect('register.php','your email is wrong please check now ','error');
     }
   
    

   }
   else{
    redirect('register.php','please fill the field please now ','error');
   }
}
echo $template;
?>
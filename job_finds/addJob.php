<?php include 'core/init.php';
$job=new job;
$validator=new validator;
$template=new template('templates/AddJobPage.php');
$template->categories=$job->getCategories();
$template->types=$job->getType();
if(isset($_POST['add'])){
    $data=[];
    $fieldArr=['title','category','company','type','description','city','state','email_contact'];
    if($validator->isRequired($fieldArr)){
       if($validator->checkEmail($_POST['email_contact'])){
        $data['title']=$_POST['title'];
        $data['user_id']=$_SESSION['user_id'];
        $data['company']=$_POST['company'];
        $data['category']=$_POST['category'];
        $data['type']=$_POST['type'];
        $data['city']=$_POST['city'];
        $data['description']=$_POST['description'];
        $data['email_contact']=$_POST['email_contact'];
        if($job->TestState($_POST['state'])){
         $data['state']=$job->getStateByName($_POST['state'])->id;
        }else{
            if($job->InsertState($_POST['state'])){
                $data['state']=$job->getStateByName($_POST['state'])->id;
            }
        }
        echo "<pre>";
        print_r($data);
        echo "</pre>";
      if($job->InserJob($data)){
        redirect('home.php',"added the job is success ",'success');
      }
      else{
        redirect('addJob.php',"there is problem in add retrey add please ","error");
      }
        
       }
    }
    else{
        echo "please fill the field now ";
    }
}
echo $template; 
?>
<?php 
include "core/init.php";

$job=new job;
$validator=new validator ; 
$template=new template('templates/EditPage.php');
$template->typies=$job->getType();
$template->categories=$job->getCategories();
$id=$_GET['id'] ?? null ;
if(!is_null($id)){
    $template->job=$job->getJobById($id);
if(isset($_POST['edit'])){
    $data=[];
    $id=$_GET['id'];
    $fieldArr=['title','category','company','type','description','city','state','email_contact'];
    if($validator->isRequired($fieldArr)){
       if($validator->checkEmail($_POST['email_contact'])){
         echo "code is here now ";
        $data['title']=$_POST['title'];
        $data['company_name']=$_POST['company_name'];
        $data['category_id']=$_POST['category'];
        $data['type_id']=$_POST['type'];
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
        echo "code is here now and the id is :".$id;
        echo "</br>";
      echo "<pre>";
      print_r($data);
      echo "</pre>";
      if($job->UpdateJob($data,$id)){
        redirect('job.php?id='.$id,"Update the job is success ",'success');
      }
      else{
        redirect('edit.php?id='.$id,"there is problem in add retrey add please ","error");
      }
        
       }
    }
    else{
        redirect('edit.php',"fill the field please now","error");

    }
}
}


echo $template; 
?>
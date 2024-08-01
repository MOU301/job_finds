<?php
include 'core/init.php';
$job=new job;
$template=new template('templates/jobpage.php');
$id=$_GET['id'] ;
if(isset($id)){
    $template->job=$job->getJobById($id);
 
}
else{
    header('location:browse.php');
}
if(isset($_POST['delete'])){
    echo 'hi the code is here now ';
}
echo $template; 
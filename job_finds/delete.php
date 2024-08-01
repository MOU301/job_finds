<?php include 'core/init.php';
$job=new job; 
if($job->Delelt($id)){
    redirect("home.php","success deleted the job ",'success');
}
else{
    redirect("job.php?id=".$id,"retry again please there is problem in delelted ",'error');
}
?>
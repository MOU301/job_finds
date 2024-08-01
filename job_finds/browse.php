<?php include 'core/init.php'; 
$job=new job;
$validator=new validator;
$template= new template('templates/BrowsePage.php');
$template->jobs=$job->getJobs();
$template->countjob=$job->getCountJob();
$template->categories=$job->getCategories();
$template->states=$job->getState();

$category_id=$_GET['id'] ??  null;
if(!is_null($category_id)){
    $template->jobs=$job->getJobsByCategory($category_id);
   $template->title=$job->getCategoryById($category_id)->name;
}
else{
    $template->title='Last Job listies';
}

echo $template;
?>

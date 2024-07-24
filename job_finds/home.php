<?php 
include 'core/init.php';
$job=new job;
$template=new template('templates/HomePage.php');
$template->jobs=$job->getJobs();
$template->countjob=$job->getCountJob();
$template->categories=$job->getCategories();
echo $template;
?>

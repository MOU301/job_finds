<?php
include 'core/init.php';

$job=new job;
$jobarray=[];
$searchjob=[];
foreach($job->getJobs() as $job){
    $jobarray[$job->id]=$job->title;
}
$q=$_REQUEST['q'] ?? '' ;
if($q!=''){
    $q=strtolower($q);
    $len=strlen($q);
    foreach($jobarray as $key=>$job){
        if(stristr($q,substr($job,0,$len))){
         $searchjob[$key]=$job;
        }
    }
    foreach($searchjob as $key=>$job){
        echo '<li class="list-group-item search">'.$job.'</a></li>';
    }
    }


 



 

?>
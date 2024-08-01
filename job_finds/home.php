<?= 
include 'core/init.php';
$job=new job;
$validator=new validator;
$template=new template('templates/HomePage.php');
$template->jobs=$job->getJobs();
$template->countjob=$job->getCountJob();
$template->categories=$job->getCategories();
$template->states=$job->getState();
$template->title='Last Job listies';
if(isset($_POST['send'])){
    $SearAarr=[];
    $title=filter_input(INPUT_POST,'title',FILTER_SANITIZE_SPECIAL_CHARS);
    $state=$_POST['state'];
    $category=$_POST['category'];
        if($validator->checkempty($title)){
            $SearAarr['title']=$title;
            if($state!=0){
                $SearAarr['state']=$state;
             }
             if($category!=0){
                 $SearAarr['category']=$category;
             } 
            $template->jobs=$job->getJobsByTitle($SearAarr);  
        }
        else{
            redirect('home.php','must fill the title of field','error');

        }
}
echo $template;
?>

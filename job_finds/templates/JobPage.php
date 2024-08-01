<?php include "inc/header.php"; ?>
<?php 
// echo "<pre>";
// print_r($job);
// echo "</pre>";

?>
<h3 class="color2"><?php echo $job->title; ?> </h3>
<div class="p-2">
<div class="p-2"><strong>Location : </strong><?php echo $job->city; ?> , <?php echo $job->name_state; ?> </div>
<div class="p-2"><strong>Type : </strong> <?php echo $job->name ;?></div>
<div class="p-2"><strong>Description : </strong></br>
<p class="p-2"><?php echo $job->description; ?></p></div>
<div class="p-2">
    <strong>Email :</strong>
    <a class="text-primary" href="#">
       <?php echo $job->email_contact; ?> 
    </a>
</div>


<div class="mt-5 d-flex">
 <a href="browse.php" class="btn btn-success ">Back To Jobs</a>
<?php if(isset($_SESSION['user_id'])): ?>
  <?php if($job->user_id==$_SESSION['user_id']): ?>
      <form action="delete.php" class="mx-2" method="post">
      <input type="submit" name="delete" value="Delete" class="btn btn-danger">
      <input type="hidden" name="job_id" value="<?php echo $job->id; ?>">
    </form>
    <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-primary">Edit</a>
 <?php  endif ; ?>
 <?php endif ; ?>
</div> 

</div>
<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>
<!-- start home  -->
        <h1><?php echo $title;  ?></h1>

            <div class="my-5">
                <form action="home.php" class="form-group d-flex justify-content-between" method="post">
                    <input type="search" id="job" name="title" onkeyup="search(this.value)" class="form-control mx-2"  placeholder="Enter keywords">
                    <select name="state" class="form-control mx-2">
                        <option class="text-black-50" value="0">All The State</option>
                        <?php foreach($states as $state):?>
                         <option value="<?php echo $state->id;?>">
                            <?php echo $state->name_state;?>
                        </option>
                        <?php endforeach ; ?>
                    </select>
                    <select name="category" class="form-control mx-2">
                        <option class="text-black-50" value="0">All The Categorie s</option>
                       <?php foreach($categories as $category) : ?>
                        <option value="<?php echo $category->id; ?>">
                            <?php echo $category->name;?>
                        </option>
                        <?php endforeach ; ?>
                    </select>
                    <input type="submit" name="send" value="Find" class="btn btn-success">
                </form>
                <?php 
                DisplayMessage();
                // echo $_SESSION['message']; echo "</br>" .$_SESSION['type'];
                ?>
                <ul class="mt-3 d-flex justify-content-start align-content-center" id='find'></ul>
             </div>
           
    <?php if(!empty($jobs)): ?>
         <?php foreach($jobs as $job) : ?>
            <div class="row under-line py-5">
                    <div class="col-md-2">
                        <div class="<?php echo 'bg-'.$job->color ;?> text-white  p-2">
                            <?php echo $job->name;?>
                        </div>
                    </div>
                    <div class="col-md-10 ">
                        <div class="d-flex align-items-center">
                            <h3 ><?php echo $job->title; ?></h3>
                            <h5 class="mx-2">(<?php echo $job->company_name ; ?>)</h5>
                                <span class="text-gray">
                                <?php echo format_date($job->created_at) ;?>
                                 </span>
                        </div>
                        <p>
                           <?php echo $job->description; ?>
                            <a href="job.php?id=<?php echo $job->id; ?>"><span class="text-primary">read more</span></a>
                        </p>
                    </div>
                    </div>
         <?php endforeach ; ?>

        


</div>
<?php else: ?>
    <h5>Sorry !! there are not jobs now </h5>
<?php endif ; ?>
<!-- end home  -->
<?php include 'inc/footer.php'; ?>


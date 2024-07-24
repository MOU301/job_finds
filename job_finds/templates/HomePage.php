<?php include 'inc/header.php'; ?>
<?php include "../core/state.php"; ?>
<!-- start home  -->
            <h1>Lates Job listies</h1>
            <div class="my-5">
                <form action="" class="form-group d-flex justify-content-between" method="post">
                    <input type="text"  name="jop" class="form-control mx-2" placeholder="Enter keywords">
                    <select name="state" class="form-control mx-2">
                        <option class="text-black-50">Select State</option>
                        <?php foreach($state as $kay=>$value):?>
                         <option value="<?php echo $kay;?>">
                            <?php echo $value;?>
                        </option>
                        <?php endforeach ; ?>
                    </select>
                    <select name="category" class="form-control mx-2">
                        <option class="text-black-50" >select category</option>
                       <?php foreach($categories as $category) : ?>
                        <option value="<?php echo $category->id; ?>">
                            <?php echo $category->name; ?>
                        </option>
                        <?php endforeach ; ?>
                    </select>
                    <input type="submit" name="find" value="Find" class="btn btn-success">
                </form>
             </div>
           
    <?php if(!empty($jobs)): ?>
 <div class="row under-line py-5">
         <?php foreach($jobs as $job) : ?>
                    <div class="col-md-2">
                        <div class="<?php echo 'bg-'.$job->color ;?> text-white  p-2">
                            <?php echo $job->name;?>
                        </div>
                    </div>
                    <div class="col-md-10 ">
                        <div class="d-flex align-items-center">
                            <h3 ><?php echo $job->title; ?></h3>
                            <h5 class="mx-2">(<?php echo $job->company_name ; ?>)</h5>
                            <span class="text-gray"><?php echo $job->created_at; ?></span></div>
                        <p>
                           <?php echo $job->description; ?>
                            <a href="#"><span class="text-primary">read more</span></a>
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
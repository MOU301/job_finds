<?php include 'inc/header.php'; ?>
<?php if(isset($_SESSION['is_login'])) : ?>
    <?php DisplayMessage(); ?>
<form action="addJob.php" method="post">
             <div class="my-5 border gray">
                <p class="mx-5 px-3 enter text-danger">Add New Job</p>
                    <div class="gray p-3">
                        <div class="my-2">
                             <label class=" mb-2">
                                <strong>Title :</strong>
                            </label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>Company Name :</strong>
                            </label>
                            <input type="text" name="company" class="form-control" placeholder="Enter Company">
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>Type  : </strong>
                            </label>
                            <select class="form-control" name="type">
                                <option>select your type </option>
                                <?php foreach($types as $type): ?>
                                    <option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>Category  :</strong>
                            </label>
                            <select class="form-control" name="category">
                                <option>select category</option>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>Discription :</strong>
                            </label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>City:</strong>
                            </label>
                            <input type="text" name="city" class="form-control" placeholder="Enter City" >
                        </div>
                        <div class="my-2">
                            <label class="mb-2">
                                <strong>state :</strong>
                             </label>
                            <input type="text" name="state" class="form-control" placeholder="Enter State">
                        </div>
                        <div class="my-2">
                            <label class="mb-2"><strong>Contact Email :</strong></label>
                            <input type="text" name="email_contact" class="form-control" placeholder="Enter Email Contact">
                        </div>
                    </div>
                    </div>
                    
                    <input type="submit" name="add" value="Add" class="btn btn-danger">
                </form>
            <?php else : 
                redirect('login.php','you must login to add  Job','error') ;?>
            <?php endif; ?>

                <?php include 'inc/footer.php'; ?>
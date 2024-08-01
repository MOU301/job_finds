<?php include 'inc/header.php'; ?>
<?php DisplayMessage();?>
<form action="register.php" method="post">
             <div class="my-5 border gray">
                <p class="mx-5 px-3 enter text-danger">Create An Account</p>
                    <div class="gray p-3">
                        <div class="my-2">
                             <label class=" mb-2">
                                <strong>First Name :</strong>
                            </label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>Last Name  :</strong>
                            </label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>Email     : </strong>
                            </label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>User Name  :</strong>
                            </label>
                            <input type="text" name="username" class="form-control" placeholder="User Name">
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>Password   :</strong>
                            </label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="my-2">
                            <label class=" mb-2">
                                <strong>Confirm Password :</strong>
                            </label>
                            <input type="password" name="confpassword" class="form-control" placeholder="Confirm Password" >
                        </div>
                        <div class="my-2">
                            <label class="label">
                                <strong>Role       :</strong>
                             </label>
                             <select name="role" class="form-control">
                                <option value="0">select role</option> 
                                  <?php foreach($types as $type) : ?>
                                    <option  value="<?php echo $type->id ; ?>"><?php echo $type->name; ?></option>
                                    <?php endforeach; ?>
                                
                              
                            </select>
                        </div>
                    </div>
                    </div>
                    
                    <input type="submit" name="register" value="Register " class="btn btn-danger">
                </form>
            



<?php include 'inc/footer.php'; ?>
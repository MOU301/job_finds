<?php include 'inc/header.php'; ?>
<?php if(isset($_SESSION['username'])):?>
    <p>welcome to : <span class="text-danger"><?php echo $_SESSION['first_name'] ; ?></span></p>
<?php else : ?>
    <?php DisplayMessage(); ?>
<div class="gray up-line">
                <p class="p-2">You are not authorized that location</p>
            </div>
<form action="" method="post">
             <div class="my-5 border gray">
                <p class="mx-5 px-3 enter">Enter username and password please</p>
                    <div class="gray p-3">
                        <div>
                            <label class="label mb-2">User name :</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="my-3">
                            <label class="label mb-2">Password :</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    </div>
                    <input type="submit"  name="login" value="Log in " class="btn btn-success">
                </form>
<?php endif; ?>
<?php include 'inc/footer.php'; ?>
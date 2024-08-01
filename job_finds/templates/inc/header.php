<?php echo dirname(__DIR__);?>
<?php
   $path=explode('/',$_SERVER['SCRIPT_NAME']);
   $path=explode('.',end($path));
   $path=$path[0];
   ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/settes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="templates/settes/bootstrap/css/style.css">
    <link rel="stylesheet" href="templates/settes/bootstrap/css/all.min.css">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            margin-left: 10px;
            color:black;
        }
        .active{
            color:white !important;
            background-color: #dc3545 !important;
            border:none !important;
        } 
        .active a{
            color: white;
        }
        .under-line{
            border-bottom: 2px solid #eee;
        }
        .text-gray{
            color: #828080;
        }
        .none-border{
            border: none;
        }
        .search{
            background-color: gray;
            color: white;
            margin-right: 10px;
            cursor: pointer;
            padding:2px 10px ;
        }
        a{
            text-decoration: none;
            margin-left: 10px;
            color:black;
        }
        .under-line{
            border-bottom: 2px solid #eee;
        }
        .text-gray{
            color: #828080;
        }
        .out{
            cursor: pointer;
        }
        .up-line{
            border-top: 5px solid black;
        }
        .label{
            width: 100px;
            box-sizing: border-box;
        }
        .border{
            border: 1px solid black !important;
        }
    
        .enter{
            border: 1px solid black;
            width: 300px;
            transform: translate(0,-50%);
            z-index: 200;
            background-color: #eee;
            border-radius: 10px;

        }
    </style>
</head>
<body class="gray">
    
    <div class="container bg-white ">
        <div class="p-5">
            <div class="d-flex justify-content-between">
                <h1>Job<span class="text-danger">Find</span></h1>
                <a href="addJob.php" class="btn <?php echo $path=='addJob' ? 'd-none':'btn-success';?>"><h4>
                    <i class="fa-duotone fa-plus"></i>Add Job</h4>
                </a>
            </div>
            <div class="gray my-5">
               
                    <div class="row">
                        <div class="col-3  gray p-3  <?php echo $path=='home' ? 'active':'';?>"><a href="home.php"><i class="fa-solid fa-house"></i><span class="meneu">Home</span></a></div>
                        <div class="col-3  gray p-3 <?php echo ($path=='browse' || $path=='job') ? 'active':'';?>"><a href="browse.php"><i class="fa-sharp fa-regular fa-user-doctor"></i><span class="meneu">Browser Jobs</span></a></div>
                        <div class="col-3  gray p-3 <?php echo $path=='register'  ? 'active':'';?>"><a href="register.php"><i class="fa-solid fa-registered"></i><span class="meneu">Register</span></a></div>
                    <?php if(isset($_SESSION['is_login'])):?>
                        <div class="col-3  gray p-3 out">
                        <a href="login.php?id=l"> <i class="fa-solid fa-trash"></i><span class="meneu">Logout</span></a></div>
                    <?php else : ?>
                         <div class="col-3  gray p-3  <?php echo $path=='login' ? 'active':'';?>">
                         <a href="login.php">
                            <i class="fa-solid fa-right-to-bracket"></i>   
                             <span class="menue">Login</span>
                         </a>
                         </div>
                     <?php endif; ?>
                    </div>
            
            </div>

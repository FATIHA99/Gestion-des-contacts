<?php include 'processing.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="assets/icon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class='h-100'>
    <nav class="navbar navbar-dark bg-dark mb-5">
        <div class="container-fluid">
        <img style="height: 55px;" class="" src='assets/logo.png'>
            <form class="d-flex">
                <button class="btn btn-outline-light border-0" type="submit">Login</button>
            </form>
        </div>
    </nav>
    <div class="row container-fluid  rounded-pill border-info border-3 border-start py-5 ">
    <form action="processing.php" method ="POST" class="col-4 m-5 ms-5 " >
        <div class=" ">
            <h3 class="text-info">Authenticate</h3>
         
            <?php 
            if(isset($_GET['IncorrectInfo'])){?>

                <div class="alert alert-danger" role="alert">
 <?php  echo $_GET['IncorrectInfo']  ?>
</div>
<?php  } 
       if(isset($_GET['EmptyBlanks'])){?>

        <div class="alert alert-warning" role="alert">
<?php  echo $_GET['EmptyBlanks']  ?>
</div>
<?php  } ?>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Username</label>
                <input  name="username"  id="form2Example1" class="form-control" placeholder="Username " />

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password"  name="password"id="form2Example2" placeholder="password" class="form-control" />

            </div>
            <!-- Submit button -->
            <button type="submit"  name="login"class="btn btn-info w-100 mb-4" >Login</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>No account? <a href="pageSignUp.php ">Sign up</a> here.</p>
            </div>
        </div>
    </form>
<?php  include 'DRY/svgLogin.php' ;?>
    </div>
</body>

</html>
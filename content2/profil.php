
<?php include 'processing.php';

?>

<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="assets/icon.png">
</head>

<body style='
background: rgb(13,202,240);
background: linear-gradient(135deg, rgba(13,202,240,1) 6%, rgba(255,255,255,1) 27%);
background-repeat:no-repeat;
height:100vh'>
<?php include_once 'DRY/navbar.php' ?>
    <div class="container w-50  h-50 border-start border-3 border-info rounded-pill p-5">

        <h3   class="text-info"> welcome , <span class="name">  <?php  echo $username ;?> &#9995; &#128512; </span></h3>
        <ul class="list-group list-group-flush  w-lg-50">
            <li class="list-group-item ">Your Profil :
            </li>
            <li class="list-group-item fw-bolder text-info  ">Username : <label class="fw-normal ms-5 text-dark">    <?php  echo $username ;?> </label></li>
            <li class="list-group-item fw-bolder text-info">Signup date : <label class="fw-normal ms-5 text-dark"> <?php  echo $DateSignUp ;?></label></li>
            <li class="list-group-item fw-bolder text-info">Last login : <label class="fw-normal ms-5 text-dark">  <?php  echo $currentDate ;?></label></li>

        </ul>
    </div>
</body>

</html>
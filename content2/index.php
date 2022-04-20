<!DOCTYPE html>
<html lang="en">
<?php include_once 'processing.php';


?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page d'accueil</title>
  <link rel="icon" href="assets/icon.png">

  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-dark bg-dark mb-5">
    <div class="container-fluid">
    <img style="height: 55px;" class="" src='assets/logo.png'>      <form class="d-flex">
        <a class="btn btn-outline-light border-0" type="submit" href="pageLogin.php">Login</a>
      </form>
    </div>
  </nav>
  <!-- hello  -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Hello </h1>
          <h2 data-aos="fade-up" data-aos-delay="400">We offer modern solutions to save your contact </h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="container  text-center p-5 blur ">
              <p> <a href="pageSignUp.php" " >sign up </a>  to start creating yours contact list. </p>
        <p>Already have an account?<a  href=" pageLogin.php" ">Login </a> here.</p> </div>
          </div>
        </div>
        <div class=" col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                  <?php include 'DRY/svgIndex.php' ?>
            </div>
          </div>
        </div>
  </section>
</body>

</html>
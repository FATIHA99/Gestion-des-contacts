<?php include 'processing.php';
$id =$_SESSION["id_user"];
$nbr_contact = $con->query("SELECT  count(*) FROM contact WHERE id_user = $id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" href="assets/icon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .success input {
            border: 1px solid green;
        }
        
        .error input {
            border: 1px red solid;
        }
    </style>
</head>
<body>

 <?php include 'DRY/navbar.php';
 if(isset($_SESSION["id_user"]  ))
                {
                    $id =  $_SESSION["id_user"]  ;
                }
                $req=$con->prepare('SELECT * FROM  contact WHERE id_user = ? ');
                $req -> execute(array($id));

                while($row=$req->fetch()){
                    $_SESSION['id_contact']=$row['id_Contact'];
                    } ?>
  
    <div class="container d-flex ">
        <form id="formAdd" action="processing.php" method ="POST" class='w-75'>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <h1> contacts</h1>
            <!-- ?edit=< ?php echo $_SESSION['id_contact'] ? > -->
        <a  class= " btn btn-success "href="list.php"> contact list </a>
        <span class="text-secondary"> <?php  echo $nbr_contact  ->fetchColumn()  ; ?> </span>
        <h2> Add Contact </h2>
            <div class="row mb-4">
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1"> Name :</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="enter name" />
                        <p class="text-danger" id="nameMsg"></p>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="form6Example2">Phone :</label>
                        <input type="text"  name="phone" id="phone" class="form-control" placeholder="enter phone" />
                        <p class="text-danger" id="nameMsg"></p>
                    </div>
                </div>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Email :</label>
                <input type="text"   name="email" id="email" class="form-control" placeholder="enter email" />
                <p class="text-danger" id="nameMsg"></p>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example7">Address</label>
                <textarea class="form-control"  name="adress" id="adress" rows="4" placeholder="enter address"></textarea>
                <p class="text-danger" id="nameMsg"></p>
            </div>
            <!-- Submit button -->
            <button type="submit"   name="add" class="btn btn-info btn-block mb-4 ">Save</button>
        </form>
                 <?php include "DRY/svgContact.php"; ?>
                </div>
    <script src="js/validation.js"></script>
</body>

</html>
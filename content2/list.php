<?php  include 'processing.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Contacts</title>
    <link rel="icon" href="assets/icon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
 
        .success input {
            border: 1px solid green;
        }
        
        .error input {
            border: 1px red solid;
        }
 

        
        /* for modall */

        .parentt  {
        width: 33%;
        height: 80%;
        position: absolute;
        top: 15%;
      left:30%;
        display:none;
  
          border-radius: 15px;
          background: rgb(13,202,240);
background: linear-gradient(135deg, rgba(13,202,240,1) 6%, rgba(255,255,255,1) 27%);
background-repeat:no-repeat;
          box-shadow: 5px 10px 18px #888888;
    }
    
    .modall {
        position: relative;
        top: 0;
        left: 0;
        display: flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
    }
    
    .fermer {
        height:7%;
        outline: none;
        border: none;
    }

    .MsgConfirmation{
        position:absolute;
        top:40%;
        left: 35%;
        background-color: #212529;
        height: 15vh;
    }
        </style>
</head>
 
<body>
<?php include 'DRY/navbar.php' ?>
    <form class=" container  w-75 border-start border-bottom  p-5 rounded-circle  border-3 border-info p-5" action="processing.php" method='POST' onsubmit="return false">
        <h1 class="text-info border-start border-bottom  bg-white p-2 w-25 ms-5 rounded-circle  border-3 border-info ">Contact list :</h1>
        <table class="table m-5  w-75  ">
            <thead class="table-info ">
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">address</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            // !affichage des contact :

                if(isset($_SESSION["id_user"]  ))
                {
                    $id =  $_SESSION["id_user"]  ;
                }
                $req=$con->prepare('SELECT * FROM  contact WHERE id_user = ? ');
                $req -> execute(array($id));

                while($row=$req->fetch()){
                    $_SESSION['id_contact']=$row['id_Contact'];
                ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td ><?php echo $row['email'];?> </td>
                    <td ><?php echo $row['phone'];?> </td>
                    <td ><?php echo $row['adress'];?> </td>
                    <!-- <td > <a  onclick="show_modalEdit()" name = "edit" class='btn ' href="?Edit=<?php //echo $_SESSION['id_contact'] ;?>"><img src="assets/edit.png"> </a>  -->
                    <td>
                         
                        <button onclick="show_modalEdit()" name="edit" class="btn dataEdit"
                            data="<?php echo $row['id_Contact'].','.$row['name'].','.$row['phone'].','.$row['email'].','. $row['adress'] ?> ">
                            <img src="assets/edit.png">
                        </button>
                    <a type="button" class='btn btnDelete' name="delete" data="<?php echo  $row['id_Contact'] ?>"> <img src="assets/delete.png" > </a>
                    
                 </td>
                </tr>
               
            </tbody>
            <?php } ?>
        </table>
   </form>


<!-- modal modifier  -->
   <div class="parentt ">
    <button  class="fermer  text-light  btn-close m-2" aria-label="Close" onclick="ferme()"></button> 

        <form id="formEdit" action="processing.php" method ="POST" class='modall  '>
            <!-- 2 column grid layout with text inputs for the first and last names -->
           
        <h2> Edit Contact </h2>
            <div class="row mb-4">
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1"> Name :</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="enter name"/>
                        <p class="text-danger" id="nameMsg"></p>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="form6Example2">Phone :</label>
                        <input type="text"  name="phone" id="phone" class="form-control" placeholder="enter phone"   />
                        <p class="text-danger" id="nameMsg"></p>
                    </div>
                </div>
            </div>

            <!-- email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Email :</label>
                <input type="text"   name="email" id="email" class="form-control" placeholder="enter email"  />
                <p class="text-danger" id="nameMsg"></p>
            </div>

            <!-- adress input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example7">Address</label>
                <input type="text" class="form-control"  name="address" id="adress"  placeholder="enter address"  > 
                <p class="text-danger" id="nameMsg"></p>
            </div>
            <!-- Submit button -->
            <input type="submit"   name="update" class="btn btn-info btn-block mb-4" value="save"/>
        </form>
    </div>
  

    <form style ="display:none;" class=" p-2 w-25  alert MsgConfirmation" method="POST" action="./processing.php"> 
        <!-- <button  class="fermer m-1 btn-close btn-close-white"  onclick="closeAlert()"></button>  -->
        <input id="idForDelete" name="idContact" type="hidden" value="">

        <h6 class="text-light my-3 ms-3">do you want to delete this contact ?</h6>

         <div class="  d-flex justify-content-center">
        <input class="btn btn-outline-success me-5   " type="submit" name="deleteContact" value="OUI">
        <a class="btn btn-outline-danger ms-5"  onclick="closeAlert()" name ="non" >non</a>
</div>
    </form>
    <script src="js/script.js"></script>

  
</body>

</html>
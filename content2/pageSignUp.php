<?php include 'processing.php';
// if(isset($_POST['add'])){

//     $Contact = new contact($_POST['name'],$_POST['phone'],$_POST['email'],$_POST['email']);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <nav class="navbar navbar-dark bg-dark mb-5">
        <div class="container-fluid">
        <img style="height: 55px;" class="" src='assets/logo.png'>            <form class="d-flex">
                <button class="btn btn-outline-light border-0" type="submit">Login</button>
            </form>
        </div>
    </nav>
<!--  -->
    <!--  -->
    <div class="row  container-fluid  rounded-pill border-info border-3 border-start p-5 ">
    <form id="formSignUp" action='processing.php' method='POST' class="col-4 m-5 ms-5" >
        <div class="container ">
            <h3> Sign Up</h3>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Username</label>
                <input id="form2Example1" name="username" class="form-control username" placeholder="Username " />
                <p class="text-danger" id="nameMsg"></p>

            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2E"  name="password" placeholder="password" class="form-control password" />
                <p class="text-danger" id="nameMsg"></p>

            </div>
            <!-- Password verify -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password verify</label>
                <input type="password" id="form2Example2" name="password_verify" placeholder="password verify" class="form-control passwordVerify" />
                <p class="text-danger" id="nameMsg"></p>

            </div>
            <!-- Submit button -->
            <button type="submit"  name="signup" class="btn btn-info btn-block mb-4">Save</button>
            <!-- Register buttons -->
            <div class="text-center">
                <p>Already have an account?
                    <a href="pageLogin.php">Login </a> here.</p>
            </div>
        </div>
    </form>
  <?php include 'DRY/svgLogin.php'; ?> 
    </div>
    <script>
           // !for sign up form 
        let formSignUp = document.querySelector("#formSignUp");
        let username = document.querySelector('.username');
        let password = document.querySelector('.password');
        let passwordVerify = document.querySelector('.passwordVerify');

        formSignUp.addEventListener("submit", e => {
            if (!validationSignUp())
                e.preventDefault();
        })

        function validationSignUp() {
            let isValidat = true;

        //  !username
            if (username.value.trim() == '') {
                AfficherError(username, 'name can not be empty');
                isValidat = false;
            } else if (username.value.trim().length <= 3) {
                AfficherError(username, 'name must greater than 3 character ');
                isValidat = false;
            } else if (nameValider(username.value)) {
                valider(username)
            } else {
                AfficherError(username,'username not valid ');
            }


             // !password 
        if (username.value.trim() == '') {
                AfficherError(password, 'password can not be empty');
                isValidat = false;
            }
         else if(password.value.trim().length<6){
            AfficherError(password, 'password  must greater than 6 character ');
                isValidat = false;
        }
        else{
            valider(password);
        }

          //  !password verify 
           if(password.value.trim() != passwordVerify.value.trim() )
           {
            isValidat =false;
            AfficherError(passwordVerify,'wrong verification ');
           }
           else{
               valider(passwordVerify);
           }

            return isValidat;
        }
       

       
        // !validation de username :
        function nameValider(userName) {
            const format = /^[a-zA-z0-9]*$/;
            return format.test(userName);
        }


        // affichage de message 
        function AfficherError(element,errorMessage) {
            const parent = element.parentElement;
            if (parent.classList.contains('success'))
                parent.classList.remove('success');
            parent.classList.add('error');
            const para = parent.querySelector('p');
            para.innerText = errorMessage;
            para.style.visibility = 'visible';

        }
        // si les valeur est valid  :
        function valider(element) {
            const parent = element.parentElement;
            if (parent.classList.contains('error')) {
                parent.classList.remove('error');
                parent.querySelector('p').style.visibility = 'hidden';
            }
            parent.classList.add('success');
        }
    </script>
</body>

</html>
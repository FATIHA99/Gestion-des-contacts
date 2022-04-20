<nav class="navbar navbar-dark bg-dark mb-5">
        <div class="container-fluid">
            <!-- <a class="navbar-brand text-info  border-start border-end border-3 border-info rounded-pill "> <img style="height: 5%;" class="mb-1"src='assets/logo.png'></a> -->
            <img style="height: 55px;" class="" src='assets/logo.png'>
            <form class="d-flex " method="POST" action ="processing.php">
                <a class="btn btn-outline-info border-0 me-5" type="submit" href="contact.php"> Add contact</a>
                <!-- <a class="btn btn-outline-info border-0 me-5" type="submit" href="list.php"> view list </a> -->
                <a class="text-info  btn border-start border-end border-2 border-info rounded-pill" href="profil.php"> <img src="assets/profill.png"> <?php  echo $username ?></a>
                <button class="btn btn-outline-light border-0 mx-2" name="logOut" type="submit"> <img src="assets/logout.png" ></button>

            </form>
        </div>
    </nav>
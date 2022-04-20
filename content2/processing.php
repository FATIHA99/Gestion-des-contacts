<?php
// !class user  and contact 
include 'oop/classUser.php';
include 'oop/classContact.php';
function connexion(){
 try{
   return new PDO('mysql:host=localhost;dbname=contact_bd','root','');
 }catch(Exception $e){
  return 'connection problem'.$e->getMessage();
 }
}
 $con=connexion();
 // ! ----------------- sign up-------------------------------
if(isset($_POST['signup'])){

  $newUser = new user($_POST['username'],$_POST['password']);
  $user=$newUser ->username;
  $pass=$newUser->password;
  $newUser->signup($user,$pass);
 }
// !  ------------------ login -----------------------------
session_start(); 
if(isset($_POST['login']))
{
  $newUser = new user($_POST['username'],$_POST['password']);
  $user=$newUser -> username;
  $pass=$newUser -> password;
  $newUser->signin($user,$pass);
}
// ! ----------------------log out  ---------------------
if(isset($_POST['logOut']))
{
  user::logOut();
}
// !username 
if(isset($_SESSION['username']))
{
    $username =$_SESSION['username'];
}
else
{    $username ="unknown";  
}
// !time login
if(isset($_SESSION['timelogin']))
{
    
    $timelogin =$_SESSION['timelogin'];
    $currentDate = date("Y-m-d h:i:sa", $timelogin);
}
else
{     $currentDate ="nothing";  
}

// !  time signup ------------------------

if(isset($_COOKIE['time_signup']))
{
    $timesignup =$_COOKIE['time_signup'];
    $DateSignUp = date("Y-m-d h:i:sa", $timesignup);
}
else
{    $DateSignUp  ="unknown";  
}
// !CRUD
// TODO traitement pour modifier 
// if(isset($_GET['Edit']))
// { 
//   var_dump($_GET['Edit']);
//   $id=$_GET['Edit'];
//   $req = $con -> prepare('SELECT * FROM contact WHERE id_Contact= ?');
//   $req -> execute(array($id));
//   $row = $req -> fetch(PDO::FETCH_ASSOC);
//   $_SESSION['name']    =  $row['name'];
//   $_SESSION['phone ']  =  $row['phone'];
//   $_SESSION['email ']  =  $row['email'];
//   $_SESSION['address '] =  $row['adress'];
// }

if(isset($_POST['update']))
{
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $edit =new contact($name, $phone, $email, $address);
  $edit -> update($name, $phone, $email,  $address);
}
// TODO traitement pour ajouter 
if(isset($_POST['add'])){
 $id=$_SESSION['id_user'];
 $Contact = new contact($_POST['name'],$_POST['phone'],$_POST['email'],$_POST['adress']);
 $Contact->Add($_POST['name'],$_POST['phone'],$_POST['email'],$_POST['adress']);
  header('location:contact.php');
 }

//  TODO traitement pour supprimer 
if(isset($_POST['deleteContact']))
{
  $id_contact=$_POST['idContact'];
  $Contact =new contact("fatiha","0616128083","fatiha@gmail.com","el jadida");
  var_dump($Contact);
  $Contact -> delete_contact($id_contact);
}


?>
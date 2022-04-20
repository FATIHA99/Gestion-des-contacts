<?php 
class user{
public $username;
public $password;
function __construct($username,$password) {
$this -> username = $username;
$this -> password = $password;
}

//  TODO method connexion 
public function conne(){
 try{
   return new PDO('mysql:host=localhost;dbname=contact_bd','root','');
 }catch(Exception $e){
  return 'connection problem'.$e->getMessage();
 }
 }
  // TODO function  signup 
 public function signup(string $username,string $password)
 {
  $con=$this->conne();
  $query= $con -> prepare("INSERT INTO user(username,password) values(?,?)");
  $query-> execute(array($username,$password));
  header("Location:pageLogin.php");
  setcookie('time_signup',time(),time()+240000*3600);
 }
  //  TODO function  sign in 
  public function signin(string $username,string $password)
  {
    $con=$this->conne();
    $user = $con -> prepare('SELECT * FROM user  WHERE username=? AND  password= ?');
    $user-> execute(array($username,$password));
    $nbrligne=$user->rowCount();
    if(empty($username)|| empty($password))
    {
      header("Location:pageLogin.php?EmptyBlanks=please fill in the blanks  !");
    }
     else if($nbrligne>0)
    {  
      $row   =  $user -> fetch();
      session_start(); 
      $_SESSION["login"]   = true;
      $_SESSION["username"]   =  $row['username'];
      $_SESSION["id_user"]   =  $row['id'];
      $_SESSION["timelogin"]=time();
      header("Location:profil.php");
    }
    else{
     header("Location:pageLogin.php?IncorrectInfo=Username or password is incorrect !");
    }
           
  }
  // TODO function logout 
  public static function logOut(){
   
    session_destroy();
    header('location:index.php');
  }

}

<?php 

class contact {
    public $name;
    public $phone;
    public $email;
    public $address;
    function __construct($Name, $Phone,$Email,$Address) {
    $this->name = $Name;  
    $this->phone = $Phone;
    $this->email = $Email;
    $this->address = $Address;
}


// TODO method connexion 
public function conne(){
try{
  return new PDO('mysql:host=localhost;dbname=contact_bd','root','');
}catch(Exception $e){
 return 'connection problem'.$e->getMessage();
}

}
// TODO method add 
public function Add(string $Name, string $Phone, string $Email,string $Address)
{
   $con=$this->conne();
  $id=$_SESSION['id_user'];
  $query= $con -> prepare("INSERT INTO contact(name,phone ,email ,adress,id_user) values(?,?,?,?,?)"); 
  $query->execute(array($Name,$Phone,$Email,$Address,$_SESSION['id_user']));    
  header('location:contact.php');

}
// TODO method delete 
public function delete_contact($id){
    $con=$this->conne();
    $deleteReq = $con -> prepare('DELETE FROM contact WHERE id_Contact = ?');
    $deleteReq -> execute(array($id));
    // echo $id;
    header('location:list.php');
}
// TODO method update 
public   function update( $Name,  $Phone, $Email, $Address)
{  
  $con=$this->conne();
  $id_con=$_SESSION['id_contact'];
  $req =$con->prepare('UPDATE contact SET name= ?,  phone=? ,email= ?, adress=? WHERE id_Contact=?');
  $req -> execute(array($Name,$Phone,$Email,$Address,$id_con));
  header("Location:list.php");
}
}
?>
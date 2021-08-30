<?php

namespace Project\Models;

use \Core\Model;

class User extends Model{
  
  public function reg($name, $surname, $email, $password){
    $sql = "INSERT INTO `users`(`name`, `surname`, `email`, `password`) VALUES ('$name', '$surname', '$email', '$password')"; 
    $result = $this->record_del($sql);
    return $result;
  }
  
  public  function checkName($name){
    if (mb_strlen($name, 'utf8') >= 2) return true;
    else return false;
} 

  public  function checkSurname($surname){
    if($this->checkName($surname)) return true;
    else return false;
} 

  public  function checkEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
    else return false;
}
 
 public function checkUserEmail($email){
   $sql = "SELECT * FROM `users` WHERE email ='$email'";
   $result = $this->findOne($sql);
   if($result) return true;
   else return false;
 }
 
 public function checkPassword($pass1, $pass2){
   if($pass1 != $pass2) return false;
   else return true;
 }
  
 public function checkUserData($email){
   $sql = "SELECT * FROM `users` WHERE email ='$email'";
   $result = $this->findOne($sql);
   return $result;
 } 
 
 public function startSession($email){
   $sql = "SELECT `id`, `name`, `surname` FROM `users` WHERE email = '$email'"; 
   $result = $this->findOne($sql);
   $admin= $this->checkAdmin($result['id']);
   
   if($admin){
   $_SESSION['admin'] = $result;
   }
   else{
     $_SESSION['user'] = $result;
   }
 }
 
 public function user_name(){
   if(empty($_SESSION['admin'])){
     return $_SESSION['user']['name']." ".$_SESSION['user']['surname'];
   }
   return $_SESSION['admin']['name']." ".$_SESSION['admin']['surname'];
 }
 
 private function checkAdmin($id){
   $sql = "SELECT *FROM `admin` INNER JOIN users ON user_id = '$id' AND id = '$id'";
   $result = $this->findOne($sql);
   if($result) return true;
   else return false;
 }
  
}


?>
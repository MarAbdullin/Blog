<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\User;
use \Project\Models\Admin;
use \Project\Models\Content;

class UserController extends Controller{
  
  // action регистрация
  public function register(){   
    $this->title = 'Регистрация';
    $message = [];
    
    $_POST['content'] = (new Content)->last_content();
    
    if (isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $check = $_POST['check_password'];
       
        if(!(new User)->checkName($name) or !(new User)->checkSurname($surname) or !(new User)->checkEmail($email) or !(new User)->checkPassword($password, $check) ){
            
            if (!(new User)->checkName($name)) $message[] = 'Имя меньше 2-х символов';
             if (!(new User)->checkSurname($surname)) $message[] = 'Фамилия меньше 2-х символов';
             if (!(new User)->checkEmail($email)) $message[] = 'Не верно указан E-mail';
             if(!(new User)->checkPassword($password, $check)) $message[] = 'Пароль не подтвержден';
        }
       
        else
        {
            // Проверяем существует ли пользователь
            $checkEmail = (new User)->checkUserEmail($email);
            if ($checkEmail == true) $message[] = 'Пользователь с таким E-mail, уже зарегистрирован, введите другой E-mail';
           
            else
            {
                $passwordHash = password_hash($password, PASSWORD_BCRYPT); //хешируем пароль
                if (!(new User)->reg($name, $surname, $email, $passwordHash)) $message[] = 'Ошибка Базы Данных';
                else header("Location:/auth");
            }
        }
    }
    
    return $this->render('user/register', ['errors'=> $message]);
  }
  
  // action авторизация
  public function auth(){
    
    $this->title = 'Авторизация';
    $message = [];
    
    $_POST['content'] = (new Content)->last_content();
    
    if(isset($_POST['submit'])){
      
      $email = $_POST['email'];
      $password = $_POST['password'];
      $checkEmail = (new User)->checkUserEmail($email);
            
            if ($checkEmail == false) $message[] = 'Пользователь с таким E-mail, не зарегистрирован';
            else{
              $user = (new User)->checkUserData($email);
              $hash = $user['password'];
             
              if(password_verify($password, $hash)){  // проверка пароля на соответствие хешу
                (new User)->startSession($email);
                header("Location:/");
              }
              else{
                 $message[] = 'Пароль не верный';
              }
                
              
            }
    }
    return $this->render('user/auth', ['errors'=> $message]);
  }
  
  public function del_user(){
      if(isset($_POST['delet'])){
      
        $id = $_POST['id'];
        $result = (new Admin)->del('users',$id);
      
        if($result) echo "del user";
      }
  }
  
  
  // action выход из сессии
  public function exitSession(){
    unset($_SESSION["user"]);
    session_destroy();
    header("Location:/auth");
    return true;
  }
  
}



?>
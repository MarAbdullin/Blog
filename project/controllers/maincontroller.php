<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Admin;
use \Project\Models\User;
use \Project\Models\Content;
use \Project\Models\Comment;

class MainController extends Controller{
  
  public function hello(){
   
    $this->title = "Главная";
    
    $_POST['content'] = (new Content)->last_content();

    $name_user = (new User)->user_name();
    
    $result = (new Content)->string('resume', 1);
  
    return $this->render('main/hello', ['content' => $result, 'name' => $name_user]);
  }
  
  public function feedback(){
    $message = [];
    if(isset($_POST['submit'])){
      
      $name = $_POST['name'];
      $header = $_POST['header'];
      $email = $_POST['email'];
      $text = $_POST['message'];
      
      if(!(new User)->checkName($name) or !(new User)->checkEmail($email)){
        
        if(!(new User)->checkName($name)) $message[] = "Имя меньше двух символов";
        if(!(new User)->checkEmail($email)) $message[] = "Не верно указан email";

      }
      else{

        $myaddres = "Skiff27@yandex.ru";
        $textAll = "Name: $name \r\nEmail: $email \r\nSubject: $header \r\nMessage:\n $text";
        $textAll = nl2br($textAll);
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: WebSitePostRu@gmail.com\n";
      
        if(!mail($myaddres,$header,$textAll, $headers)) echo "no";

        else echo "ok";
          
      }
      
    }
  }
  
  public function thoughts(){
   
    $this->title = "Мои мысли";
  
    $_POST['content'] = (new Content)->last_content();
    
    $result = (new Content)->get_thoughts();
    
    return $this->render('main/thoughts', ['thoughts' => $result]);
  }
  
  
  public function articles(){
    
    $this->title = "Статьи";
   
    $_POST['content'] = (new Content)->last_content();
    
    $result = (new Content)->listing('articles');
    
    return $this->render('main/articles', ['content' => $result]);
  }
  
  public function article($params){
   
    $this->title = "Статья";
    
    $message = [];
    
    $name_user = (new User)->user_name();
    
    $id = $params['id'];
    
    $_POST['content'] = (new Content)->last_content();
    $result = (new Content)->string('articles', $id);
    $comments = (new Comment)->get_comment($id);
    
    
    
    return $this->render('main/article', ['content' => $result, 'comments' => $comments, 'name' => $name_user, 'params' => $id]);
  }
  
  public function add_comment(){
    if(isset($_POST['submit'])){
      
      $comment = $_POST['comment'];
      $name_user = $_POST['name'];
      $id = $_POST['id'];
      
      if(!(new Comment)->set_comment($name_user, $comment, $id)) echo "Комент не загружан";
        else echo "comment added";//header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
  }
  
  public function gallery(){
   
    $this->title = "Галерея";
   
    $_POST['content'] = (new Content)->last_content();
    $result = (new Content)->listing('foto');
    
    return $this->render('main/gallery', ['gallery' => $result]);
  }
  
  
}


?>
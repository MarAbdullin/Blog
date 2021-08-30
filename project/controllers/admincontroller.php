<?php
namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Admin;
use \Project\Models\Content;

class AdminController extends Controller{
  
  public function redactor(){
      $this->layout = 'admin';
      $this->title = 'Редактор';
      
      $_POST['content'] = (new Content)->last_content();
      $articles = (new Content)->listing('articles');
      $users = (new Content)->listing('users');
      
      return $this->render('admin/redactor', ['articles' => $articles, 'users' => $users]);
  }
  
  public function add_article(){
      $this->layout = 'admin';
      $this->title = 'Добавить статью';
      $message = [];
      
      $_POST['content'] = (new Content)->last_content();
      
      if(isset($_POST['submit'])){
      
        $header = $_POST['header'];
        $article = $_POST['article'];
     
        $check = (new Admin)->can_upload($_FILES['file']);
        $name = (new Admin)->img_name($_FILES['file']);
      
        if($check === true){
          
          $result = (new Admin)->img_load($_FILES['file'],'/project/webroot/picture/image/', $name);
        }
        else{
          $message[] = $check;
        }
      
        if (!(new Admin)->add($header, $article, $name)) $message[] = 'Статья не загружана';
        else header("Location:/redactor");
      }
      return $this->render('admin/articleadd');
  }
  
  
  
  public function update_article(){
      $this->layout = 'admin';
      $this->title = 'Изменить статью';
      $message = [];
      
      $_POST['content'] = (new Content)->last_content();
      
      if(isset($_POST['update'])){
        $id = $_POST['id_article'];
        $value = (new Content)->string('articles',$id);
      }
      
      if(isset($_POST['submit'])){
        $header = $_POST['header'];
        $article = $_POST['article'];
        $id = $_POST['id_article'];
        $name = $_POST['img_name'];
        
        if(!$name) $name = (new Admin)->img_name($_FILES['file']);
        
        $check = (new Admin)->can_upload($_FILES['file']);
        if($check === true){
          $img = (new Admin)->img_load($_FILES['file'],'/project/webroot/picture/image/', $name);
        }
        else{
          $message[] = $check;
        }
        
        $result = (new Admin)->update($header, $article, $name, $id); 
      
        if($result) header("Location:/redactor");
    }
    return $this->render('admin/articleupdate', ['value' => $value]);
  }
  
  public function del_article(){
      if(isset($_POST['delet'])){
      
        $id = $_POST['id'];
        $result = (new Admin)->del('articles',$id);
      
        if($result) echo "del article";
      }
  }
  
  
    public function redactor_me(){
    $this->title = "Обо мне";
    $this->layout = "admin";
    $message = [];
    
    $_POST['content'] = (new Content)->last_content();
    
    $resume = (new Content)->string('resume', 1);
    
    if(isset($_POST['submit'])){
      
      $link = $_POST['link'];
      $about_me = $_POST['about_me'];
      $name = $resume['avatar'];
      
      if(!$name) $name = (new Admin)->avatar_name($_FILES['file']);
      
      $check = (new Admin)->can_upload($_FILES['file']);
      if($check === true){
        
        $upload = (new Admin)->img_load($_FILES['file'], '/project/webroot/picture/foto/avatar/', $name);
        
      }
      else{
        $message[] = "Загрузка аватарки не удалась";
      }
      
      if (!(new Admin)->updata_resume($link, $about_me, $name)) $message[] = 'Статья не загружана';
      else header("Location:/about_me");;
      
      
    }
    return $this->render('admin/redactor_me', ['resume' => $resume]);
  }
  
   public function load_thought(){
      
      $admin = $_SESSION['admin'];
      
      if(isset($_POST['submit'])){
        
        $id = $admin['id'];       
        $text = $_POST['thought'];
        
        if(!(new Admin)->add_thought($text, $id)) echo "no";
        else echo "ok";
      }
      
      
  }
  
  public function del_thought(){
    if(isset($_POST['delet'])){
      
        $id = $_POST['id'];
        $result = (new Admin)->del('thoughts',$id);
      
        if($result){
         
           echo "del thought";
        } 
      }
  }
  
  
  
   public function load_foto(){
     
      $message = [];
      
      $_POST['content'] = (new Content)->last_content();
      
      if(isset($_POST['submit'])){
      
        $check = (new Admin)->can_upload($_FILES['file']);
        $name = (new Admin)->img_name($_FILES['file']);
      
        if($check === true){
          $result = (new Admin)->img_load($_FILES['file'],'/project/webroot/picture/foto/', $name);
        }
        else{
          $message[] = $check;
        }
      
        if (!(new Admin)->add_foto($name)) echo "no";
        else echo "ok";
      }
      
  }
  
  public function del_foto(){
    if(isset($_POST['delet'])){
      
        $id = $_POST['id'];
        $result = (new Admin)->del('foto',$id);
      
        if($result){
           echo "del foto";
        } 
      }
  }
  
}
?>
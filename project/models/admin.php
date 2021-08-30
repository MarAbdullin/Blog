<?php
namespace Project\Models;

use \Core\Model;

class Admin extends Model{
  
  public function add($header, $article, $img_name){
      $sql = "INSERT INTO `articles`(`header`, `article`, `imgname`) VALUES ('$header','$article','$img_name')";
      $result = $this->record_del($sql);
      return $result;
  }
  
  public function update($header, $article, $name, $id){
      $sql = "UPDATE `articles` SET `header`='$header',`article`='$article',`imgname`='$name' WHERE id='$id'";
      $result = $this->record_del($sql);
      return $result;
  }
  
  public function add_foto($foto_name){
      $sql = "INSERT INTO `foto`(`foto_name`) VALUES ('$foto_name')";
      $result = $this->record_del($sql);
      return $result; 
  }
  
  public function add_thought($text, $id){
      $sql = "INSERT INTO `thoughts`(`text`, `id_author`) VALUES ('$text', '$id')";
      $result = $this->record_del($sql);
      return $result; 
  }
  
  public function updata_resume($link, $about_me, $avatar){
      $sql = "UPDATE `resume` SET `link`='$link',`about_me`='$about_me', `avatar`='$avatar' WHERE id = 1 ";
      $result = $this->record_del($sql);
      return $result; 
  }
  
  public function del($table, $id){
      $sql = "DELETE FROM `$table` WHERE id ='$id'";
      $result = $this->record_del($sql);
      return $result;
  }
  
  public function can_upload($file = []){
	
      if($file['name'] == '')
		    return 'Вы не выбрали файл.';
	
	    if($file['size'] == 0)
		    return 'Файл слишком большой.';
	
	    $getMime = explode('.', $file['name']);

	    $mime = strtolower(end($getMime));
	
	    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	    if(!in_array($mime, $types))
	  	  return 'Недопустимый тип файла.';
	
	    return true;
  }
  
  public function img_name($file = []){
      $fileName = $file['name'];
      if($fileName){
      $name = $name = mt_rand(0, 10000) . $fileName;
      return $name;
      }
      else{
          return $fileName;
      }
  }
  
  public function avatar_name($file = []){
    if(isset($file)){
    $fileName = $file['name'];
    $fileName = explode('.', $fileName);
    $fileName = array_pop($fileName);
    $name = "avatar.$fileName"; 
    return $name;
    }
    else return $name = "";
  }
    
  
  
  public function img_load($file = [], $path, $name){
      $from = $file['tmp_name'];
      $to = $_SERVER['DOCUMENT_ROOT'].$path.$name;
      $result = move_uploaded_file($from, $to); 
      return $result;
  }
}

?>
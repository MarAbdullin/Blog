<?php

namespace Project\Models;

use \Core\Model;

class Comment extends Model{
  
  public function set_comment($name, $comment, $page_id){
    $sql = "INSERT INTO `comments`(`name`, `comment`, `page_id`) VALUES ('$name', '$comment', '$page_id')";
      $result = $this->record_del($sql);
      return $result;
  }
  
  public function get_comment($page_id){
    $sql = "SELECT * FROM `comments` WHERE page_id = '$page_id'";
      $result = $this->findAll($sql);
      return $result;
  }
  
}


?>
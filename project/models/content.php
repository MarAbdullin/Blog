<?php 

namespace Project\Models;

use \Core\Model;

class Content extends Model{
  
   
  public function string($table, $id){
      $sql = "SELECT * FROM `$table` WHERE id ='$id'";
      $result = $this->findOne($sql);
      return $result;
  }
  
  public function listing($table){
      $sql = "SELECT * FROM `$table`";
      $result = $this->findAll($sql);
      return $result;
  }
  
  public function get_thoughts(){
      $sql = "SELECT thoughts.id as id, thoughts.text as text, thoughts.date as date, users.name as name, users.surname as surname FROM `thoughts` INNER JOIN `users` ON id_author = users.id";
      $result = $this->findAll($sql);
      return $result;
  }
  
  public function last_content(){
    
    return ['articles' => $this->last_articles(), 'thought' => $this->last_thougth(), 'foto' => $this->last_foto()];
    
  }
  
  private function last_articles(){
       $sql = "SELECT id, header FROM `articles` ORDER BY id DESC LIMIT 3";
      $result = $this->findAll($sql);
      return $result;
  }
  
  private function last_thougth(){
       $sql = "SELECT text FROM `thoughts` ORDER BY id DESC LIMIT 1";
      $result = $this->findOne($sql);
      return $result;
  }
  
  private function last_foto(){
       $sql = "SELECT * FROM `foto` ORDER BY id DESC LIMIT 4";
      $result = $this->findAll($sql);
      return $result;
  }
}

?>
<?php

namespace Core;

class Model{
  private static $link;
  
  public function __construct(){
    self::$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_query(self::$link, "SET NAMES 'utf8'");
  }
  
  public function findOne($query){
    $result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
    return mysqli_fetch_assoc($result);
  }
  
  public function findAll($query){
    $data = [];
    $result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
    foreach($result as $row){
      $data[] = $row;
    }
    return $data;
  }
  
  public function record_del($query){
    $result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
    return $result;
  }
  
}


?>
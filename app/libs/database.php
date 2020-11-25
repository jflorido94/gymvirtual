<?php

class Database
{
  private static $instance;

  private $db;

  private function __construct()
  { 
  
  }

  public static function getInstance()
  {
    if (is_null(self::$instance)) {
      self::$instance =  new self();
    }
    return self::$instance;
  }

  public function getConnection()
   {
      if (is_null($this->db)) {
         try {
            $this->db = new PDO(ENGINE . ":host=" . HOST . ";dbname=" . DB, USER, PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         } catch (PDOException $ex) {
            return $ex->getMessage();
         }
      }
      return $this->db;
   }
}
?>
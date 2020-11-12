<?php

class database
{
  private $host;
  private $engine;
  private $db;
  private $user;
  private $pass;

  public function __construct()
  {
    $this->host = constant('HOST');
    $this->engine= constant('ENGINE');
    $this->db = constant('DB');
    $this->user = constant('USER');
    $this->pass = constant('PASS');
  }

  function connect()
  {
    try {
      $pdo = new PDO("$this->engine:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }
}
?>
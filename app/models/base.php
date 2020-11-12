<?php

  class modelo 
  {

    protected $db;

    function __construct()
    {
      $this->db = new database();
    }
  }
  

?>
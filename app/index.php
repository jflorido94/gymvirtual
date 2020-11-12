<?php
// El orden es importante, no variar
  session_start();

  require_once 'config.php';
  require_once 'libs/database.php';
  require_once 'controllers/base.php';
  require_once 'views/base.php';
  require_once 'models/base.php';
  require_once 'libs/app.php';
  // require_once 'libs/UserSession.php';
  
  $app = new app();
?>
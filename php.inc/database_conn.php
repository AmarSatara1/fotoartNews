<?php 

  try {
      $db = new PDO('mysql:host=localhost;dbname=fotoart', 'root', 'root');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e) {
      $db = null;
      echo "Connection failed: " . $e->getMessage();
  }
    
?>
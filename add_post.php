<?php

		if (isset($_POST["submit"])){

      include '.\php.inc\database_conn.php';

      session_start();

			$p_title = $_POST["p_title"];
			$p_text = $_POST["p_text"];
			$p_date = $_POST["p_date"];
			$p_image = 'test';
      $user = $_SESSION["user"];

      if($_FILES['p_image']['error'] > 0) { echo 'Error during uploading, try again'; }
	
      //We won't use $_FILES['file']['type'] to check the file extension for security purpose
      
      //Set up valid image extensions
      $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
      
      //Extract extention from uploaded file
        //substr return ".jpg"
        //Strrchr return "jpg"
        
      $extUpload = strtolower( substr( strrchr($_FILES['p_image']['name'], '.') ,1) ) ;

      //Check if the uploaded file extension is allowed
      
      if (in_array($extUpload, $extsAllowed) ) { 
      
        //Upload the file on the server
        $unique_id = uniqid();
        
        $name = "img/{$unique_id}{$_FILES['p_image']['name']}";
        $result = move_uploaded_file($_FILES['p_image']['tmp_name'], $name);
        
        if($result){echo "<img src='$name'/>";}
        
      } else { echo 'File is not valid. Please try again'; }
    
      $query = "INSERT INTO Posts (`Title`, `Text`, `CreatedAt`, `Image`, `Author`) VALUES ('{$p_title}','{$p_text}','{$p_date}','{$name}','{$user}')";
			$statement = $db->query($query);

      header('Location: posts.php ');
      exit();
    }

?>
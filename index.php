<?php    

  include '.\php.inc\database_conn.php';

  session_start();

  $user = $_SESSION['user'];
  $admin = false;


  $sql = "SELECT Id, Title, Text, CreatedAt, Image, Author FROM Posts";
  $statement = $db->query($sql);

  if($user == "admin"){
    $admin = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/index.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
  <div class="container">
    <div class="header">
      <div class="logo">
        <h1>Celery</h1><!-- remove alt -->
      </div>
      <div class="header-menu">
        <a href="">Home</a>
        <a href="">Workspace</a>
        <a href="">Service</a>
        <a href="">Events</a>
        <a href="">Reviews</a>
        <a href="">Contact Us</a>
      </div>
      <div class="header-controls">
        <button id="toLogin">Log In</button>
        <button id="toSignUp">Sign Up</button>
      </div>
    </div>
    <div class="introduction">

    </div>
    <div class="our-spaces">

    </div>
    <div class="who-uses-celery">

    </div>
    <div class="news-events">
    <?php
      									foreach ($statement as $key => $value){
      
                          echo "<tr> 
                                <td>" . $value["Id"] . "</td>
                                <td>" . $value["Title"] . "</td>
                                <td>" . $value["CreatedAt"] . "</td>
                                <td>" . $value["Author"] . "</td>" .
                          "</tr>";
                        
                        }
      
                        echo "<tr style='height: 50px;'>
                          <th> </th>
                          <th> </th>
                          <th> </th>
                          <th> </th>
                          <th> </th>
                        </tr>";
    ?>
    </div>
    <div class="footer">

    </div>
  </div>
  <script src="js/bootstrap.min.js"></script>
  <script>
    var btn1 = document.getElementById('toLogin');
    var btn2 = document.getElementById('toSignUp');

    btn1.addEventListener('click', function() {
      document.location.href = 'login.php';
    });

    btn2.addEventListener('click', function() {
      document.location.href = 'sign_up.php';
    });
  </script>

</body>
</html>
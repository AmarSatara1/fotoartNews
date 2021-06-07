<?php 

session_start();
$_SESSION["errorMessage"] = '';

include '.\php.inc\database_conn.php';

if(isset($_POST["submit"])){
	$username = $_POST["username"];
  $password = $_POST["password"];

	if (!$username || !$password) {
    	$_SESSION["errorMessage"] = 'You must fill the username and password fields!';
	}
	else {

		$querySearch = "SELECT `Username`, `Password` FROM `Users` WHERE `Username` = '{$username}'";
		$q = $db->query($querySearch);
    $row = $q->fetch(PDO::FETCH_ASSOC);
    
    if(empty($row)) {
      $_SESSION["errorMessage"] = 'Username or password is incorect';
    } else {
		  $hashPassword = hash('ripemd160', $password);

      if($hashPassword == $row["Password"]) {
        $_SESSION["logged"] = true;
        $_SESSION["user"] = $row["Username"];
        $_SESSION["errorMessage"] = "";

        header("Location: admin.php");
        exit();
      } else {
        $_SESSION["errorMessage"] = 'Username or password is incorect';
      }
    } 
  }
}	 

if (isset($_SESSION["errorMessage"])){
  $message = $_SESSION['errorMessage'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<h1 class="text-center">CMS Login</h1>
    		</div>
    	</div>
    </header>

    <section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form id="login" method="POST" class="well">
                    <div class="form-group">
                      <label>Username</label>
                      <input name="username" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input name="password" type="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                      <label>
                        <!-- display message on screen -->
                        <?php
                            if (isset($message)) {
                              echo $message;
                            }
                        ?>
                      </label>
                    </div>
                    <!-- Ispraviti on click da radi kako treba-->	
                    <button type="submit" name="submit" onclick="submit()" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    </section>

    
    <footer id="footer"><p>FotoArt, &copy; <?php echo date("Y"); ?></p></footer>

     <!-- Modals -->

    <!-- <script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'editor1' );
        </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>

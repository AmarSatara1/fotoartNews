<?php
			
include '.\php.inc\database_conn.php';

session_start();

$user = $_SESSION['user'];

if(!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
	header('Location: login.php ');
	exit();
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

    <title>CMS Dashboard</title>

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
          <a class="navbar-brand" href="#">CMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="admin.php">Dashboard</a></li>
            <li class="active"><a href="posts.php">Posts</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a>Welcome, <?php echo $user;?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <header id="header">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<h1> Dashboard </h1>
					</div>
					<div class="col-md-2">
						<div class="dropdown create">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Create Content
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a type="button" data-toggle="modal" data-target="#addPage">Add Post</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
    </header>
    <section id="main">
    <div class="container">
    	<div class="row">
    		<div class="col-md-14">
    					<!-- Website Overview -->
			    			<div class="panel panel-default">
			  <div class="panel-heading main-color-bg">
			    <h3 class="panel-title">Posts</h3>
			  </div>
			  <div class="panel-body">
			  <br>
			  <table class="table table-striped table-hover">

							<?php
							    $sql = "SELECT Id, Title, Text, CreatedAt, Author FROM Posts";
									$statement = $db->query($sql);
								 
							?>
							 

				    	<tr>
				    	<th>Id</th>
				    	<th>Title</th>
							<th>Text</th>
							<th>Date</th>
							<th>Author</th>
							</tr>

							<?php 


							foreach ($statement as $key => $value){
								echo "<tr> 
											<td>" . $value["Id"] . "</td>
											<td>" . $value["Title"] . "</td>
											<td>" . $value["Text"] . "</td>
											<td>" . $value["CreatedAt"] . "</td>
											<td>" . $value["Author"] . "</td>
								</tr>";
							
							}

							echo "<tr style='height: 50px;'>
							<th> </th>
							<th> </th>
							<th> </th>
							<th> </th>
							<th> </th>
							</tr>";

							?>

					
							
				    </table>
			    
			  </div>
			</div>

			<!-- Latest Users -->
    </div>
    	

    </section>

		<footer id="footer"><p>Copyright FotoArt, &copy; <?php echo date("Y"); ?> </p></footer>
		

		 <!-- Modals -->

     <!-- Add Page -->
		 <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-custom">
				<form action="add_post.php" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Add Post</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
								<div class="form-group">
									<label>Post Title</label>
									<input name="p_title" type="text" class="form-control" placeholder="Post Title" value="">
								<div class="form-group">
									<label>Post Text</label>
									<textarea name="p_text" class="form-control" placeholder="Text"> </textarea>
								</div>
								<div class="form-group">
									<label>Date</label>
									<input name="p_date" type="date" class="form-control" placeholder="Date" value="">
								</div>
								<div class="form-group">
								  <label>Images</label>
									<input type="file" class="form-control" name="p_image" accept="image/*" required>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button name="submit" type="submit" class="btn btn-primary">Save changes</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>

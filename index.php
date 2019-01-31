<!doctype html>
<?php

session_start();
if (isset($_POST['email'])) {

	$_SESSION["email"]=$_POST["email"];
}

		print_r($_SESSION);
		//php header for managing the requests to the php server
		$search="";
		$order= "";

		if (isset($_REQUEST["order"])) {
			$search= $_REQUEST["search"];
			$order= $_REQUEST["order"];
			
		}
?>
<html lang="en">
  <head>
    <title>GO Restaurant</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/icon.png" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	 <!--Font Awesome-->
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
      <div class="container">

				<!--LOGO-->
			<div class="logo row">
					
					<div class="col-xs|sm|md|lg|xl-1-12 logo-col">
					<h1><a href="index.php"><img src="img/logo.png" alt="logo"></a></h1>
					</div>
			
			</div>
			
			<!--NAVBAR-->
			<div class="row">
				<div class="menu col-xs|sm|md|lg|xl-1-12">
						<nav class="navbar navbar-expand-md navbar-light bg-light">


							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>	

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item active">
										<a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="navbar-brand nav-link" href="#"><i class="fa fa-cutlery"></i>  Restaurants </a>
									</li>
								</ul>
								<form class="form-inline" method="GET" action="index.php">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="fa fa-search input-group-text" id="basic-addon1"></span>
										</div>
										<input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon1" value="<?= !empty($search)?"$search":"" ?>">
									</div>

									<div class="input-group">
										<div class="input-group-prepend">
											<label class="input-group-text" name="order" for="order">Order:</label>
										</div>
										<select class="custom-select" name="order" id="order">
											<option value="ASC" <?= $order=="ASC"?"selected":""?>>Ascending</option>
											<option value="DESC"<?= $order=="DESC"?"selected":""?>>Descending</option>
										</select>
									</div>
									<button type="submit" class="btn btn-default">Search</button>
								</form>
								<ul class="navbar-nav">
										<?php
										 if (isset($_SESSION) && !empty($_SESSION)) {
											echo "<a class='nav-link href='#'>" .$_SESSION['email']."</a>";
											echo '<a class="nav-link" href="logout.php"><span class="fa fa-user"></span> Log Out</a>';
										}else{
											echo '<a class="nav-link" href="login.php"><span class="fa fa-user"></span> Log In</a>';
											echo '<a class="nav-link" href="#"><span class="fa fa-user"></span> Register</a>';
										}
										
										?>
								</ul>
							</div>

						</nav>
				</div>
		  </div>
		  <br>

		  <!--RESTAURANT CARDS ROW-->
          <?php
				//INCLUDE FUNCTIONS
				include_once "restaurantsdb.php";

				//MAIN 
				$restaurants = getRestaurants($search, $order);
				foreach ($restaurants as $rest) {	
					
			?>

				<div class="row restaurant">
								
					<div class=" col card">
						<div class="row no-gutters">
							<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 restaurant-photo">
							<a href="restaurant.php?id=<?=$rest['id']?>"><img src="<?= $rest["filePath"] ?>" class="img-fluid" alt="thumbnail"></a>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
								<div class="card-body">
									<a class="title-link" href="restaurant.php?id=<?=$rest['id']?>"><h3 class="card-title"><?= $rest["name"] ?></h3></a>
									<p class="card-text"><span class="attribute"><i class="fa fa-file-text"></i> <strong>Description:</strong> </span><?=$rest["description"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-map"></i> <strong>Locality:</strong> </span><?=$rest["locality"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-map"></i> <strong>Route:</strong> </span><?=$rest["route"].', '.$rest["streetNumber"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-map"></i> <strong>PostalCode:</strong> </span><?=$rest["postalCode"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-phone"></i> <strong>PhoneNumber:</strong> </span><?= $rest["phoneNumber"] ?></p>
												
								</div>
							</div>
						</div>
								
					</div>
				
				</div><!--end row-->
			<?php
					
				}
			?>



			<!--FOOTER-->
			<footer class="page-footer font-small footer row">
				<!-- Copyright -->
				<div class="footer-copyright text-center py-3 col">
					© 2018 Copyright:<a href="#"> Dani Tur </a>- IAW
				</div>
			</footer>
				
      	</div><!--end container-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>
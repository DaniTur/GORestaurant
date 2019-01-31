<!doctype html>
<?php
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
	 <link rel="stylesheet" href="css/restaurant.css">
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
										<a class="nav-link" href="#"><span class="fa fa-user"></span> Log In</a>
								</ul>
							</div>

						</nav>
				</div>
		  </div>
		  <br>

		  <!--RESTAURANT CARDS ROW-->
          <?php
		  		//put in a variable the resturant id that the user has clicked on
		  		$id = $_REQUEST["id"];
				//INCLUDE FUNCTIONS
				include_once "restaurantsdb.php";

				//MAIN 
				$restaurant = getRestaurant($id);
				
			?>

				<div class="row restaurant">
						
					<div class=" col card">
						<div class="row no-gutters">
							<button class="btn back-button"><a class="title-link" href="index.php"><i class="fa fa-backward"></i> Back</a></button> 
							<div class="col-12 restaurant-photo">
								<img src="<?= $restaurant[0]["filePath"] ?>" class="img-fluid" alt="thumbnail">
							</div>
							<div class="col-12">
								<div class="card-body">
									<h3 class="card-title"><?= $restaurant[0]["name"] ?></h3>
									<p class="card-text"><span class="attribute"><i class="fa fa-star"></i> <strong>Rating: </strong></span><?=$restaurant[0]["rating"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-bar-chart"></i> <strong>Trending: </strong></span><?=$restaurant[0]["isTrending"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-file-text"></i> <strong>Description: </strong></span><?=$restaurant[0]["description"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-cutlery"></i> <strong>Cuisine Type: </strong></span><?php foreach($restaurant[0]["cuisineType"] as $key => $value) {echo "<span class='badge tag'>".$value['name']."</span> ";}?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-usd"></i> <strong>Price Category: </strong></span><?=$restaurant[0]["priceCategory"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-map"></i> <strong>Locality: </strong></span><?=$restaurant[0]["locality"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-map"></i> <strong>Route: </strong></span><?=$restaurant[0]["route"].', '.$restaurant[0]["streetNumber"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-map"></i> <strong>PostalCode: </strong></span><?=$restaurant[0]["postalCode"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-globe"></i> <strong>Latitude: </strong></span><?=$restaurant[0]["latitude"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-globe"></i> <strong>Longitude: </strong></span><?=$restaurant[0]["longitude"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-phone"></i> <strong>PhoneNumber: </strong></span><?= $restaurant[0]["phoneNumber"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-calendar"></i> <strong>Opening Hours: </strong></span><?= $restaurant[0]["openingHours"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-desktop"></i> <strong>Website: </strong></span><?= $restaurant[0]["website"] ?></p>
									<p class="card-text"><span class="attribute"><i class="fa fa-envelope"></i> <strong>Email: </strong></span><?= $restaurant[0]["email"] ?></p>
									<iframe src = "https://maps.google.com/maps?q=<?=$restaurant[0]["latitude"] ?>,<?=$restaurant[0]["longitude"] ?>&hl=es;z=14&amp;output=embed"></iframe>
								</div>
							</div>
						</div>
								
					</div>
				
				</div><!--end row-->

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
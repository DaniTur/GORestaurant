<?php
require_once 'connection.php';

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
	 <link rel="stylesheet" href="css/login.css">
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
                                <ul class="navbar-nav">
										<a class="nav-link" href="login.php"><span class="fa fa-user"></span> Register</a>
								</ul>
							</div>

						</nav>
				</div>
		  </div>
		  <br>

		  <!--RESTAURANT CARDS ROW-->

           <div class="row restaurant">					
                <div class="col-xs-1-12 login-card">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <form method="post" action="index.php">
                            <h2 class="card-title">Login</h2>
                            <p class="card-text" style="margin-bottom:0">Username:</p>
                            <input type="email" class="input" name="email">
                            <p class="card-text" style="margin-bottom:0">Password:</p>
                            <input type="password" class="input" name="password">
                            <input type="submit" value="Login" class="btn btn-primary input submit">
                        </form>
                    </div>
                    <hr>
                    </div>
                </div>
            </div>
            <!--end row-->

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
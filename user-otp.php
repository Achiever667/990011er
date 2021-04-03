<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connext Coin Hub  = Signup </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- <title>Connext Coin Hub - Bitcoin And Crypto Currency php Template</title> -->
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font  -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i|Roboto:400,400i,500,500i,700,700i" rel="stylesheet"> 
    <!-- icofont icon -->
    <link rel="stylesheet" href="assets/css/icofont.css">	
    <!-- font awesome icon -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">	
    <!-- animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
	<!--- meanmenu Css-->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css" media="all" />	
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/css/owl.theme.default.min.css">
    <!-- venobox -->
    <link rel="stylesheet" href="assets/venobox/css/venobox.css" />	
    <!-- Style CSS --> 
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive  CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">

	<!-- particls.js -->
	<link rel="stylesheet" media="screen" href="css/pstyls.css">

    <!-- <link rel="stylesheet" href="style.css"> -->

	<!-- Usage boxicon -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>


<body>

	<!-- START PRELOADER -->
	<div id="page-preloader">
		<div class="theme-loader">Connext Coin Hub</div>
	</div>
	<!-- END PRELOADER --> 
	
	<!-- START HEADER SECTION -->
	<header class="main-header header-1">
		<!-- START TOP AREA -->
		<div class="top-area">
			<div class="auto-container">
				<div class="row">
					<!-- <div class="col-lg-8 col-md-12 col-sm-12 col-12">
						<div class="info-menu">
							<ul>
								<li><a href="#"><i class="icofont icofont-time"></i> Opening Hours - Mon to Sat: 9AM to 5PM</a></li>
							</ul>
						</div>
					</div> -->
					<!-- end col -->
					<div class="col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="info-menu">
							<ul>
								<li><a href="login-user.php"><i class="icofont icofont-login"></i> Login </a></li>
								<li><a href="signup-user.php"><i class="icofont icofont-user-alt-5"></i> Register </a></li>
								<!-- <li><a href="#"><i class="icofont icofont-hand-drag2"></i> Help </a></li> -->
								<!-- <li><a href="#"><i class="icofont icofont-live-support"></i> Support </a></li> -->
							</ul>
						</div>
					</div> 
					<!-- end col -->
				</div>
			</div>
		</div>
		<!-- END TOP AREA -->

		<!-- START LOGO AREA -->
		<div class="logo-area">
			<div class="auto-container">
				<div class="row">
					<div class="col-lg-5 col-md-3 col-sm-6 col-7 mx-auto pl-0 mb-lg-0 mb-5">
						<div class="logo">
							<a href="index.php">
							   <img class="img-fluid bx-spin" src="assets/img/connext_logo.png" width="80" alt=""> Connext Coin Hub
							</a>
						</div>
					</div>
					<!-- end col -->
					<div class="col-lg-7 col-md-12 col-sm-12 col-12">
						<div class="header-info-box">
                            <div class="header-info-icon">
								<i class="fa fa-envelope-open"></i>
							</div>
							<p>Email Us</p>
                            <h6>info@yoursite.com</h6>
                        </div>
						<div class="header-info-box">
                            <div class="header-info-icon">
								<i class="icofont icofont-phone"></i>
							</div>
							<p>Call Us</p>
                            <h6>123-456-0975</h6>
                        </div>
						<div class="header-info-box">
                            <a href="#" class="quote-btn">Get Started <i class="icofont icofont-caret-right"></i></a>
                        </div>
					</div>
					<!-- end col -->
				</div>
			</div>
		</div>
		<!-- END LOGO AREA -->

		<!-- START NAVIGATION AREA -->
		<div class="sticky-menu">
			<div class="mainmenu-area">
				<div class="auto-container">
					<div class="logo__small">
						<a href="index.php">
						   <img class="img-fluid bx-spin" src="assets/img/connext_logo.png" width="80" alt=""> Connext Coin Hub
						</a>
					</div>
					<div class="row">
						<div class="col-lg-9 d-none d-lg-block d-md-none">
							<nav class="navbar navbar-expand-lg bg-transparent justify-content-left">
								<ul class="navbar-nav">
								   <li class="home"><a href="index.php" class="active nav-link"><i class="icofont icofont-home"></i>Home</a>
										</li>
									<li class="sevices"><a href="service.php" class="nav-link"><i class="icofont icofont-worker"></i>Services</a>
									</li>
									<li class="News"><a href="blog.php" class="nav-link"><i class="icofont icofont-news"></i>News<a>
									</li>
									<li><a href="contact.php" class="nav-link"><i class="icofont icofont-ui-contact-list"></i>Contact</a></li>
									<li class="dropdown"><a class="nav-link" href="about.php"><i class="icofont icofont-people"></i>About Us</a>
										<ul class="dropdown-menu">
											<li><a href="about-us.php">About Us</a></li>
											<li><a href="team.php">Our Team</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>
						<div class="col-lg-3 d-none d-lg-block d-md-none text-right pr-0">
							<form class="navbar-form">
								<div class="form-group">
									<input class="form-control" name="search" value="Search here..." type="text">
									<button type="submit" class="btn"><i class="fa fa-search-plus"></i></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END NAVIGATION AREA -->	
	</header>
	<!-- END HEADER SECTION -->
        <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

	<!-- Latest jQuery -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <!-- popper js -->
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- meanmenu min js  -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- Sticky JS -->
    <script src="assets/js/jquery.sticky.js"></script>
    <!-- owl-carousel min js  -->
    <script src="assets/owlcarousel/js/owl.carousel.min.js"></script>	
    <!-- jquery appear js  -->
    <script src="assets/js/jquery.appear.js"></script>
    <!-- countTo js -->
    <script src="assets/js/jquery.inview.min.js"></script>
    <!-- venobox js -->
    <script src="assets/venobox/js/venobox.min.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <!-- scroll to top js -->
    <script src="assets/js/scrolltopcontrol.js"></script>
    <!-- WOW - Reveal Animations When You Scroll -->
    <script src="assets/js/wow.min.js"></script>
    <!-- scripts js -->
    <script src="assets/js/scripts.js"></script>
	<!-- chart js -->
    <script src="assets/js/canvasjs.min.js"></script>

    <script src="assets/js/canvasjs.activeone.js"></script>

</body>
</html>
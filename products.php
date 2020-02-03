<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'config.php';
// pagination plugin
include 'pagination.php';
?>  


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sawpower : Products</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/logo.jpg"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
     <!-- Bootstrap CSS -->
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Gallery Lightbox -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- Skills Circle CSS  -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/circlebars@1.0.3/dist/circle.css">
    
	<style type="text/css">
		
		/* pagination css */
ul.pagination {margin:0px;padding:0px;height:100%;overflow:hidden;font: 12px 'Open Sans Light';list-style-type:none;margin-top: 20px;}
ul.pagination li.details {color:#000000;padding:2px 4px 2px 4px;font-size:14px;}
ul.pagination li {float:left;margin:0px;padding:0px;margin-left:2px;}
ul.pagination li a {color: black;display: block;text-decoration: none;padding: 2px 8px 2px 8px;margin-right: 2px;border:1px solid #E8E8E8;background: #FFFFFF;}	

ul.pagination li a:hover,
ul.pagination li a.current	{	color: white;display: block;text-decoration: none;padding: 2px 8px 2px 8px;margin-right: 2px;border: 1px solid #898989;background: #A9A9A9;}
	

	</style>
    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Google Fonts Raleway -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
	<!-- Google Fonts Open sans -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">


 
 
	</head>
  <body>

   <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
    </a>
  <!-- END SCROLL TOP BUTTON -->
  	
  	<!-- Start Header -->
	<header id="mu-hero">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light mu-navbar">
				<!-- Text based logo -->
				<a class="navbar-brand mu-logo" href="index.html"><span><img src="assets/images/logo.jpg"></span></a>
				<!-- image based logo -->
			   	<!-- <a class="navbar-brand mu-logo" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="fa fa-bars"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto mu-navbar-nav">
			      <li class="nav-item">
			        <a href="index.html">Home</a>
			      </li>
			      <li class="nav-item"><a href="about-us.html">About us</a></li>
			      <li class="nav-item active"><a href="products.php">Products</a></li>
			   
	
			        <li class="nav-item"><a href="contact.html">Contact us</a></li>
			        
			    </ul>
			  </div>
			</nav>
		</div>
	</header>
	<!-- End Header -->

	<!-- Start Page Header area -->
	<div id="mu-page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-page-header-area">
						<h1 class="mu-page-header-title">PRODUCTS</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Header area -->

	<!-- Start Breadcrumb -->
	<div id="mu-breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav aria-label="breadcrumb" role="navigation">
					  <ol class="breadcrumb mu-breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Products</li>
					  </ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumb -->

	
	<!-- Start main content -->
	<main>
		<!-- Start About -->
<section id="mu-about">
	<div class="container">				

<!--iteration starts here-->
<?php

// pagination limit, page and startpoint calculation
		$limit = 3; // 3 product in each page
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		$startpoint = ($page * $limit) - $limit;
			 
		//to make pagination
		  $table = "`products`";//name of the table
		  $query=mysqli_query($db,"SELECT * FROM {$table}");
			
			$tot=0;
     while ($row = mysqli_fetch_array($query)) {
				$tot++;
			}

        $query = mysqli_query($db, "SELECT * FROM {$table} ORDER BY Id LIMIT {$startpoint} , {$limit}"); 
        while($row=mysqli_fetch_array($query)){
          ?>

      <?php 
	 echo  '<div class="row mt-5">
			<div class="col">
		       <div class="card">
		         <div class="card-body">
          			<div class="row">
					<div class="col-md-6">
						<h5>'.$row['title'].'</h5>
				        <img src="assets/images/products/'.$row['image'].'" style="width:250px;height:250px; align-content: center;">
				     </div>

			     <div class="col-md-6">

			     <div><h6>Features</h6></div>

					<ul>';

					  $pro_id = $row['id'];

$subquery=mysqli_query($db,"SELECT * FROM features WHERE pro_id = $pro_id");

			while($row=mysqli_fetch_array($subquery)){

					echo '<li>'.$row['feature'].'</li>';?>
			 	 
				<?php
			        }
			      ?>   	

					<?php echo '</ul>';?>
			     <?php echo '</div>';?>
		    <?php echo '</div>';?>
		  <?php echo '</div>';?>
       <?php echo '</div>';?>
    <?php echo '</div>';?>
<?php echo '</div>';?>

<?php
        } echo pagination($tot,$table,$limit,$page);
      ?>    
<!--iteration of row ends here-->
		    
	</div><!--end container-->
</section>
		<!-- End Skills -->

		
		<!-- Start Clients -->
		<div id="mu-clients">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-12">
						<div class="mu-clients-area">

							<!-- Start Clients brand logo -->
							<div class="mu-clients-slider">

								<div class="mu-clients-single">
									<img src="assets/images/client-brand-1.jpg" alt="Brand Logo">
								</div>

								<div class="mu-clients-single">
									<img src="assets/images/client-brand-2.png" alt="Brand Logo">
								</div>

								<div class="mu-clients-single">
									<img src="assets/images/client-brand-3.png" alt="Brand Logo">
								</div>

								<div class="mu-clients-single">
									<img src="assets/images/client-brand-4.png" alt="Brand Logo">
								</div>
	<div class="mu-clients-single">
									<img src="assets/images/client-brand-1.jpg" alt="Brand Logo">
								</div>

								<div class="mu-clients-single">
									<img src="assets/images/client-brand-2.png" alt="Brand Logo">
								</div>

							</div>
							<!-- End Clients brand logo -->

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Clients -->

	</main>
	
	<!-- End main content -->	
			
	<!-- Start footer -->
	<footer id="mu-footer">
		<div class="mu-footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="mu-single-footer">
							<img class="mu-footer-logo" src="assets/images/logo.jpg" alt="logo">
							<p>Sawpower is based in Lusaka and can be found at Unit MW4 of Plot 2400 Felopater House Kabelenga Road adjacent to Levy Mall.</p>
							<div class="mu-social-media">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a class="mu-twitter" href="#"><i class="fa fa-twitter"></i></a>
								<a class="mu-pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>
								<a class="mu-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
								<a class="mu-youtube" href="#"><i class="fa fa-youtube"></i></a>
							</div>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="mu-single-footer">
							<h3>Useful links</h3>
							<ul class="mu-useful-links">
								<li><a href="#">Help Center</a></li>
								<li><a href="#">Download Center</a></li>
								<li><a href="#">User Account</a></li>
								<li><a href="#">Support Forum</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="mu-single-footer">
							<h3>Contact Information</h3>
							<ul class="list-unstyled">
							  <li class="media">
							    <span class="fa fa-home"></span>
							    <div class="media-body">
							    	<p>MW4 Felopater House Plot 2400 Kabelenga Road P O Box 36122 Lusaka</p>
							    </div>
							  </li>
							  <li class="media">
							    <span class="fa fa-phone"></span>
							    <div class="media-body">
							       <p>+260 211 231 000</p>
							     	<p>+260 977 780 216</p>
							    </div>
							  </li>
							  <li class="media">
							    <span class="fa fa-envelope"></span>
							    <div class="media-body">
							     <p>wcchisulo@sawpower.net</p>
							    
							    </div>
							  </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mu-footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-footer-bottom-area">
							<p class="mu-copy-right">&copy; Copyright <a rel="nofollow" href="">Sawpower</a>. All right reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- End footer -->

	<!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <!-- Progress Bar -->
    <script src="https://unpkg.com/circlebars@1.0.3/dist/circle.js"></script>
    <!-- Filterable Gallery js -->
    <script type="text/javascript" src="assets/js/jquery.filterizr.min.js"></script>
    <!-- Gallery Lightbox -->
    <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter js -->
    <script type="text/javascript" src="assets/js/counter.js"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="assets/js/app.js"></script>
    
	
    <!-- Custom js -->
	<script type="text/javascript" src="assets/js/custom.js"></script>

	<!-- About us Skills Circle progress  -->
	<script>
		// First circle
	    new Circlebar({
        element : "#circle-1",
        type : "progress",
	      maxValue:  "90"
	    });
		
		// Second circle
	    new Circlebar({
        element : "#circle-2",
        type : "progress",
	      maxValue:  "84"
	    });

	    // Third circle
	    new Circlebar({
        element : "#circle-3",
        type : "progress",
	      maxValue:  "60"
	    });

	    // Fourth circle
	    new Circlebar({
        element : "#circle-4",
        type : "progress",
	      maxValue:  "74"
	    });

	</script>
    
  </body>
</html>
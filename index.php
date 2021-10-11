<?php

	$active_menu='Home';

	//THE FOLLOWING FILE DEALS WITH DATABASE CONNECTION, INSERTING, UPDATING AND DELETING DATA
	include_once('database_operations.php');
	//SELECT DATABASE
	$db_obj= new database;
	$submit_status=array();
	$status='';
	$send_before_load='';

	

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">
		<meta name="theme-color" content="#00698c" />

		<title>Basic Banking System</title>


	</head>

	<body>
	<?php include_once('header.php'); ?> <!-- including header bar -->
	<?php include_once('menu_bar.php'); ?> <!-- including menu bar -->
	
    <br />
	<div class="d-flex justify-content-center">
		<!-- Content Start -->
		<div class="card" style="width: 18rem;">
		<div class="card-body">
			<h5 class="card-title">Welcome to our Bank</h5>
			<p class="card-text">We provide best banking services.</p>
			<a href="customers.php" class="btn btn-primary">Our Customers</a>
		</div>
		</div>
		<!-- Content End -->
    </div>
	<!-- rest body end -->
	<?php include_once('footer.php'); ?>
	</body>
</html>

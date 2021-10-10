<?php
	$active_menu='';

	//THE FOLLOWING FILE DEALS WITH DATABASE CONNECTION, INSERTING, UPDATING AND DELETING DATA
	include_once('database_operations.php');
	//SELECT DATABASE
	$db_obj= new database;
	$submit_status=array();
	$status='';
	$send_before_load='';


$cust_data=$db_obj->fetch_data('customers','','cid="'.$_GET['event'].'"','cid');

 ?>

<!DOCTYPE html>
<html>

<head>
	
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
	
		<meta name="theme-color" content="#00698c" />
		
		<title>User</title>
</head>
<body>
	<?php include_once('header.php'); ?> <!-- including header bar -->
	<?php include_once('menu_bar.php'); ?> <!-- including menu bar -->


	<?php
		extract($cust_data[0]);
	?>
	<br> <br>
	<div class="d-flex justify-content-center">
		<div class="card text-white bg-dark mb-3" style="width: 18rem; align: center;">
			<img class="card-img-top" src="images/user.png" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?php echo $name; ?></h5>
				<p class="card-text"><?php echo $email; ?></p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Customer ID: <?php echo $cid; ?></li>
				<li class="list-group-item">Balance: <?php echo $balance; ?></li>
				
			</ul>
			<div class="card-body">
				<div class="card-footer bg-transparent border-success">
				<a href='transfer.php?event=<?php echo $cid; ?>' class='other_articles_links_general link_general' >
					<button type="button" class="btn btn-primary">
						
							Transfer Money
						
					</button>	
				</a>
				</div>
			</div>
		</div>
	</div>	
	<?php include_once('footer.php'); ?>
</body>
</html>
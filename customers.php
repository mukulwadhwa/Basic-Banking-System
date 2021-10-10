<?php

	$active_menu='';

	//THE FOLLOWING FILE DEALS WITH DATABASE CONNECTION, INSERTING, UPDATING AND DELETING DATA
	include_once('database_operations.php');
	//SELECT DATABASE
	$db_obj= new database;
	$submit_status=array();
	$status='';
	$send_before_load='';
	$cust_data=$db_obj->fetch_data('customers','','','cid');

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
		
		<title>Customers</title>
	
		<meta name="viewport" content="width=device-width, initial-scale=0.8">

		<link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet"> 
		<script src="bootstrap5/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include_once('header.php'); ?> <!-- including header bar -->
	<?php include_once('menu_bar.php'); ?> <!-- including menu bar -->

	
		<?php
			if(!empty($cust_data))
			{
				echo 
				"<div class='rs_adjustment_div' align='center'>
				<div class='rs_sub_adjustment_div'>
				<h1 class='title_body_content'>Customer Window </h1>
					<br />
					<br />
					<br />
					<br />";
					
				
				$i=1;

				echo 
				"<div class='container-sm'><table class='table'>
					<thead class='thead-dark'>
						<tr>
							<th scope='col'>Customer ID</th>
							<th scope='col'>Name</th>
							<th scope='col'>Email</th>
							<th scope='col'>Balance</th>
						</tr>
					</thead>
					<tbody>
				";

				foreach($cust_data as $cust_data_each)
				{
					$border_top_0='';
					if($i==1)
					{
						$border_top_0="style='border-top: 0px;'";
					}
					extract($cust_data_each);
					
					$customer_id=ucwords($cid);
					$customer_name=ucwords($name);
					$customer_email=$email;
					$customer_balance=$balance;
					
					//DISPLAYING EACH ELEMENT USING LOOP
					
					echo" 
									<tr>
										<th scope='row' ><a href='user.php?event=$cid' class='other_articles_links_general link_general' >$customer_id </a> </th>
										<td >$customer_name</td>
										<td >$customer_email</td>
										<td >$customer_balance</td>
										</tr>		
									</tbody>		
						
					";
				}

				echo "</table></div>";
				echo "";

			} 
			else {
				
				echo"<h1 class='title_body_content no_rs' style='margin-bottom: 50px;'>Sorry, no data found here.</h1>";

			}
		?>

	<?php include_once('footer.php'); ?>
	
</body>
</html>
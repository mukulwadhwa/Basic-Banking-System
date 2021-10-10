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
extract($cust_data[0]);
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
		
		<title>User</title>
	
	<script src="jquery/jquery-3.4.1.min.js"></script>
	
	
<script type="text/javascript" async="" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-MML-AM_CHTML">
</script>

<meta name="viewport" content="width=device-width, initial-scale=0.8">

<link rel="stylesheet" type="text/css" href="stylesheets/footer.css" />
<link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet"> 
<script src="bootstrap5/js/bootstrap.min.js"></script>

</head>
	
<body>
	<?php include_once('header.php'); ?> <!-- including header bar -->
	<?php include_once('menu_bar.php'); ?> <!-- including menu bar -->


    <Br>
    
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
		<div class="card-body">
        
        Current Balance: <?php echo $balance; ?>
        <hr>
        <form action="transfer_status.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-10">
                <label>Beneficiary Account</label>
                <input type="number" class="form-control" name="bid" >
                </div>
                <div class="form-group col-md-10">
                <label>Amount</label>
                <input type="number" class="form-control" name="amount" >
                </div>
                <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                <input type="hidden" name="balance" value=<?php echo $balance; ?>>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Send Money</button>
        </form>
        </div>
        </div>
    </div>	
	<br> <br>
	<?php include_once('footer.php'); ?>
</body>
</html>
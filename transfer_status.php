<?php
	$active_menu='';

	//THE FOLLOWING FILE DEALS WITH DATABASE CONNECTION, INSERTING, UPDATING AND DELETING DATA
	include_once('database_operations.php');
	//SELECT DATABASE
	$db_obj= new database;
	$submit_status=array();
	$status='';
	$send_before_load='';


$cust_data=$db_obj->fetch_data('customers','','cid="'.$_POST['cid'].'"','cid');
$ben_data=$db_obj->fetch_data('customers','','cid="'.$_POST['bid'].'"','cid');

extract($cust_data[0]);

$trans_data=$db_obj->fetch_data('transfers','','','tid');

?>

<!DOCTYPE html>
<html>

<head>
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
		<meta name="theme-color" content="#00698c" />
		
		<title>Transaction Status</title>


	
</head>

<body>
	<?php include_once('header.php'); ?> <!-- including header bar -->
	<?php include_once('menu_bar.php'); ?> <!-- including menu bar -->

    

    <br>

    <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
		<div class="card-body">

            <?php

            if (isset($_POST['bid'],$_POST['amount']))
            {
                $b=$_POST["balance"];
                $a=$_POST["amount"];
                $bid=$_POST['bid'];

                if(count($db_obj->fetch_data('customers','',"cid='" . $bid ."'",''))>0)
                    {
                        if($b > $a && $a>0)
                        {
                            $bid=$_POST["bid"];                   
                            
                            if(count($db_obj->fetch_data('transfers','','',''))>0){
                                $last_id=$db_obj->fetch_data('transfers','MAX(tid)','','');
                                $new_id=++$last_id[0]['MAX(tid)'];
                            } 
                            else
                            {
                                $new_id=1;
                            }
                            

                            $time = date("Y-m-d H:i:s"); 
                            $get_data=array($time, $a, $cid, $bid);
                            
                            //inserting data in the array to add in database
                            if($db_obj->insert_data('transfers',$new_id,$get_data))
                            {
                                $status .= 'Successfully uploaded data.</font><br />';
                            } else{
                                $status .= 'Could not upload data.</font><br />';
                            }
                                
                        
                            echo 
                            "Transfer Successful! <br> <br>";

                            echo "Your Account: "; 
                            echo $_POST['cid'];
                            echo "<br> Beneficiary Account: ";
                            echo $_POST["bid"];
                            echo "<br> Transferred Amount: ";
                            echo $_POST["amount"];

                            $b=$b-$a;

                            echo "<br> Current Balance: ";
                            echo $b;

                            //Updating Customer
                            $update_data=array('balance');
                            $update_values=array($b);
                            $update_condition=array('cid');
                            $update_of=array($cid);

                            $update_data=array_map(array($db_obj->connect_db(),'real_escape_string'),$update_data);
                            $update_values=array_map(array($db_obj->connect_db(),'real_escape_string'),$update_values);
                            
                            $send_data_to_server=$db_obj->update_data('customers',$update_data,$update_values,$update_condition,$update_of,'','');



                            //Update Benificiary

                            extract($ben_data[0]);
                            $b=$balance+$a;
                            $update_data=array('balance');
                            $update_values=array($b);
                            $update_condition=array('cid');
                            $update_of=array($bid);

                            $update_data=array_map(array($db_obj->connect_db(),'real_escape_string'),$update_data);
                            $update_values=array_map(array($db_obj->connect_db(),'real_escape_string'),$update_values);

                            $send_data_to_server=$db_obj->update_data('customers',$update_data,$update_values,$update_condition,$update_of,'','');
                            
                            if($send_data_to_server){
                                $status .= '<font class="status_message success_status">Successfully updated Data.</font><br />';
                            } else{
                                $status .= '<font class="status_message not_success_status">Could not update Data.</font><br />';
                            }
                        }

                        else 
                        {
                            echo "Invalid Amount";
                        }

                    

                    }

                    else
                    {
                        echo "Beneficiary Doesn't Exist!";
                    }
            }

            else 
            {
                echo "Transaction failed";
            }
            
            ?>
        </div>
        </div>
    </div>
	
	<br> <br>
	<?php include_once('footer.php'); ?>
</body>
</html>
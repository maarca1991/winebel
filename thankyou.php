<?php
	include("connect.php"); 
	include("include/notification.class.php");

	$db->rpcheckLogin();
	$page = "Thank You";

	$a = json_encode($_REQUEST);
	$_POST = json_decode($a,true);

	if(isset($_POST)){

		if($_POST['tx'] != ""){

			$paypal_response = json_encode($_POST);
			$custom_arr = explode(",", $_POST['cm']);

			$user_id 			= $custom_arr[0];
			$cart_det_id 		= $custom_arr[1];
			$grandtotal 		= $custom_arr[2];
			$history_id 		= $custom_arr[3];

			if(isset($cart_det_id) && $cart_det_id > 0 ){
				
				$adate				= date('Y-m-d H:i:s');
				$total_amount 		= $_POST['amt'];
				$transaction_id 	= $_POST['tx'];

				$rows = array(
					"payment_status" 	=> '1', 
					"payment_date" 		=> $adate,
					"txn_id" 			=> $transaction_id,
					"err_msg" 			=> 'success'
				);
				$db->rpupdate("payment_history", $rows, 'id = ' . $history_id);

				$count_length = count($_SESSION[SESS_PRE.'_SESS_CART_ID']);
				if($count_length < 6 )
				{
					for ($i=0; $i < 6-$count_length ; $i++) { 
						$order_no .= 0;
					}
					$order_no = 'WINE'.$order_no.$_SESSION[SESS_PRE.'_SESS_CART_ID'];
				}

				$rows = array(
					"order_no"		=> $order_no,
					"order_status"	=> '1',
					"order_date"	=> date('Y-m-d H:i:s')
				);

				$db->rpupdate("cart", $rows, " user_id=" . $user_id . " AND id = " . $cart_det_id);

				$where = " cart_id=".$cart_det_id." AND isDelete=0";
				$ctable_r = $db->rpgetData("cart_detail","*",$where);
				
				if(@mysqli_num_rows($ctable_r)>0)
				{
					while($ctable_d = @mysqli_fetch_array($ctable_r))
					{
						$where1 = " labels_id=".$ctable_d['label_id'];
						$rows1 = array(
							"status" => "3"
						);
						$db->rpupdate("labels",$rows1,$where1);
					}
				}

				$get_user_r = $db->rpgetData("user","*"," id=".$user_id);
				$get_user_d = @mysqli_fetch_array($get_user_r);
				$user_name  = $get_user_d['name'];
				$toemail    = $get_user_d['email'];

				$get_cart_r 	= $db->rpgetData("cart","*"," id=".$cart_det_id);
				$get_cart_d 	= @mysqli_fetch_array($get_cart_r);

				$order_no		= $get_cart_d['order_no'];
				
				$order_status	= $get_cart_d['order_status'];
				
				if($order_status==0)
				{
					$order_status='In Progress';
				}
				elseif($order_status==1)
				{
					$order_status='Completed';
				}
				else
				{
					$order_status='Cancel';
				}

				$order_date		= $get_cart_d['order_date'];
				$sub_total		= $get_cart_d['sub_total'];
				$tax			= $get_cart_d['tax'];
				$grand_total	= $get_cart_d['grand_total'];

				$subject = "Your order is placed successfully";
				$nt = new Notification();
				include("mailbody/client_order.php");
				$nt->rpsendEmail($toemail,$subject,$body);

				$subject1 = "New order received";
				$nt1 = new Notification();
				include("mailbody/admin_order.php");
				$nt1->rpsendEmail(SITEMAIL,$subject1,$body1);

				unset($_SESSION[SESS_PRE.'_SESS_CART_ID']);
				
				$_SESSION['MSG'] = 'Success_payment';
				$db->rplocation(SITEURL."thankyou/");
			}
		}
	}
?>
<html>
<head>
	<title><?php echo USER_PROFILE_TITLE."| ".SITENAME; ?></title>
	<?php include_once('include_css.php') ?>
</head>
<body class="dashboard-page bg-primary-1">
<main class="main-wrapper">
	<?php include_once('include_header.php'); ?>
	<section>
		<div class="container">
			<div class="d-flex dashboard">
				<?php include_once('include_sidebar.php'); ?>
				<div class="dashboard-content">
					<div class="row">
						<div class="col-lg-8 p-3 p-md-5">
							<div class="card border-0 rounded-0 h-100">
								<div class="card-body ">
									<img class="rounded-0 " style="margin-left:60px;" src="<?php echo SITEURL.'images/thank-you.gif' ?>">
								</div>
							</div>
						</div>
						<div class="col-lg-4 right sidebar d-none d-lg-block">
							<h4 class="h4">
								<?php echo CHANGE_PROFILE_SIDEBAR_TITLE; ?>
								
							</h4>
							<p><?php echo CHANGE_PROFILE_SIDEBAR_DESCRIPTION; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- CDN -->
<?php include_once('include_js.php') ?>

</body>
</html>
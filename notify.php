<?php
	$a = json_encode($_POST);

	include("connect.php"); 

	$_POST = json_decode($a,true);
	 
	if(isset($_POST)){

		if($_POST['payment_status'] == 'Completed'){

			$paypal_response = json_encode($_POST);
			$custom_arr = explode(",", $_POST['custom']);
		
			$user_id 			= $custom_arr[0];
			$cart_det_id 		= $custom_arr[1];
			$grandtotal 		= $custom_arr[2];
			$history_id 		= $custom_arr[3];

			if(isset($cart_det_id) && $cart_det_id > 0 ){
				
				$adate				= date('Y-m-d H:i:s');;
				$total_amount 		= $_POST['mc_gross'];
				$transaction_id 	= $_POST['txn_id'];

				$rows = array(
					"payment_status" 	=> 1, 
					"payment_date" 		=> $adate,
					"txn_id" 			=> $transaction_id,
					"err_msg" 			=> 'success'
				);
				$db->rpupdate("payment_history", $rows, 'id = ' . $history_id);

				$rows = array(
					"order_no"		=> "WINE".$_SESSION[SESS_PRE.'_SESS_CART_ID'],
					"order_status"	=> 1,
					"order_date"	=> date('Y-m-d H:i:s')
				);

				$db->rpupdate("cart", $rows, " user_id=" . $user_id . " AND id = " . $cart_det_id);

			}
		}
	}
?>
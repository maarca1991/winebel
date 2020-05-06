<?php
	include('connect.php');
	
	$where 	= " user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND isDelete=0";
	$ctable_r = $db->rpgetData("cart","*",$where);
	$ctable_d =  @mysqli_fetch_array($ctable_r);

	$rows = array(
		"uid" 			=> $_SESSION[SESS_PRE.'_SESS_USER_ID'],
		"cart_det_id" 	=> $_SESSION[SESS_PRE.'_SESS_CART_ID'],
		"price"			=> $ctable_d['grand_total'],
		"payment_date"	=> date("Y-m-d H:i:s")
	);

	$history_id = $db->minsert("payment_history", $rows);

	$qty = $db->rpgetValue('cart_detail', 'SUM(quntity)', 'cart_id=' . $ctable_d['id'] . ' AND user_id='.$_SESSION[SESS_PRE.'_SESS_USER_ID'].'  AND isDelete = 0');

	// echo '===' . $history_id . '^^^' . $ctable_d['grand_total'] . '###' . $qty;die();
	$test = '<input type="hidden" name="custom" value="'.$_SESSION[SESS_PRE.'_SESS_USER_ID'].','.$_SESSION[SESS_PRE.'_SESS_CART_ID'].','.$ctable_d['grand_total'].','.$history_id.'">';

	$pay_form = '<script type="text/javascript">
	document.onkeydown = function (e) {
		return false;
	}

	if (document.layers) {
		document.captureEvents(Event.MOUSEDOWN);
		document.onmousedown = function () {
			return false;
		};
	}
	else {
		document.onmouseup = function (e) {
			if (e != null && e.type == "mouseup") {
				if (e.which == 2 || e.which == 3) {
					return false;
				}
			}
		};
	}

	document.oncontextmenu = function () {
		return false;
	};

	document.onkeydown = function(e) {
		if(event.keyCode == 123) {
			return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)){
			return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)){
			return false;
		}
		if(e.ctrlKey && e.keyCode == "U".charCodeAt(0)){
			return false;
		}
	}

	</script><div class="bag_loader"><img src="'.SITEURL.'images/ajax-loader.gif" style="margin-left:48%;margin-top:20%;width:120px;"><p class="text-center" style="text-align: center;
			font-size: 28px; font-family: "Source Sans Pro", sans-serif">Please Wait redirecting to paypal</p></div>
			<form method="post" action="'.PAYPAL_URL.'" name="frmPayPal" id="frmPayPal">
				<input type="hidden" name="amount" id="amount" value="'.$ctable_d['grand_total'].'">
				<input type="hidden" name="business" value="'.PAYPAL_EMAIL.'">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="item_name" value="Product">
				<input type="hidden" name="item_number" value="'.$qty.'">
				<input name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" type="hidden">
				<input type="hidden" name="currency_code" value="EUR">
				<input type="hidden" name="rm" value="2">
				<input type="hidden" name="return" value="'.SITEURL.'thankyou/">
				<input type="hidden" name="cancel_return" value="'.SITEURL.'cart/">
				<input type="hidden" name="notify_url" value="'.SITEURL.'notify.php">
				<input type="hidden" name="custom" value="'.$_SESSION[SESS_PRE.'_SESS_USER_ID'].','.$_SESSION[SESS_PRE.'_SESS_CART_ID'].','.$ctable_d['grand_total'].','.$history_id.'">
			</form>';

	//unset($_SESSION[SESS_PRE.'_SESS_CART_ID']);
	//unset($_SESSION[SESS_PRE.'_SESS_GUEST_ID']);
	echo json_encode($pay_form);
	exit;
?>

<!--<script type="text/javascript">document.frmPayPal.submit();</script>-->
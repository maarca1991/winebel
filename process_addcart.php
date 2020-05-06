<?php
include("connect.php");

$cart 	= $db->clean($_POST['cart_array'][0]);
$data = explode(",", $cart);

if($data[0] != "")
{ 
	if($_SESSION[SESS_PRE.'_SESS_CART_ID'] > 0)
	{

	}
	else
	{
		$rows2 = array(
			"user_id"		=> $_SESSION[SESS_PRE.'_SESS_USER_ID'],
			"sub_total"		=> 0,
			"order_no"		=> 0,
			"tax"			=> 0,
			"grand_total"	=> 0
		);
		$cartId = $db->minsert("cart",$rows2);
		$_SESSION[SESS_PRE.'_SESS_CART_ID'] = $cartId;
	}
	

	for ($i=0; $i < count($data) ; $i++) { 
		$check = $db->rpgetData("cart_detail","*","isDelete=0 AND user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND label_id=".$data[$i]." AND cart_id=".$_SESSION[SESS_PRE.'_SESS_CART_ID']);
		if(@mysqli_num_rows($check)>0){
			$_SESSION['MSG'] = 'SOMETHING_WRONG';
		}
		else
		{
			$rows = array(
				"user_id"	=> $_SESSION[SESS_PRE.'_SESS_USER_ID'],
				"label_id"	=> $data[$i],
				"cart_id"	=> $_SESSION[SESS_PRE.'_SESS_CART_ID']
			);
			$cart = $db->minsert('cart_detail',$rows);
		}
	}
	$res = $db->ChangeCart();
	if($res == true)
	{
		$_SESSION['MSG'] = 'Add_cart_success';
		$db->rplocation(SITEURL."cart/");
		exit;
	}
	else
	{
		$_SESSION['MSG'] = 'Something_Wrong';
		$db->rplocation(SITEURL."cart/");
		exit;
	}
}
else
{
	$_SESSION['MSG'] = 'Select_label';
	$db->rplocation(SITEURL."label/");
	exit;
}

?>
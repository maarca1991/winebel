<?php

include("connect.php");
// print_r("<pre>");
// print_r($_POST);die();
$ctable = "cart";

if(isset($_POST['cart_id']) && $_POST['cart_id']!="")
{	
	$rows 	= array(
		"order_status"=> $_POST['order_status'],
	);

	$where	= " id='".$_REQUEST['cart_id']."' ";
	$db->rpupdate($ctable ,$rows,$where);	
	echo json_encode(true);
	exit;
}
else
{
	echo json_encode(false);
	exit;
}

?>
<?php
include("connect.php");

$label_id 	= 	$db->clean($_POST['delete_labels_id']);

if($label_id!="")
{
	$rows 	= array(
		"isDelete"	=> '1'
	);
	
	$where = " label_id=".$label_id." AND user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND isDelete=0";
	$uid = $db->rpupdate('cart_detail',$rows,$where);

	$res = $db->ChangeCart();
	if($res == true)
	{
		$_SESSION['MSG'] = 'Deleted_label_cart';
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
	$_SESSION['MSG'] = 'Something_Wrong';
	$db->rplocation(SITEURL."cart/");
	exit;
}
?>
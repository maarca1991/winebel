<?php
include("connect.php");

$labels_id 	= 	$db->clean($_POST['delete_labels_id']);

if($labels_id!="")
{
	$rows 	= array(
		"isDelete"	=> '1'
	);
	$where = " labels_id=".$labels_id;
	$uid = $db->rpupdate('labels',$rows,$where);

	$rows1 = array(
		"isDelete"	=> '1'
	);
	$where1 = " label_id=".$labels_id." AND cart_id=".$_SESSION[SESS_PRE.'_SESS_CART_ID'];
	$db->rpupdate("cart_detail",$rows1,$where1);

	$db->ChangeCart();

	$_SESSION['MSG'] = "Deleted_label";
	$db->rplocation(SITEURL."label/");
	exit;
}
else
{
	$_SESSION['MSG'] = 'FILL_ALL_DATA';
	$db->rplocation(SITEURL."label/");
	exit;
}
?>
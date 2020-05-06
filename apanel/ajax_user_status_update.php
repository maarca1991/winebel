<?php

include("connect.php");
$ctable = "user";
$old_status='';
$isActive=0;
// Get the total number of rows in the table

if(isset($_REQUEST['id']) && $_REQUEST['id']!=""){
	
	$old_active=$db->rpgetValue($ctable,"isActive"," isDelete= 0 AND id=".$_REQUEST['id']);
	
	if($old_active==0)
	{
		$isActive=1;
	}
	else
	{
		$isActive=0;
	}

	$rows 	= array(
		"isActive"=> $isActive,
	);
			
	$where	= " isDelete= 0 AND id='".$_REQUEST['id']."' ";
	$db->rpupdate($ctable ,$rows,$where);
	
}
?>
<?php
include("connect.php");

$id 		= $db->clean($_POST['id']);
$slug 		= $db->clean($_POST['slug']);
$password 	= $db->clean($_POST['password']);

if($id != '' && $slug!="" && $password!="")
{
	$ctable='user';
	$check_user = $db->rpgetData("user","*","md5(id) = '".$id."' AND forgotpass_string='".$slug."' AND isDelete=0");
	if($check_user)
	{
		$rows 	= array(
			"password"			=> md5($password),
			"forgotpass_string" => ""
		);
		$db->rpupdate("user",$rows,"md5(id)='".$id."' AND isDelete=0");
		
		$_SESSION['MSG'] = 'Update_Pass';
		$db->rplocation(SITEURL."login");
	}
	else
	{
		$_SESSION['MSG'] = 'Link_Expired';
		$db->rplocation(SITEURL."forgot-password/");
	}
}
else
{
	$_SESSION['MSG'] = "INVALID_DATA";
	$db->rplocation(SITEURL."setnewpassword/".$id."/".$slug."/");
	exit;
}
?>
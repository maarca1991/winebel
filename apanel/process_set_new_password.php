<?php
include("connect.php");
$id 		= $db->clean($_POST['id']);
$slug 		= $db->clean($_POST['slug']);
$newpass 	= $db->clean($_POST['newpass']);

if($id != '' && $slug!="" && $newpass!="")
{
	$check_user = $db->rpgetData(CTABLE_SELLER,"*","md5(id) = '".$id."' AND forgotpass_string='".$slug."'");
	if(@mysqli_num_rows($check_user) > 0)
	{
		$rows 	= array(
						"password"			=> md5($newpass),
						"forgotpass_string" =>"0"
					);
		$db->rpupdate(CTABLE_SELLER,$rows,"md5(id)='".$id."'");
		
		$_SESSION['MSG'] = 'Update_Pass';
		$db->rplocation(SITEURL."seller/login/");
		
	}
	else
	{
		$_SESSION['MSG'] = 'Link_Expired';
		$db->rplocation(SITEURL."seller/forgetpassword/");
	}
}
else
{
	$_SESSION['MSG'] = "INVALID_DATA";
	$db->rplocation(SITEURL."seller/setnewpassword/".$id."/".$slug."/");
	exit;
}
?>
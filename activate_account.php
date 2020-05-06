<?php 
include("connect.php");

$activation_code = $db->clean($_REQUEST['activation_code']);
$id = $db->clean($_REQUEST['uid']);

if($activation_code != "")
{
	$check_dup = $db->rpgetData("user",'id',"confirmation_string = '".$activation_code."' AND isDelete=0");

	if(!$check_dup)
	{
		$_SESSION['MSG'] = "Something_Wrong";
		$db->rplocation(SITEURL);
		exit;
	}
	else
	{
		$ctable_d = @mysqli_fetch_array($check_dup);
		$where = "confirmation_string='".$activation_code."' AND isDelete=0";
		$row = array(
			"active_account" => '1'
		);
		$check = $db->rpupdate('user',$row,$where);

		if($check > 0)
		{
			$_SESSION['MSG'] = "Activate_account_success";
			$db->rplocation(SITEURL);
			exit;
		}
	}
}
else
{
	$_SESSION['MSG'] = "Something_Wrong";
	$db->rplocation(SITEURL);
	exit;
}

?>
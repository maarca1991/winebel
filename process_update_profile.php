<?php
include("connect.php");
include("include/notification.class.php");

$name 				= 	$db->clean($_POST['name']);
$email 				= 	$db->clean($_POST['email']);

if($email!="" && !filter_var($email, FILTER_VALIDATE_EMAIL) === false)
{
	$dup_where = "email = '".$email."' AND id!='".$_SESSION[SESS_PRE.'_SESS_USER_ID'];
	$r = $db->rpdupCheck("user",$dup_where);
	if($r)
	{
		$_SESSION['MSG'] = "Already_registered";
		$db->rplocation(SITEURL);
		exit;
	}
	else
	{
		$rows 	= array(
			"name"					=> $name,
			"email"					=> $email
		);
		$where = " id=".$_SESSION[SESS_PRE.'_SESS_USER_ID'];
		$uid = $db->rpupdate('user',$rows,$where);

		$_SESSION['MSG'] = "Update_profile_success";
		$db->rplocation(SITEURL);
		exit;
	}
	
}
else
{
	$_SESSION['MSG'] = 'FILL_ALL_DATA';
	$db->rplocation(SITEURL);
}
?>
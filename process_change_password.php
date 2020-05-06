<?php
include("connect.php");
include("include/notification.class.php");

$password 	= 	$db->clean($_POST['password']);

if($password!="")
{
	$rows 	= array(
		"password"	=> md5($password)
	);
	$where = " id=".$_SESSION[SESS_PRE.'_SESS_USER_ID'];
	$uid = $db->rpupdate('user',$rows,$where);

	$_SESSION['MSG'] = "Change_password_success";
	$db->rplocation(SITEURL."change-password/");
	exit;
}
else
{
	$_SESSION['MSG'] = 'FILL_ALL_DATA';
	$db->rplocation(SITEURL."change-password/");
	exit;
}
?>
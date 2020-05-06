<?php 
include("connect.php");

$oldpassword = $db->clean($_POST['oldpassword']);

if($oldpassword!="")
{
	$check_dup = $db->rpgetData("user",'id'," password = '".md5($oldpassword)."' AND id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']);

	if(@mysqli_num_rows($check_dup) > 0)
	{
		echo json_encode(true);
	}
	else
	{
		echo json_encode(false);
	}
}
else
{
	echo json_encode(false);
}

?>
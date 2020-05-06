<?php

include("connect.php");
$email 		= $db->clean($_POST['email']);
$password 	= $db->clean($_POST['password']);

if($email!="" && $password!="" && !filter_var($email, FILTER_VALIDATE_EMAIL) === false)
{
	$check_user_r = $db->rpgetData("user","id,name,active_account","email = '".$email."' AND  password = '".md5($password)."' AND isDelete=0 ");
	
	if($check_user_r)
	{
		$check_user_d = @mysqli_fetch_array($check_user_r);
		
		if($check_user_d['active_account']==1)
		{
			$id 	=  $check_user_d['id'];
			$name 	=  $check_user_d['name'];
			
			$_SESSION[SESS_PRE.'_SESS_USER_ID'] 	= 	$id;
			$_SESSION[SESS_PRE.'_SESS_USER_NAME'] 	= 	$name;
			
			$last_login = date('Y-m-d H:i:s');
			$rows= array(
				"last_login"=> $last_login,
			);
			$where			= "id='".$id."' AND isDelete=0 ";
			$update_record 	= $db->rpupdate("user",$rows,$where);
			
		 	$ctable_r = $db->rpgetData("cart","*","user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND order_status='0' ");
			if(@mysqli_num_rows($ctable_r)>0)
			{
				$ctable_d = @mysqli_fetch_array($ctable_r);
				$_SESSION[SESS_PRE.'_SESS_CART_ID'] = $ctable_d['id'];
			}

			$_SESSION['MSG'] = 'Success_Login';
			
			$db->rplocation(SITEURL.'upload-label/');
		}
		else
		{
			$_SESSION['MSG'] = 'Acc_Not_Verified';
			$db->rplocation(SITEURL."login/");
		}
	}
	else
	{
		$_SESSION['MSG'] = 'Invalid_Email_Password';
		$db->rplocation(SITEURL."login/");
	}
}
else
{
	$_SESSION['MSG'] = 'Something_Wrong';
	$db->rplocation(SITEURL."login/");
}
?>
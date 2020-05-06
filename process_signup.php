<?php
include("connect.php");
include("include/notification.class.php");

$name 				= 	$db->clean($_POST['name']);
$email 				= 	$db->clean($_POST['email']);
$password 			= 	$db->clean($_POST['password']);
$reg_ip				= 	$db->rpget_client_ip();
$confirmation_string	= 	$db->generateRandomString(8);
$reg_date 				= date('Y-m-d H:i:s');

if($email!="" && $password!="" && !filter_var($email, FILTER_VALIDATE_EMAIL) === false)
{
	$dup_where = "email = '".$email."'";
	$r = $db->rpdupCheck("user",$dup_where);
	if($r)
	{
		$_SESSION['MSG'] = "Duplicate_User";
		$db->rplocation(SITEURL."signup/");
		exit;
	}
	else
	{
		$rows 	= array(
			"name"					=> $name,
			"email"					=> $email,
			"password"				=> md5($password),
			"confirmation_string"	=> $confirmation_string,
			"reg_ip"				=> $reg_ip,
			"reg_date"				=> $reg_date
		);

		$uid = $db->minsert('user',$rows);

		if($uid!='')
		{
			$subject = SITETITLE."Activate Your Account";
			$nt = new Notification();
			include("mailbody/signup_str.php");
			$toemail = $email;
			$nt->rpsendEmail($toemail,$subject,$body);

			$subject = SITETITLE."Register New User";
			$nt = new Notification();
			include("mailbody/register_user.php");
			$toemail = SITEMAIL;
			$nt->rpsendEmail($toemail,$subject,$body);

			$_SESSION['MSG'] = "Success_Signup";

			?>
			<script>
			location.href = '<?php echo SITEURL."login/"; ?>';
			</script>
			<?php
		}
	}
}
else
{
	$_SESSION['MSG'] = 'FILL_ALL_DATA';
	$db->rplocation(SITEURL."signup/");
}
?>
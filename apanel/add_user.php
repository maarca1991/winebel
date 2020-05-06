<?php
include("connect.php");
include("../include/notification.class.php");

$db->rpcheckAdminLogin();
$ctable 		= "user";
$ctable1 		= "User";
$main_page 		= "User";
$page 			= "add_".$ctable;
$page_title 	= ucwords($_REQUEST['mode'])." ".$ctable1;

$name 	= "";
$email 	= "";
$password = "";

if(isset($_REQUEST['submit']))
{
	$name					= $db->clean($_REQUEST['name']);
	$email	 				= $db->clean($_REQUEST['email']);
	$password				= $db->generateRandomString(6);
	$confirmation_string	= $db->generateRandomString(8);
	$reg_ip					= $db->rpget_client_ip();
	$reg_date 				= date('Y-m-d H:i:s');

	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="edit")
	{
		$rows 	= array(
			"name"		=> $name
		);
		
		$where	= "id=".$_REQUEST['id'];
		$db->rpupdate($ctable,$rows,$where);
		$_SESSION['MSG'] = "Updated";
		$db->rplocation(ADMINURL."manage-user/");
		exit;
	}
	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="add")
	{
		$check_user_r = $db->rpgetData($ctable,"*","email = '".$email."' AND  password = '".md5($password)."' AND isDelete=0");
	
		if(@mysqli_num_rows($check_user_r)>0)
		{
			$_SESSION['MSG'] = "Duplicate";
			$db->rplocation(ADMINURL."manage-user/");
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
				"reg_date"				=> $reg_date,
				"created_by"			=> "admin"
			);
			
			$user_id = $db->minsert($ctable,$rows);
			
			if($user_id > 0)
			{
				$subject = SITETITLE."Activate Your Account";
				$nt = new Notification();
				include("../mailbody/admin_created_account.php");
				$toemail = $email;
				$nt->rpsendEmail($toemail,$subject,$body);
			}

			$_SESSION['MSG'] = "Inserted";
			$db->rplocation(ADMINURL."manage-user/");
			exit;
		}
	}
}

if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="edit")
{
	$where 		= " id='".$_REQUEST['id']."' AND isDelete=0";
	$ctable_r 	= $db->rpgetData($ctable,"*",$where);
	$ctable_d 	= @mysqli_fetch_array($ctable_r);

	$name   	= stripslashes($ctable_d['name']);
	$email		= stripslashes($ctable_d['email']);
}

if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="delete")
{
	$id 	= $_REQUEST['id'];
	$rows 	= array("isDelete" => "1");
	
	$db->rpupdate($ctable,$rows,"id='".$id."'");
	
	$_SESSION['MSG'] = "Deleted";
	$db->rplocation(ADMINURL."manage-user/");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $page_title?> | <?php echo ADMINTITLE; ?></title>
  <?php include('include_css.php'); ?>
  <link href="<?php echo ADMINURL?>assets/crop/css/demo.html5imageupload.css?v1.3" rel="stylesheet">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<header class="main-header">
		<?php include("header.php"); ?>
	</header>
	<?php include("left.php"); ?>
	
	<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $page_title?></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo ADMINURL?>dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active"><?php echo $page_title?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-9">
				<div class="box box-success">
					<div class="box-header with-border">
					</div>
					<form role="form" name="frm" id="frm" action="." method="post" enctype="multipart/form-data">
						<input type="hidden" name="mode" id="mode" value="<?php echo $_REQUEST['mode']; ?>">
						<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
						<div class="box-body">
							<div class="form-group">
								<label for="name"> Name <code>*</code></label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
							</div>
							<div class="form-group">
								<label for="email"> Email <code>*</code></label>
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" <?php if($_REQUEST['mode'] == 'edit'){ echo "disabled"; } ?> >
							</div>
							
							<div class="box-footer">
								<button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
								<button type="button" class="btn btn-inverse waves-effect w-md waves-light" onClick="window.location.href='<?= ADMINURL ?>manage-user/'">Back</button>
							</div>
						</div>
					</form>
				</div>
			</div>
	  </div>
	</section>
  </div>
	<?php include("footer.php"); ?>
	<div class="control-sidebar-bg"></div>
</div>
<?php include('include_js.php'); ?>
<script>
	
	$(function(){
		$("#frm").validate({
			ignore: "",
			rules: {
				name:{required:true},
				email:{email:true,required:true}
			},
			messages: {
				name:{required:"Please enter name."},
				email:{email:"Please enter valid email.",required:"Please enter email."}
			}
		});
	});

</script>
</body>
</html>

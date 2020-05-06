<?php 
include_once('connect.php');
$db->rpcheckNotLogin();
$page = LOGIN;
?>
<html>
<head>
	<title><?php echo LOGIN_TITLE."| ".SITENAME; ?></title>
	<?php include_once('include_css.php') ?>
</head>
<body class="user-page">
<main class="main-wrapper">
	<?php include_once('include_header.php') ?>
	<section>
		<div class="container">
			<div class="row no-gutters user-form">
				<div class="col-md-6 bg-primary-1 p-5 d-none d-md-flex flex-column justify-content-center text-white">
					<h2 class="h2 title"><?php echo WLCOME_TO.SITENAME; ?></h2>
					<p><?php echo LOGIN_DECRIPTION_SECTION; ?></p>
				</div>
				<div class="col-md-6 p-3 p-sm-5 bg-white">
					<div class="card border-0 rounded-0 h-100">
						<div class="card-body">
							<h3 class="h3 text-center mb-5"><strong><?php echo LOGIN; ?></strong></h3>
							<form method="post" name="login-form" id="login-form" action="<?php echo SITEURL; ?>process-login/">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="<?php echo EMAIL; ?>" name="email" id="email">
									<i class="ti-user"></i>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="<?php echo PASSWORD; ?>" name="password" id="password">
									<i class="ti-lock"></i>
									<span class="ti-eye show-password"></span>
									<p class="mb-0 small text-right"><a href="<?php echo SITEURL.'forgot-password/' ?>"><?php echo FORGOT_PASSOWRD; ?></a></p>
								</div>
								<div class="form-group text-center">
									<button type="submit" name="submit" id="submit" class="btn btn-primary-1 btn-lg btn-block rounded-pill px-5"><?php echo LOGIN; ?></button>
								</div>
							</form>
							<p class="mb-0 small text-center"><?php echo NOT_REGISTERD; ?> <a href="<?php echo SITEURL.'signup/' ?>"><?php echo CREATE_ACCOUNT_NOW; ?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- CDN -->
<?php include_once('include_js.php') ?>
<script type="text/javascript">
	$("#login-form").validate({
		ignore : [],
		rules: 
		{
			email:{required : true,email: true},
			password:{required : true}
		},
		messages: {
			email:{required:"<?php echo PLEASE_ENTER_EMAIL; ?>", email : "<?php echo PLEASE_ENTER_VALID_EMAIL; ?>"},
			password:{required:"<?php echo PLEASE_ENTER_PASSWORD; ?>"}
		}, 
		errorPlacement: function (error, element) 
		{
			error.insertAfter(element);
		}
	});
</script>
</body>
</html>
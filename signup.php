<?php 
include_once('connect.php');
$db->rpcheckNotLogin();
$page = SIGN_UP;
?>
<html>
<head>
	<title><?php echo SIGNUP_TITLE."| ".SITENAME; ?></title>
	<?php include_once('include_css.php') ?>
</head>
<body class="user-page">
<main class="main-wrapper">
	<?php include_once('include_header.php') ?>
	<section>
		<div class="container">
			<div class="row no-gutters user-form">
				<div class="col-md-6 bg-primary-1 p-5 d-none d-md-flex flex-column justify-content-center text-white">
					<h2 class="h2 title"><?php echo SIGNUP_TO.SITENAME; ?></h2>
					<p><?php echo SIGNUP_DESCRIPTION_SECTION; ?></p>
				</div>
				<div class="col-md-6 p-3 p-sm-5 bg-white">
					<div class="card border-0 rounded-0 h-100">
						<div class="card-body">
							<h3 class="h3 text-center mb-5"><strong><?php echo SIGN_UP; ?></strong></h3>
							<form name="signup-form" id="signup-form" method="post" enctype="multipart/form-data" action="<?php echo SITEURL.'process-signup' ?>">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="<?php echo USERNAME; ?>" name="name" id="name">
									<i class="ti-user"></i>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="<?php echo EMAIL; ?>" name="email" id="email">
									<i class="ti-email"></i>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="<?php echo PASSWORD; ?>" name="password" id="password">
									<i class="ti-lock"></i>
									<span class="ti-eye show-password"></span>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="<?php echo CONFIRM_PASSWORD; ?>" name="cpassword" id="cpassword">
									<i class="ti-lock"></i>
									<span class="ti-eye show-password"></span>
								</div>
								<div class="form-group text-center">
									<button type="submit" name="signup" id="signup" class="btn btn-primary-1 btn-lg btn-block rounded-pill px-5"><?php echo SIGNUP; ?></button>
								</div>
							</form>
							<p class="mb-0 small text-center"><?php echo ALREADY_HAVE_ACCOUNT; ?> <a href="<?php echo SITEURL.'login/'; ?>"><?php echo LOGIN_NOW; ?></a></p>
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
	$("#signup-form").validate({
		ignore : [],
		rules: 
		{
			name:{required : true},
			email:{required : true,email: true},
			password:{required : true},
			cpassword:{required : true,equalTo: "#password"}
		},
		messages: {
			name:{required:"<?php echo PLEASE_ENTER_USERNAME; ?>"},
			email:{required:"<?php echo PLEASE_ENTER_EMAIL; ?>", email : "<?php echo PLEASE_ENTER_VALID_EMAIL; ?>"},
			password:{required:"<?php echo PLEASE_ENTER_PASSWORD; ?>"},
			cpassword:{required:"<?php echo PLEASE_ENETR_CONFIRM_PASSWORD; ?>",equalTo:"<?php echo PASSWORD_NOT_MATCH; ?>"}
		},
		errorPlacement: function (error, element) 
		{
			error.insertAfter(element);
		}
	});
</script>
</body>
</html>
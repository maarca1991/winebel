<?php 
include_once('connect.php');
$db->rpcheckLogin();
$page = CHANGE_PASSWORD;

?>
<html>
<head>
	<title><?php echo CHANGE_PASSWORD_TITLE."| ".SITENAME; ?></title>
	<?php include_once('include_css.php') ?>
</head>
<body class="dashboard-page bg-primary-1">
<main class="main-wrapper">
	<?php include_once('include_header.php'); ?>
	<section>
		<div class="container">
			<div class="d-flex dashboard">
				<?php include_once('include_sidebar.php'); ?>
				<div class="dashboard-content">
					<div class="row">
						<div class="col-lg-8 p-3 p-md-5">
							<div class="card border-0 rounded-0 h-100">
								<div class="card-body">
									<a href="javascript:;" class="sidebar-toggle d-block d-md-none">
										<i class="ti-more"></i>
									</a>
									<h3 class="h3 mb-5 pb-3 border-bottom">
										<i class="ti-lock"></i>
										<?php echo CHANGE_PASSWORD; ?>
									</h3>
									<form name="change-password-form" id="change-password-form" method="post" enctype="multipart/form-data" action="<?php echo SITEURL.'process-change-password/' ?>">
										<div class="form-group row no-gutters">
											<label for="oldpassword" class="col-sm-4 col-form-label"><?php echo OLD_PASSWORD; ?></label>
											<div class="col-sm-8">
												<input type="password" class="form-control" placeholder="<?php echo OLD_PASSWORD; ?>" name="oldpassword" id="oldpassword" value="">
												<i class="ti-lock"></i>
												<span class="ti-eye show-password"></span>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label for="password" class="col-sm-4 col-form-label"><?php echo NEW_PASSWORD; ?></label>
											<div class="col-sm-8">
												<input type="password" class="form-control" placeholder="<?php echo NEW_PASSWORD; ?>" name="password" id="password" value="">
												<i class="ti-lock"></i>
												<span class="ti-eye show-password"></span>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label for="confirmPassword" class="col-sm-4 col-form-label"><?php echo CONFIRM_PASSWORD; ?></label>
											<div class="col-sm-8">
												<input type="password" class="form-control" placeholder="<?php echo CONFIRM_PASSWORD; ?>" name="cpassword" id="cpassword" value="">
												<i class="ti-lock"></i>
												<span class="ti-eye show-password"></span>
											</div>
										</div>
										<div class="form-group row no-gutters justify-content-end">
											<div class="col-sm-8">
												<button class="btn btn-primary-1 btn-lg btn-block rounded-pill px-5"><?php echo CHANGE_PASSWORD_BUTTON; ?></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-4 right sidebar d-none d-lg-block">
							<h4 class="h4">
								<?php echo CHANGE_PROFILE_SIDEBAR_TITLE; ?>
								
							</h4>
							<p><?php echo CHANGE_PROFILE_SIDEBAR_DESCRIPTION; ?></p>
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
	$("#change-password-form").validate({
		ignore : [],
		rules: 
		{
			oldpassword:{required : true,
				remote: {
					url: "<?php echo SITEURL.'ajax_check_oldpassword.php' ?>",
					type: "post",
					dataType: 'json',
					data: {
						oldpassword: function() {
							return $( "#oldpassword" ).val();
						}
					}
				}
			},
			password:{required : true},
			cpassword:{required : true,equalTo: "#password"}
		},
		messages: {
			oldpassword:{required:"<?php echo PLEASE_ENTER_OLDPASSWORD; ?>",remote:"<?php echo PLEASE_CORRECT_OLDPASSWORD; ?>"},
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
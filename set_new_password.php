<?php 
include_once('connect.php');
$db->rpcheckNotLogin();
$page = RESET_PASSWORD_TITLE;
$id = $db->clean($_REQUEST['id']);
$slug = $db->clean($_REQUEST['slug']);
?>

<html>
<head>
	<title><?php echo RESET_PASSWORD_TITLE.'| '.SITENAME; ?></title>
	<?php include_once('include_css.php') ?>
</head>
<body class="user-page">
<main class="main-wrapper">
	<?php include_once('include_header.php'); ?>
	<section>
		<div class="container">
			<div class="row no-gutters user-form">
				<div class="col-md-6 bg-primary-1 p-5 d-flex flex-column justify-content-center text-white">
					<h2 class="h2 title"><?php echo WLCOME_TO.SITENAME; ?></h2>
					<p><?php echo FORGOT_PASSWORD_DESCRIPTION; ?></p>
				</div>
				<div class="col-md-6 p-5 bg-white">
					<div class="card border-0 rounded-0 h-100">
						<div class="card-body">
							<h3 class="h3 text-center mb-5"><strong><?php echo RESET_PASSWORD; ?></strong></h3>
							<form method="post" name="forgot-password-form1" id="forgot-password-form1" action="<?php echo SITEURL; ?>process-set-new-password/">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<input type="hidden" name="slug" value="<?php echo $slug; ?>">
								<div class="form-group">
									<input type="password" class="form-control" placeholder="<?php echo PASSWORD; ?>" name="password">
									<i class="ti-lock"></i>
									<span class="ti-eye show-password"></span>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary-1 btn-lg btn-block rounded-pill px-5"><?php echo RESET_PASSWORD_BUTTON; ?></button>
								</div>
							</form>
							<p class="mb-0 small text-center"><?php echo GO_BACK_TO; ?> <a href="<?php echo SITEURL; ?>"><?php echo LOGIN_PAGE; ?></a></p>
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
	$("#forgot-password-form1").validate({
		ignore : [],
		rules: 
		{
			password:{required : true}
		},
		messages: {
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
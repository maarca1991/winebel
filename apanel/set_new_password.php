<?php
include("connect.php");

if((isset($_SESSION[SESS_PRE.'_ADMIN_SESS_ID']) && $_SESSION[SESS_PRE.'_ADMIN_SESS_ID']>0)){
	$db->rplocation(ADMINURL."dashboard/");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Set New Password | <?php echo ADMINTITLE; ?></title>
<?php include('include_css.php'); ?>
</head>
<body>
	<section>
		<div class="container-alt">
			<div class="row">
				<div class="col-sm-12">

					<div class="wrapper-page">

						<div class="m-t-40 account-pages">
							<div class="text-center account-logo-box">
								<h2 class="text-uppercase">
									<a href="javascript:void(0);" class="text-success">
										<span><img src="<?php echo SITEURL?>images/logo.png" alt="<?php echo SITENAME; ?>" width="150"></span>
									</a>
								</h2>
							</div>
							<div class="account-content">
								<form class="form-horizontal" name="frm" id="frm" class="form-horizontal" action="<?php echo ADMINURL."process-set-new-password/"; ?>" method="post">
									
									<div class="form-group">
										<input type="password" name="newpass" id="newpass" class="form-control" autocomplete="off" placeholder="Enter New Password" />
									</div>

									<div class="form-group">
										<input type="password" name="cnewpass" id="cnewpass" class="form-control" autocomplete="off" placeholder="Confirm New Password" />
									</div>
									<input type="hidden" name="slug" id="slug" value="<?php echo $_REQUEST['slug']; ?>" />
									<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />
									<div class="form-group account-btn text-center m-t-10">
										<div class="col-xs-12">
											<button name="submit" id="submit" class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Submit</button>
										</div>
									</div>
								</form>
								<div class="clearfix"></div>
							</div>
						</div>

						<div class="row m-t-50">
							<div class="col-sm-12 text-center">
								<p class="text-muted">Already have account?<a href="<?php echo ADMINURL?>" class="text-primary m-l-5"><b>Sign In</b></a></p>
							</div>
						</div>

					</div>
					<!-- end wrapper -->

				</div>
			</div>
		</div>
	  </section>
	  <!-- END HOME -->
	<script>
		var resizefunc = [];
	</script>
	<?php include('include_js.php'); ?>
	<script>
		$(function(){
			$("#frm").validate({
				rules: {
					newpass:{required : true},
					cnewpass:{required : true,equalTo: "#newpass"},
				},
				messages: {
					newpass:{required:"Please enter password."},
					cnewpass:{required:"Please enter confirm password.",equalTo:"Both password does not match."},
				}
			});
		});
		
		$(document).ready(function(){
			setTimeout(function(){
			<?php 
			if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Something_Wrong') { ?>
				 $.notify({message: 'Something Went Wrong, Please Try Again !' },{type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'INVALID_DATA') { ?>
				 $.notify({message: 'Invalid Data. Please enter valid data.' },{type: 'danger'});
			<?php unset($_SESSION['MSG']); }  
			?>
			},1000);
		});
	</script>
</body>
</html>
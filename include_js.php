<script src="<?php echo SITEURL;?>js/jquery-3.4.1.min.js"></script>
<script src="<?php echo SITEURL;?>js/popper.min.js"></script>
<script src="<?php echo SITEURL; ?>js/bootstrap.min.js"></script>
<script src="<?php echo SITEURL;?>js/jquery.validate.js"> </script>
<script src="<?php echo SITEURL;?>js/bootstrap-notify.js"> </script>
<script src="<?php echo SITEURL;?>js/additional-methods.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>

<!-- Custom JS -->
<script src="<?php echo SITEURL; ?>js/script.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
			<?php if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Something_Wrong') { ?>
				$.notify({message: <?php echo SOMETHING_WRONG; ?>},{ type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Invalid_Email_Password') { ?>
				$.notify({ message: '<?php echo INVALID_EMAIL_PASSWORD; ?>'},{type: 'danger'});
			<?php unset($_SESSION['MSG']); }  else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Success') { ?>
				$.notify({ message: '<?php echo FORGOT_PASSOWRD_RESET_LINK_SUCCESSFULLY_SEND; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Success_Logout') { ?>
				$.notify( {message: '<?php echo SUCCESSFULLY_LOGOUT; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Success_Signup') { ?>
				$.notify({message: 'You have successfully registered to <?php echo SITETITLE; ?>. Please check your email inbox and verifiy your account.'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'ACC_CODE_SUCCESS') { ?>
				$.notify( {message: '<?php echo ACCOUNT_VERIFIED_SUCCESS; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'CODE_LINK_EXPIRE') { ?>
				$.notify( {message: '<?php echo LINK_ALREADY_USED; ?>'},{ type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Acc_Not_Verified') { ?>
				$.notify( {message: '<?php echo ACCOUNT_NOT_VERIFIED; ?>'},{ type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Success_Fsent') { ?>
				$.notify( {message: '<?php echo YOUR_FORGOT_PASS_LINK_SEND_SUCCESS; ?>'},{ type: 'success'}); 
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Success_Login') { ?>
				$.notify( {message: '<?php echo SUCCESSFULLY_LOGIN; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Update_Pass') { ?>
					$.notify( {message: '<?php echo PASSWORD_UPDATED_SUCCESS; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Link_Expired') { ?>
				$.notify( {message: '<?php echo EMAIL_VERIFICATION_LINK_EXPIRED; ?>'},{ type: 'danger'}); 
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Already_registered') { ?>
				$.notify( {message: '<?php echo ALREADY_REGISTER_EMAIL; ?>'},{ type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Update_profile_success') { ?>
				$.notify( {message: '<?php echo SUCCESSFULLY_UPDATED_PROFILE; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Change_password_success') { ?>
				$.notify( {message: '<?php echo SUCCESSFULLY_CHANGE_PASSWORD; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Email_not_found') { ?>
				$.notify( {message: '<?php echo EMAIL_NOT_FOUND; ?>'},{ type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'FILL_ALL_DATA') { ?>
				$.notify( {message: '<?php echo FILL_ALL_DATA; ?>'},{ type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'success_upload_label') { ?>
				$.notify( {message: '<?php echo SUCCESSFULLY_UPLOAD_LABEL; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'success_edit_label') { ?>
				$.notify( {message: '<?php echo SUCCESSFULLY_UPDATED_LABEL; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Deleted_label') { ?>
				$.notify( {message: '<?php echo SUCCESSFULLY_DELETED_LABEL; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Duplicate_User') { ?>
				$.notify( {message: '<?php echo DUPLICATE_USER; ?>'},{ type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Add_cart_success') { ?>
				$.notify( {message: '<?php echo SUCCESS_ADD_TO_CART; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Select_label') { ?>
				$.notify( {message: '<?php echo PLEASE_SELECT_LABEL; ?>'},{ type: 'danger'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Success_payment') { ?>
				$.notify( {message: <?php echo PAYMENT_SUCCESS; ?>},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Deleted_label_cart') { ?>
				$.notify( {message: '<?php echo REMOVE_LABEL_FROM_CART; ?>'},{ type: 'success'});
			<?php unset($_SESSION['MSG']); } 
				?>
		},1000);
   	});
</script>
<script type="text/javascript">
	$('#lang').on('change', function() {
	  	lang_id = this.value;
	  	url = "<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>";
	  	$.ajax({
			type: "POST",
			url: "<?php echo SITEURL ?>ajax_change_lang.php",
			data: {lang_id:lang_id,url:url},
			beforeSend: function(){
				$(".loader").show();
			},
			success: function(response){
				location.reload();
			}
		});
	});
</script>
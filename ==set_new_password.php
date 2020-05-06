<?php 
include_once('connect.php'); 
$page = 'Set New Passowrd';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include_once('include_css.php') ?>
   </head>
   <body>
  	<?php include_once('include_header.php') ?>
  	   <section class="login-signup-section">
  	  	<div class="container">
  	  		<div class="row">
  	  			<div class="col-md-6 offset-md-3 text-center">
  	  				<div class="ls-content">
	  	  				<h3><?=$page;?></h3>
	  	  				<form method="post" name="frm" id="frm" action="<?php echo SITEURL; ?>process-set-new-password/">
                  <div class="form-group">
                      <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                  </div>
                  <div class="form-group">
                      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
                      <span id='message'></span>
                  </div>
                  <input type="hidden" name="slug" id="slug" value="<?php echo $_REQUEST['slug']; ?>" />
                  <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />
	  	  					<button type="submit" name="submit" class="btn btn-info mt-3">Submit</button>
	  	  				</form>
	  	  			</div>
  	  			</div>
  	  		</div>
  	  	</div>
  	  </section>
 		
 	
  	  <?php include_once('include_footer.php') ?>
  	  
      <?php include_once('include_js.php') ?>

<script>
      $(function(){
         
      $("#frm").validate({
         rules: {
                password:{required : true},
                confirm_password:{required : true,equalTo: "#password"},
            },
            messages: {
                password:{required:"Please enter password."},
                confirm_password:{required:"Please enter confirm password.",equalTo:"Both password does not match."},
            }
      }); 
   });

   $(document).ready(function(){
      setTimeout(function(){
      <?php if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'INVALID_DATA') { ?>
         $.notify({  type: 'danger'}, {message: 'Your email address is not registered with us.'});
      <?php unset($_SESSION['MSG']); }
      ?>
      },1000);
   });
</script>
      
   </body>
</html>
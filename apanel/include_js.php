<script>
var resizefunc = [];
</script>

<!-- jQuery 3 -->
<script src="<?php echo ADMINURL; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ADMINURL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo ADMINURL; ?>assets/js/bootstrap-notify.js"></script>
<script src="<?php echo ADMINURL; ?>assets/js/bootstrap-datepicker.js"></script>
<!-- FastClick -->
<script src="<?php echo ADMINURL; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ADMINURL; ?>dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo ADMINURL; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo ADMINURL?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ADMINURL?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo ADMINURL; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo ADMINURL; ?>bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo ADMINURL; ?>dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ADMINURL; ?>dist/js/demo.js"></script>
<script src="<?php echo ADMINURL; ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo ADMINURL;?>assets/js/additional-methods.min.js"></script>

<script>
	$(document).ready(function(){
		setTimeout(function(){
		<?php if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Something_Wrong') { ?>
			 $.notify({message: 'Something Went Wrong, Please Try Again !' },{type: 'danger'});
		<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Inserted') { ?>
			 $.notify({message: 'Record Added successfully.' },{type: 'success'});
		<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Updated') { ?>
			 $.notify({message: 'Record Updated successfully.' },{type: 'success'});
		<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Deleted') { ?>
			$.notify({message: 'Record Deleted successfully.'},{type: 'success'});
		<?php unset($_SESSION['MSG']); } else if(isset($_SESSION['MSG']) && $_SESSION['MSG'] == 'Duplicate') { ?>
			$.notify({message: 'This Record is Already Exist. Please Try Another.'},{type: 'danger'});
		<?php unset($_SESSION['MSG']); } 
		?>
		},1000);
	});
</script>
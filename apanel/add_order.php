<?php
include("connect.php");
include("../include/notification.class.php");

$db->rpcheckAdminLogin();
$ctable 		= "cart";
$ctable1 		= "Order";
$main_page 		= "Order";
$page 			= "add_".$ctable;
$page_title 	= ucwords($_REQUEST['mode'])." ".$ctable1;

$order_status 	= "";

if(isset($_REQUEST['submit']))
{
	$order_status	= $db->clean($_REQUEST['order_status']);

	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="edit")
	{
		$rows 	= array(
			"order_status"		=> $order_status
		);
		
		$where	= "id=".$_REQUEST['id'];
		$db->rpupdate($ctable,$rows,$where);
		$_SESSION['MSG'] = "Updated";
		$db->rplocation(ADMINURL."manage-order/");
		exit;
	}
}

if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="edit")
{
	$where 		= " id='".$_REQUEST['id']."' AND isDelete=0";
	$ctable_r 	= $db->rpgetData($ctable,"*",$where);
	$ctable_d 	= @mysqli_fetch_array($ctable_r);

	$order_no			= stripslashes($ctable_d['order_no']);
	$tax				= stripslashes($ctable_d['tax']);
	$sub_total			= stripslashes($ctable_d['sub_total']);
	$grand_total		= stripslashes($ctable_d['grand_total']);
	$order_date			= stripslashes($ctable_d['order_date']);
	$order_status   	= stripslashes($ctable_d['order_status']);
	

	$user_name = $db->rpgetValue("user","name"," id=".$ctable_d['user_id']);
}

if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="delete")
{
	$id 	= $_REQUEST['id'];
	$rows 	= array("isDelete" => "1");
	
	$db->rpupdate($ctable,$rows,"id='".$id."'");
	
	$_SESSION['MSG'] = "Deleted";
	$db->rplocation(ADMINURL."manage-order/");
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
	<div class="loading-div" style="display:none;">
		<div><img style="width:10%" src="<?php echo SITEURL?>images/loader.svg"></div>
	</div>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<div class="row">
							<form id="status_change_form">
								<div class="col-md-7">
									<h3 class="box-title"><i class="fa fa-user"></i> <?php echo $user_name; ?></h3>
								</div>
								<div class="col-md-3">
									<input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="cart_id" id="cart_id">
									<select class="form-control" name="order_status">
										<option <?php if($order_status == 0){ echo "selected"; } ?> value="0">In Progress</option>
										<option <?php if($order_status == 1){ echo "selected"; } ?> value="1">Completed</option>
										<option <?php if($order_status == 2){ echo "selected"; } ?> value="2">Cancel</option>
									</select>
								</div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-success waves-effect w-md waves-light">Update</button>
								</div>
							</form>
						</div>
					</div>
					<table id="user" class="table table-bordered table-striped">
						<tbody>
							<tr>
								<td><b>Order Number</b></td>
								<td><span class="text-muted"> <?php echo $order_no; ?></td>
								<td><b>Sub Total</b></td>
								<td><span class="text-muted"> <?php echo EURO.$sub_total; ?></td>
							</tr>
							<tr>
								<td><b>Order Status</b></td>
								<?php if($order_status==0)
									{
										$order_status='In Progress';
									}
									elseif($order_status==1)
									{
										$order_status='Completed';
									}
									else
									{
										$order_status='Cancel';
									} 
								?>
								<td><span class="text-muted" id="order_status"> <?php echo $order_status; ?></td>
								<td><b>Tax</b></td>
								<td><span class="text-muted"> <?php echo EURO.$tax; ?></td>
							</tr>
							<tr>
								<td><b>Order Date</b></td>
								<td><span class="text-muted"> <?php echo $db->rpDate1($order_date); ?></td>
								<td><b>Grand Total</b></td>
								<td><span class="text-muted"> <?php echo EURO.$grand_total; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-xs-12 table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Label Name</th>
									<th>Quantity</th>
									<th>Period</th>
									<th>Price</th>
								</tr>
							</thead>
							<?php
							$ctable_r1 = $db->rpgetData("cart_detail","*"," cart_id=".$_REQUEST['id']." AND isDelete=0");
							if(@mysqli_num_rows($ctable_r1)>0){
							$count = 0;
							while($ctable_d1 = @mysqli_fetch_array($ctable_r1))
							{
								$count++;
							?>
							<tbody>
								<tr>
									<th scope="row"><?php echo $count;?></th>
									<td>										
										<?php echo $db->rpgetValue("labels","label","labels_id=".$ctable_d1['label_id']); ?><br>
									</td>
									<td>
										<?php echo $ctable_d1['quntity']; ?>
									</td>
									<td>
										<?php echo $ctable_d1['period']; ?>
									</td>
									<td>
										<?php echo EURO.$ctable_d1['total']; ?>
									</td>
								</tr>
							<?php
							}}
							?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer">
					<button type="button" class="btn btn-inverse waves-effect w-md waves-light" onClick="window.location.href='<?= ADMINURL ?>manage-order/'">Back</button>
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
	$("#status_change_form").validate({
		ignore: "",
		rules: {
			cart_id: {
				required: true
			}
		},
		messages: {
			cart_id: {
				required: "Cart id Not Found"
			}
		},
		errorPlacement: function(error, element) {
			error.insertAfter(element);
		},
		submitHandler: function(form) {
			$.ajax({
				url: '<?php echo ADMINURL; ?>cart_status_change.php',
				dataType: 'JSON',
				type: 'post',
				data: $(form).serialize(),
				beforeSend: function(){
				 	$(".loading-div").show();  
			  	},
				success: function(data) {
				   	if(data == true)
					{ 
						$.notify({message: "Successfully change order status." },{type: 'success'}); 
					}
					else
					{ 
						$.notify({message: "Something was wrong." },{type: 'danger'});						
					}
					$(".loading-div").hide();
					location.reload();
				}
			});
		}
	});
	$(function(){
		$("#frm").validate({
			ignore: "",
			rules: {
				order_status:{required:true}
			},
			messages: {
				order_status:{required:"Please select order status."}
			}
		});
	});

</script>
</body>
</html>

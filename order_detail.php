<?php 
include_once('connect.php');

$db->rpcheckLogin();
$page = ORDER_DETAILS;

$where 		= " id='".$_REQUEST['order_id']."' AND isDelete=0";
$ctable_r 	= $db->rpgetData("cart","*",$where);
$ctable_d 	= @mysqli_fetch_array($ctable_r);

$order_no			= stripslashes($ctable_d['order_no']);
$tax				= stripslashes($ctable_d['tax']);
$sub_total			= stripslashes($ctable_d['sub_total']);
$grand_total		= stripslashes($ctable_d['grand_total']);
$order_date			= stripslashes($ctable_d['order_date']);
$order_status   	= stripslashes($ctable_d['order_status']);


$user_name = $db->rpgetValue("user","name"," id=".$ctable_d['user_id']);
?>

<html>
<head>
	<title><?php echo ORDER_DETAILS." | ".SITENAME; ?></title>
	<?php include_once('include_css.php') ?>
</head>

<body class="dashboard-page bg-primary-1">
	<main class="main-wrapper">
		<?php include_once('include_header.php'); ?>
		<section>
			<div class="loader" style="display:none;">
				<div><img src="<?php echo SITEURL?>images/winebel-loader.gif"></div>
			</div>
			<div class="container">
				<div class="d-flex dashboard">
					<?php include_once('include_sidebar.php'); ?>
					<div class="dashboard-content">
						<div class="row">
							<div class="col-lg-12 p-3 p-md-5">
								<div class="card border-0 rounded-0 h-100">
									<div class="card-body">
										<a href="javascript:;" class="sidebar-toggle d-block d-md-none">
											<i class="ti-more"></i>
										</a>
										<h3 class="h3 mb-5 pb-3 border-bottom">
											<i class="ti-view-list-alt"></i><?php echo ORDER_DETAILS; ?>
										</h3>
										<div class="col-xs-12 table-responsive">
											<table id="user" class="table table-bordered">
												<tbody>
													<tr>
														<td><b><?php echo ORDER_NUMBER; ?></b></td>
														<td><span class="text-muted"> <?php if($order_no == "0"){ echo "-"; }else{ echo $order_no; } ?></td>
														<td><b><?php echo SUB_TOTAL; ?></b></td>
														<td><span class="text-muted"><?php echo EURO.$sub_total; ?></td>
													</tr>
													<tr>
														<td><b><?php echo ORDER_STATUS; ?></b></td>
														<?php if($order_status==0)
															{
																$order_status=IN_PROGRESS;
															}
															elseif($order_status==1)
															{
																$order_status=COMPLETED;
															}
															else
															{
																$order_status=CANCEL;
															} 
														?>
														<td><span class="text-muted" id="order_status"> <?php echo $order_status; ?></span></td>
														<td><b>Tax</b></td>
														<td><span class="text-muted"> <?php echo EURO.$tax; ?></span></td>
													</tr>
													<tr>
														<td><b><?php echo ORDER_DATE; ?></b></td>
														<td><span class="text-muted"> <?php if($order_date == NULL ){ echo "-"; }else{ echo $db->rpDate1($order_date); } ?></span></td>
														<td><b><?php echo GRAND_TOTAL; ?></b></td>
														<td><span class="text-muted"> <?php echo EURO.$grand_total; ?></span></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-xs-12 table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th><?php echo NO; ?></th>
														<th><?php echo LABEL_NAME; ?></th>
														<th><?php echo QUANTITY; ?></th>
														<th><?php echo PERIOD; ?></th>
														<th><?php echo PRICE; ?></th>
													</tr>
												</thead>
												<?php
												$ctable_r1 = $db->rpgetData("cart_detail","*"," cart_id=".$_REQUEST['order_id']." AND isDelete=0");
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
												<?php }} ?>
												</tbody>
											</table>
										</div>
									</div>

									<div class="clearfix">
										<a href="<?php echo SITEURL.'order/' ?>" class="btn btn-primary-1 rounded-pill px-5 float-left" type="submit"><?php echo GO_TO_ORDER; ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	
	<!-- CDN -->
	<?php include_once('include_js.php') ?>
</body>
</html>
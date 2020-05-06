<?php 
include_once('connect.php');

$db->rpcheckLogin();
$page = ORDER_HISTORY;

?>

<html>

<head>
	<title><?php echo ORDER_HISTORY." | ".SITENAME; ?></title>
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
											<i class="ti-view-list-alt"></i><?php echo ORDER_HISTORY; ?>
										</h3>
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap">
												<tr>
													<th><?php echo NO; ?></th>
													<th><?php echo ORDER_NO; ?></th>
													<th><?php echo GRAND_TOTAL; ?></th>
													<th><?php echo ORDER_STATUS; ?></th>
													<th><?php echo ORDER_DATE; ?></th>
													<th><?php echo ACTION; ?></th>
												</tr>
												<?php
												$ctable_where .= " isDelete=0 AND user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID'];
												$ctable_r      = $db->rpgetData("cart","*",$ctable_where);
												if(@mysqli_num_rows($ctable_r)>0){
												$count = 0;
												while($ctable_d = @mysqli_fetch_array($ctable_r))
												{
													$count++;
													if($ctable_d['order_status']==0)
													{
														$order_status= IN_PROGRESS;
													}
													elseif($ctable_d['order_status']==1)
													{
														$order_status= COMPLETE;
													}
													else
													{
														$order_status=CANCEL;
													}
												?>
												<tr>
													<td><b><?php echo $count+$page_position; ?></b></td>
													<td><?php if($ctable_d['order_no'] == "0"){ echo "-"; }else{ echo $ctable_d['order_no']; }?></td>
													<td><?php echo "€".$ctable_d['grand_total']; ?></td>
													<td><?php echo $order_status; ?></td>
													<td><?php if($ctable_d['order_date'] == null){echo "-"; }else{ echo $db->rpDate1($ctable_d['order_date']); }?></td>
													<td>
														<a href="<?php echo SITEURL.'order-detail/'.$ctable_d['id']; ?>"><button class="btn px-1"><i class="ti-eye"></i></button></a>
													</td>
												</tr>
												<?php } } ?>
											</table>
										</div>
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
<?php 
include_once('connect.php');
$db->rpcheckLogin();
$page = CALCULATE_PRICE;

$get_cart_r = $db->rpgetData("cart","*"," id=".$_SESSION[SESS_PRE.'_SESS_CART_ID']." AND order_status='0' ");
$get_cart_d = @mysqli_fetch_array($get_cart_r);

$where = " user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND cart_id=".$get_cart_d['id']." AND isDelete=0";
$ctable_r = $db->rpgetData("cart_detail","*",$where);

?>

<html>

<head>
	<title><?php echo CALCULATE_PRICE_TITLE."| ".SITENAME; ?></title>
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
											<span>&euro;</span> <?php echo CALCULATE_PRICE; ?>
										</h3>
										<!-- <form> -->
										<div class="table-responsive">
											<table class="table table-borderless text-center">
												<?php
												if(@mysqli_num_rows($ctable_r)>0)
												{
													while($ctable_d = @mysqli_fetch_array($ctable_r))
													{
														$where1 = " labels_id=".$ctable_d['label_id']; 
														$ctable_r1 = $db->rpgetData("labels","*",$where1);
														$ctable_d1 = @mysqli_fetch_array($ctable_r1);
												?>
												<tr class="border-top">
													<td rowspan="2">
														<img src="<?php echo $ctable_d1['label_file']; ?>" class="label-img">
													</td>
													<th><?php echo LABEL_NAME; ?></th>
													<th width="25%"><?php echo QUANTITY; ?></th>
													<th><?php echo PERIOD; ?></th>
													<th><?php echo TOTAL; ?></th>
													<th><?php echo ACTION; ?></th>
												</tr>
												<tr>
													<td><?php echo $ctable_d1['label']; ?></td>
													<td>
														<div class="form-group mb-0">
															<!-- <input value="<?php echo $ctable_d['quntity']; ?>" type="number" class="form-control px-0 text-center" name="quntity_<?php echo $ctable_d1['labels_id']; ?>" id="<?php echo $ctable_d1['labels_id']; ?>" placeholder="<?php echo ENTER_QUANTITY; ?>" onchange="total(this.value,<?php echo $ctable_d1['labels_id']; ?>)" > -->
															<select id="<?php echo $ctable_d1['labels_id']; ?>" class="form-control form-control-custom" onchange="total(this.value,<?php echo $ctable_d1['labels_id']; ?>)">
																<option <?php if($ctable_d['quntity'] == "5000"){ echo "selected"; } ?> value="5000">Up to 5000</option>
																<option <?php if($ctable_d['quntity'] == "10000"){ echo "selected"; } ?> value="10000">Up to 10000</option>
																<option <?php if($ctable_d['quntity'] == "50000"){ echo "selected"; } ?> value="50000">Up to 50000</option>
																<option <?php if($ctable_d['quntity'] == "100000"){ echo "selected"; } ?> value="100000">Up to 100000</option>
															</select>
														</div>
													</td>
													<td class="text-nowrap">
														<label for="label_<?php echo $ctable_d1['labels_id']; ?>" class="check mr-3">
															<input onclick="changeTotal('month',<?php echo $ctable_d1['labels_id']; ?>)" <?php if($ctable_d['period'] == "month"){ echo "checked"; }else{ echo "";} ?> type="radio" id="label_<?php echo $ctable_d1['labels_id']; ?>" name="label_<?php echo $ctable_d1['labels_id']; ?>">
															<i class="ti-check-box"></i>
															<i class="ti-layout-width-full"></i>
															<?php echo MONTHLY; ?>
														</label>
														<label for="label1_<?php echo $ctable_d1['labels_id']; ?>" class="check">
															<input onclick="changeTotal('year',<?php echo $ctable_d1['labels_id']; ?>)" <?php if($ctable_d['period'] == "year"){ echo "checked"; }else{ echo "";} ?>  type="radio" id="label1_<?php echo $ctable_d1['labels_id']; ?>" name="label_<?php echo $ctable_d1['labels_id']; ?>">
															<i class="ti-check-box"></i>
															<i class="ti-layout-width-full"></i>
															<?php echo YEARLY; ?>
														</label>
													</td>
													<td class="text-right text-nowrap" id="total_"<?php echo $ctable_d1['labels_id']; ?>>
														<span>&euro;</span>
														<?php echo $ctable_d['total']; ?>
													</td>
													<td>
														<a data-toggle="modal" data-target="#confirmModal" onClick="del_label('<?php echo $ctable_d['label_id']; ?>');" title="Delete"><i class="ti-trash"></i></a>
													</td>
												</tr>
												<?php } } else { ?>
												<th>
													<img src="<?php echo SITEURL.'images/Cart-empty.gif' ?>" class="img-fluid">
													<br/><br/>
													<?php echo CART_IS_EMPTY; ?></th>
												<?php  } ?>
											</table>
										</div>
										<!-- </form> -->
										<hr>
										<?php
										$ctable_r1 = $db->rpgetData("cart","*"," user_id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND id=".$_SESSION[SESS_PRE.'_SESS_CART_ID']." AND isDelete=0 AND order_status = '0' ");
										$ctable_d1 = @mysqli_fetch_array($ctable_r1);
										?>
										<div class="row justify-content-end">
											<div class="col-md-6">
												<table class="table table-borderless text-right">
													<tr>
														<th><?php echo SUB_TOTAL; ?></th>
														<td class="text-nowrap">
															<?php if($ctable_d1['sub_total'] == ""){ echo 0; }else{ echo EURO." ".$ctable_d1['sub_total']; } ?>
														</td>
													</tr>
													<tr>
														<th><?php echo TAXES; ?></th>
														<td class="text-nowrap">
															<?php if($ctable_d1['tax'] == ""){ echo 0; } else { echo EURO." ".$ctable_d1['tax']; } ?>
														</td>
													</tr>
													<tr>
														<th><?php echo GRAND_TOTAL; ?></th>
														<td class="text-nowrap">
															<?php if($ctable_d1['grand_total'] == ""){ echo 0; } else { echo EURO." ".$ctable_d1['grand_total']; } ?>
														</td>
													</tr>
												</table>
											</div>
										</div>

										<div class="clearfix text-center text-sm-left">
											<div class="d-block d-sm-inline float-none float-sm-left">
													<a href="<?php echo SITEURL.'label/' ?>" class="btn btn-primary-1 rounded-pill px-5" type="submit"><?php echo GO_BACK_TO_LABEL; ?></a>
											</div>
											<div class="d-block d-sm-inline float-none float-sm-right mt-3 mt-sm-0">
												<button onclick="paypal_payment()" class="btn btn-primary-1 rounded-pill px-5" type="submit"><?php echo PAY_NOW; ?></button>
											</div>
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
	<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="loader" id="loader1" style="display:none;">
						<div><img src="<?php echo SITEURL?>images/winebel-loader.gif"></div>
					</div>
					<p><?php echo DELETE_LABEL_HEADER_TEXT; ?></p>
					<form method="post" name="delete-label-form" id="delete-label-form" action="<?php echo SITEURL; ?>process-delete-label-cart/">
						<input type="hidden" name="delete_labels_id" id="delete_labels_id" value="">
						<button type="submit" class="btn btn-sm btn-primary-1 rounded-pill px-3"><?php echo REMOVE_BUTTON_TEXT; ?></button>
						<button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-dismiss="modal"><?php echo CANCEL_BUTTON_TEXT; ?></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="paypal_frm_submit"></div>

	<!-- CDN -->
	<?php include_once('include_js.php') ?>
	<script type="text/javascript">
		function paypal_payment()
		{
			$.ajax({
				url     :"<?php echo SITEURL; ?>paypal_checkout.php",
				type    :"post",
				dataType:'json',
				beforeSend: function(){
					$(".loader").show();
				},
				success: function(res){
					console.log(res);
					$("#paypal_frm_submit").html(res);
					document.frmPayPal.submit();
					
					// setTimeout(function(){ 
					// }, 3000);
				}
			});
		}
		$("#delete-label-form").validate({
			submitHandler:function(form){
				$("#loader1").show();
				form.submit();
				return true;
			}
		});
		function del_label(id)
		{
			$("#delete_labels_id").val(id);
		}
		function changeTotal(period,id)
		{
			id = parseInt(id);
			var quntity = $("#"+id).val();

			$.ajax({
				type: "POST",
				url: "<?php echo SITEURL ?>ajax_change_cart.php",
				data: {id:id,quntity:quntity,period:period},
				dataType: "json",
				beforeSend: function(){
					$(".loader").show();
				},
				success: function(response){
					location.reload();
					$(".loader").hide();
				}
			});
		}
		function total(quntity,id)
		{
			quntity = parseInt(quntity);
			id 		= parseInt(id);
			
			if($("#label_"+id).prop("checked")) {
				period = "month"; 
			}

			if($("#label1_"+id).prop("checked")) {
				period = "year";
			}

			$.ajax({
				type: "POST",
				url: "<?php echo SITEURL ?>ajax_change_cart.php",
				data: {id:id,quntity:quntity,period:period},
				dataType: "json",
				beforeSend: function(){
					$(".loader").show();
				},
				success: function(response){
					if(response == "change quntity")
					{
						location.reload();
					}
					else
					{
						location.reload();
						$(".loader").hide();
					}
				}
			});
		}
	</script>
</body>
</html>
<?php 
include_once('connect.php');

$db->rpcheckLogin();
$page = MY_LABEL;

$where = " winery=".$_SESSION[SESS_PRE.'_SESS_USER_ID']." AND isDelete=0";
$ctable_r = $db->rpgetData("labels","*",$where);

?>

<html>

<head>
	<title><?php echo MY_LABEL_TITLE."| ".SITENAME; ?></title>
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
											<i class="ti-layout-width-default"></i><?php echo MY_LABELS; ?>
										</h3>
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap">
												<tr>
													<?php 
													if($db->checkApprovedLabels())
													{
													?>	
													<th></th>
													<?php } ?>
													<th><?php echo TH_LABEL; ?></th>
													<th><?php echo LABEL_NAME; ?></th>
													<th><?php echo VIDEO_1; ?></th>
													<th><?php echo VIDEO_2; ?></th>
													<th><?php echo VIDEO_3; ?></th>
													<th><?php echo VIDEO_4; ?></th>
													<th><?php echo STATUS; ?></th>
													<th><?php echo ACTION; ?></th>
												</tr>
												<?php if(@mysqli_num_rows($ctable_r)>0){
												while($ctable_d = @mysqli_fetch_array($ctable_r)){ ?>
												<tr>
													<?php 
													if($db->checkApprovedLabels1($ctable_d['labels_id']))
													{
													?>	
													<td rowspan="2">
														<?php if($ctable_d['status'] == 1){ ?>
														<label for="label_<?php echo $ctable_d['labels_id']; ?>" class="check">
															<input <?php if($ctable_d['status'] == NULL || $ctable_d['status'] == 0){ echo "disabled"; } ?> onclick="addLabel(<?php echo $ctable_d['labels_id']; ?>)" type="checkbox" id="label_<?php echo $ctable_d['labels_id']; ?>" name="label_<?php echo $ctable_d['labels_id']; ?>">
															<i class="ti-check-box"></i>
															<i class="ti-layout-width-full"></i>
														</label>
														<?php } ?>
													</td>
													<?php }else{ 
														if($db->checkApprovedLabels())
														{ ?>
														<td rowspan="2"></td>
													<?php } } ?>
													<td rowspan="2">
														<img src="<?php echo $ctable_d['label_file']; ?>" class="img-fluid" height="50px" width="100px">
													</td>
													<td rowspan="2"><?php echo $ctable_d['label']; ?></td>
													<td>
														<?php if($ctable_d['b1'] == NULL){ echo "-"; }else{ echo $ctable_d['b1']; }?>
													</td>
													<td>
														<?php if($ctable_d['b2'] == NULL){ echo "-"; }else{ echo $ctable_d['b2']; }?>
													</td>
													<td>
														<?php if($ctable_d['b3'] == NULL){ echo "-"; }else{ echo $ctable_d['b3']; }?>
													</td>
													<td>
														<?php if($ctable_d['b4'] == NULL){ echo "-"; }else{ echo $ctable_d['b4']; }?>
													</td>
													<td rowspan="2">
														<?php if($ctable_d['status'] == '0'){ echo PENDING; }elseif($ctable_d['status'] == '1'){ echo SUITABLE_FOR_PAYMENT; }elseif($ctable_d['status'] == '2'){ echo REJECT; }else{ echo PUBLISH; } ?>
													</td>
													<td rowspan="2" class="text-center">
														<button onclick="editLabel('<?php echo $ctable_d['labels_id']; ?>')" class="btn px-1" data-toggle="modal" data-target="#editModal"><i class="ti-pencil-alt"></i></button>
														<button onclick="deleteLabel('<?php echo $ctable_d['labels_id']; ?>')" class="btn px-1" data-toggle="modal" data-target="#confirmModal"><i class="ti-trash"></i></button>
													</td>
												</tr>
												<tr>
													<td>
														<?php if($ctable_d['video_file_1'] != NULL){ ?>
														<a onclick="playVideo('<?php echo $ctable_d['video_file_1']; ?>')" href="javascript:void(0);" data-toggle="modal" data-target="#videoModal" class="video-link">
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video"><?php echo VIEW; ?></span>
														</a>
														<?php }else{
														?>
															<span title="NULL">-</span>
														<?php
														} ?>
													</td>
													<td>
														<?php if($ctable_d['video_file_2'] != NULL){ ?>
														<a onclick="playVideo('<?php echo $ctable_d['video_file_2']; ?>')" href="javascript:void(0);" data-toggle="modal" data-target="#videoModal" class="video-link">
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video"><?php echo VIEW; ?></span>
														</a>
														<?php }else{
														?>
															<span title="NULL">-</span>
														<?php
														} ?>
													</td>
													<td>
														<?php if($ctable_d['video_file_3'] != NULL){ ?>
														<a onclick="playVideo('<?php echo $ctable_d['video_file_3']; ?>')" href="javascript:void(0);" data-toggle="modal" data-target="#videoModal" class="video-link">
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video"><?php echo VIEW; ?></span>
														</a>	
														<?php }else{
														?>
															<span title="NULL">-</span>
														<?php
														} ?>
													</td>
													<td>
														<?php if($ctable_d['video_file_4'] != NULL){ ?>
														<a onclick="playVideo('<?php echo $ctable_d['video_file_4']; ?>')" href="javascript:void(0);" data-toggle="modal" data-target="#videoModal" class="video-link">
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video"><?php echo VIEW; ?></span>
														</a>
														<?php }else{
														?>
															<span title="NULL">-</span>
														<?php
														} ?>
													</td>
												</tr>
												<?php }} ?>
											</table>
										</div>
										<?php 
										if($db->checkApprovedLabels())
										{
										?>	
										<form method="post" name="cart-form" id="cart-form" action="<?php echo SITEURL; ?>process-addcart/">
											<input type="hidden" name="cart_array[]" id="cart_array" value="" >
											<div class="clearfix text-center text-sm-left">
												<div class="d-block d-sm-inline float-none float-sm-right mt-3">
													<button type="submit" class="btn btn-primary-1 rounded-pill px-5" type="submit"><?php echo ADD_TO_CART; ?></button>
												</div>
											</div>
										</form>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-body text-center" id="video"></div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-body text-center">
									<p><?php echo DELETE_LABEL_HEADER_TEXT; ?></p>
									<form method="post" name="delete-label-form" id="delete-label-form" action="<?php echo SITEURL; ?>process-delete-label/">
										<input type="hidden" name="delete_labels_id" id="delete_labels_id" value="">
										<button type="submit" class="btn btn-sm btn-primary-1 rounded-pill px-3"><?php echo REMOVE_BUTTON_TEXT; ?></button>
										<button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-dismiss="modal"><?php echo CANCEL_BUTTON_TEXT; ?></button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="loader" style="display:none;">
										<div><img src="<?php echo SITEURL?>images/winebel-loader.gif"></div>
									</div>
									<h4 class="h4"><?php echo EDIT_LABEL_HEADER; ?></h4>
									<form method="post" name="edit_label_form" id="edit_label_form" action="<?php echo SITEURL; ?>process-edit-label/" enctype="multipart/form-data">
										<input type="hidden" name="labels_id" id="labels_id" value="">
										<div class="form-group row no-gutters">
											<label class="col-sm-4 col-form-label"><?php echo LABEL; ?></label>
											<div class="col-sm-8">
												<input type="file" hidden id="label_file" name="label_file" accept="image/x-png,image/gif,image/jpeg">
												<input type="hidden" name="old_label_file" value="" id="old_label_file">
												<div class="type-file">
													<?php echo NO_FILE_CHOOSEN; ?>
												</div>
												<div id="label_file_error"></div>
												<i class="ti-image"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label for="label" class="col-sm-4 col-form-label"><?php echo LABEL_NAME; ?></label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="<?php echo LABEL_NAME; ?>" name="label" id="label" value="etc001">
												<i class="ti-text"></i>
											</div>
										</div>
										
										<div class="form-group row no-gutters">
											<label for="b1" class="col-sm-4 col-form-label"><?php echo BUTTON_1; ?></label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="<?php echo BUTTON_1; ?>" name="b1" id="b1" value="">
												<i class="ti-hand-point-up"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label class="col-sm-4 col-form-label"><?php echo VIDEO_1; ?></label>
											<div class="col-sm-8">
												<input type="file" hidden value="" name="video_file_1" id="video_file_1" accept="video/mp4,video/x-m4v,video/*">
												<input type="hidden" name="old_video_file_1" id="old_video_file_1" value="">
												<div class="type-file">
													<?php echo NO_FILE_CHOOSEN; ?>
												</div>
												<div id="video_file_1_error"></div>
												<i class="ti-video-camera"></i>
											</div>
										</div>
										
										<div class="form-group row no-gutters">
											<label for="b2" class="col-sm-4 col-form-label"><?php echo BUTTON_2; ?></label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="<?php echo BUTTON_2; ?>" name="b2" id="b2" value="">
												<i class="ti-hand-point-up"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label class="col-sm-4 col-form-label"><?php echo VIDEO_2 ?></label>
											<div class="col-sm-8">
												<input type="file" hidden value="" id="video_file_2" name="video_file_2" accept="video/mp4,video/x-m4v,video/*">
												<input type="hidden" name="old_video_file_2" value="" id="old_video_file_2">
												<div class="type-file">
													<?php echo NO_FILE_CHOOSEN; ?>
												</div>
												<div id="video_file_2_error"></div>		
												<i class="ti-video-camera"></i>
											</div>
										</div>
										
										<div class="form-group row no-gutters">
											<label for="b3" class="col-sm-4 col-form-label"><?php echo BUTTON_3 ?></label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="<?php echo BUTTON_3 ?>" name="b3" id="b3" value="">
												<i class="ti-hand-point-up"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label class="col-sm-4 col-form-label"><?php echo VIDEO_3 ?></label>
											<div class="col-sm-8">
												<input type="file" hidden value="" id="video_file_3" name="video_file_3" accept="video/mp4,video/x-m4v,video/*">
												<input type="hidden" name="old_video_file_3" value="" id="old_video_file_3">
												<div class="type-file">
													<?php echo NO_FILE_CHOOSEN; ?>
												</div>
												<div id="video_file_3_error"></div>
												<i class="ti-video-camera"></i>
											</div>
										</div>
										
										<div class="form-group row no-gutters">
											<label for="b4" class="col-sm-4 col-form-label"><?php echo BUTTON_4 ?></label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="<?php echo BUTTON_4 ?>" name="b4" id="b4" value="">
												<i class="ti-hand-point-up"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label class="col-sm-4 col-form-label"><?php echo VIDEO_4; ?></label>
											<div class="col-sm-8">
												<input type="file" hidden value="" id="video_file_4" name="video_file_4" accept="video/mp4,video/x-m4v,video/*">
												<input type="hidden" name="old_video_file_4" value="" id="old_video_file_4">
												<div class="type-file">
													<?php echo NO_FILE_CHOOSEN; ?>
												</div>
												<div id="video_file_4_error"></div>
												<i class="ti-video-camera"></i>
											</div>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-sm btn-primary-1 rounded-pill px-3"><?php echo SAVE; ?></button>
											<button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-dismiss="modal"><?php echo CANCEL_BUTTON_TEXT; ?></button>
										</div>
									</form>
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
	<script type="text/javascript">
		var a = [];
		function addLabel(id)
		{
			if(jQuery.inArray(id,a) == -1 )
			{
				a.push(id);
				$("#cart_array").val(a);			
			}
			else
			{
				a = $.grep(a, function(value) {
				  	return value != id;
				});
				$("#cart_array").val(a);
			}
		}
		function deleteLabel(id)
		{
			$("#delete_labels_id").val(id);
		}
		function playVideo(link)
		{
			var a = "<video width='100%' controls><source id='source' src='"+link+"' type='video/mp4'></video>";
			$("#video").html("");
			$("#video").html(a);
		}
		$('#videoModal').on('hidden.bs.modal', function () {
			$("#video").html("");
		});

		function editLabel(id)
		{
			$.ajax({
				type: "POST",
				url: "<?php echo SITEURL ?>ajax_get_label_data.php",
				data: {id:id},
				dataType: "json",
				success: function(response){
					$("#labels_id").val(response['labels_id']);
					$("#label").val(response['label']);
					$("#b1").val(response['b1']);
					$("#b2").val(response['b2']);
					$("#b3").val(response['b3']);
					$("#b4").val(response['b4']);
					
					$("#old_label_file").val(response['label_file']);
					$("#old_video_file_1").val(response['video_file_1']);
					$("#old_video_file_2").val(response['video_file_2']);
					$("#old_video_file_3").val(response['video_file_3']);
					$("#old_video_file_4").val(response['video_file_4']);
				}
			});
		}

		$("#cart-form").validate({
			ignore : [],
			rules :
			{
				"cart_array[]":{required:true}
			},
			messages:{
				"cart_array[]":{required:"Please select labels."}
			}
		});

		$("#edit_label_form").validate({
			ignore : [],
			rules: 
			{
				labels_id:{required : true},
				label:{required : true},
				label_file:{
					required: function(element)
					{
						if($("#old_label_file").val() != "")
						{
							return false;
						}
						else
						{
							return true;
						}
					}
				},
				b1:{
					required: function(element)
					{
						if($("#old_video_file_1").val() != "")
						{
							return false;
						}
						else
						{
							if($("#video_file_1").val() == "" && $("#old_video_file_2") == "" && $("#old_video_file_3") == "" && $("#old_video_file_4") == "" )
							{
								return true;
							}
							else
							{
								return false;
							}
						}
					}
				},
				video_file_1:{
					required: function(element)
					{
						if($("#old_video_file_1").val() == "" && $("#old_video_file_2").val() == "" && $("#old_video_file_3").val() == "" && $("#old_video_file_4").val() == "" && $("#b2").val() == "" && $("#b3").val() == "" && $("#b4").val() == "" )
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				},
				b2:{
					required: function(element)
					{
						if($("#old_video_file_2").val() != "")
						{
							if($("#video_file_2").val() == "")
							{
								return true;
							}
							else
							{
								return false;
							}
						}
						else
						{
							if($("#video_file_2").val() == "")
							{
								return false;
							}
							else
							{
								return true;
							}
						}
					}
				},
				video_file_2:{
					required: function(element)
					{
						{
							if($("#b2").val() != "")
							{
								if($("#old_video_file_2").val() == "" )
								{
									return true;
								}
								else
								{
									return false;								
								}
							}
							else
							{
								return false;
							}
						}
					}
				},
				b3:{
					required: function(element)
					{
						if($("#old_video_file_3").val() != "")
						{
							if($("#video_file_3").val() == "")
							{
								return true;
							}
							else
							{
								return false;
							}
						}
						else
						{
							if($("#video_file_3").val() == "")
							{
								return false;
							}
							else
							{
								return true;
							}
						}
					}
				},
				video_file_3:{
					required: function(element)
					{
						{
							if($("#b3").val() != "")
							{
								if($("#old_video_file_3").val() == "" )
								{
									return true;
								}
								else
								{
									return false;								
								}
							}
							else
							{
								return false;
							}
						}
					}
				},
				b4:{
					required: function(element)
					{
						if($("#old_video_file_4").val() != "")
						{
							if($("#video_file_4").val() == "")
							{
								return true;
							}
							else
							{
								return false;
							}
						}
						else
						{
							if($("#video_file_4").val() == "")
							{
								return false;
							}
							else
							{
								return true;
							}
						}
					}
				},
				video_file_4:{
					required: function(element)
					{
						if($("#b4").val() != "")
						{
							if($("#old_video_file_4").val() == "" )
							{
								return true;
							}
							else
							{
								return false;								
							}
						}
						else
						{
							return false;
						}
					}
				},
			},
			messages: {
				label:{required:"<?php echo PLEASE_ENTER_LABEL_NAME; ?>"},
				label_file:{required:"<?php echo PLEASE_ENTER_LABEL_FILE; ?>"},
				b1:{required:"<?php echo PLEASE_ENTER_BUTTON1; ?>"},
				video_file_1:{required:"<?php echo PLEASE_ENTER_VIDEO1; ?>"},
				b2:{required:"<?php echo PLEASE_ENTER_BUTTON2; ?>"},
				video_file_2:{required:"<?php echo PLEASE_ENTER_VIDEO2; ?>"},
				b3:{required:"<?php echo PLEASE_ENTER_BUTTON3; ?>"},
				video_file_3:{required:"<?php echo PLEASE_ENTER_VIDEO3; ?>"},
				b4:{required:"<?php echo PLEASE_ENTER_BUTTON4; ?>"},
				video_file_4:{required:"<?php echo PLEASE_ENTER_VIDEO4; ?>"},
			}, 
			errorPlacement: function (error, element) 
			{
				if (element.attr("name") == "label_file"){
					error.insertAfter("#label_file_error");
				}
				else if (element.attr("name") == "video_file_1") {
					error.insertAfter("#video_file_1_error");
				}
				else if (element.attr("name") == "video_file_2") {
					error.insertAfter("#video_file_2_error");
				}
				else if (element.attr("name") == "video_file_3") {
					error.insertAfter("#video_file_3_error");
				}
				else if (element.attr("name") == "video_file_4") {
					error.insertAfter("#video_file_4_error");
				}
				else{
					error.insertAfter(element);
				}
			},
			submitHandler:function(form){
				$(".loader").show();
				form.submit();
				return true;
			}
		});
	</script>
</body>
</html>
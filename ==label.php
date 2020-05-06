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
													<th><?php echo TH_LABEL; ?></th>
													<th><?php echo LABEL_NAME; ?></th>
													<th><?php echo VIDEO_1; ?></th>
													<th><?php echo VIDEO_2; ?></th>
													<th><?php echo VIDEO_3; ?></th>
													<th><?php echo VIDEO_4; ?></th>
													<!-- <th><?php echo VIDEO_5; ?></th>
													<th><?php echo VIDEO_6; ?></th> -->
													<th><?php echo STATUS; ?></th>
													<th><?php echo ACTION; ?></th>
												</tr>
												<?php if(@mysqli_num_rows($ctable_r)>0){
												while($ctable_d = @mysqli_fetch_array($ctable_r)){ ?>
												<tr>
													<td rowspan="2">
														<img src="<?php echo $ctable_d['label_file']; ?>" class="img-fluid">
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
													<!-- <td>
														<?php if($ctable_d['b5'] == NULL){ echo "-"; }else{ echo $ctable_d['b5']; }?>
													</td>
													<td>
														<?php if($ctable_d['b6'] == NULL){ echo "-"; }else{ echo $ctable_d['b6']; }?>
													</td> -->
													<td rowspan="2"><?php if($ctable_d['isApproved'] == NULL){  echo  "Pending"; } else if( $ctable_d['isApproved'] == 1 ) { echo "Review";} else {echo "Reject"; }
													 ?></td>
													<td rowspan="2" class="text-center">
														<button onclick="editLabel('<?php echo $ctable_d['labels_id']; ?>')" class="btn px-1" data-toggle="modal" data-target="#editModal"><i class="ti-pencil-alt"></i></button>
														<button onclick="deleteLabel('<?php echo $ctable_d['labels_id']; ?>')" class="btn px-1" data-toggle="modal" data-target="#confirmModal"><i class="ti-trash"></i></button>
													</td>
												</tr>
												<tr>
													<td>
														<?php if($ctable_d['video_file_1'] != NULL){ ?>
														<a onclick="playVideo('<?php echo $ctable_d['video_file_1']; ?>')" href="javascript:void(0);" data-toggle="modal" data-target="#videoModal" class="video-link">
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video">View</span>
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
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video">View</span>
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
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video">View</span>
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
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video">View</span>
														</a>
														<?php }else{
														?>
															<span title="NULL">-</span>
														<?php
														} ?>
													</td>
													<!-- <td>
														<?php if($ctable_d['video_file_5'] != NULL){ ?>
														<a onclick="playVideo('<?php echo $ctable_d['video_file_5']; ?>')" href="javascript:void(0);" data-toggle="modal" data-target="#videoModal" class="video-link">
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video">View</span>
														</a>
														<?php }else{
														?>
															<span title="NULL">-</span>
														<?php
														} ?>
													</td>
													<td>
														<?php if($ctable_d['video_file_6'] != NULL){ ?>
														<a onclick="playVideo('<?php echo $ctable_d['video_file_6']; ?>')" href="javascript:void(0);" data-toggle="modal" data-target="#videoModal" class="video-link">
															<span data-toggle="tooltip" data-placement="bottom" title="Watch Video">View</span>
														</a>
														<?php }else{
														?>
															<span title="NULL">-</span>
														<?php
														} ?>
													</td> -->
												</tr>
												<?php }} ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-body text-center" id="video">
									<!-- <video width="100%" controls>
										<source id="source" src="" type="video/mp4">
									</video> -->
								</div>
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
									<h4 class="h4"><?php echo EDIT_LABEL_HEADER; ?></h4>
									<form method="post" name="edit-label-form" id="edit-label-form" action="<?php echo SITEURL; ?>process-edit-label/" enctype="multipart/form-data">
										<input type="hidden" name="labels_id" id="labels_id" value="">
										<div class="form-group row no-gutters">
											<label class="col-sm-4 col-form-label"><?php echo LABEL; ?></label>
											<div class="col-sm-8">
												<input type="file" hidden id="label_file" name="label_file" accept="image/x-png,image/gif,image/jpeg">
												<input type="hidden" name="old_label_file" value="" id="old_label_file">
												<div class="type-file">
													<?php echo NO_FILE_CHOOSEN; ?>
												</div>
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
												<i class="ti-video-camera"></i>
											</div>
										</div>
										
										<!-- <div class="form-group row no-gutters">
											<label for="b5" class="col-sm-4 col-form-label"><?php echo BUTTON_5 ?></label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="<?php echo BUTTON_5 ?>" name="b5" id="b5" value="">
												<i class="ti-hand-point-up"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label class="col-sm-4 col-form-label"><?php echo VIDEO_5; ?></label>
											<div class="col-sm-8">
												<input type="file" hidden value="" id="video_file_5" name="video_file_5" accept="video/mp4,video/x-m4v,video/*">
												<input type="hidden" name="old_video_file_5" value="" id="old_video_file_5">
												<div class="type-file">
													<?php echo NO_FILE_CHOOSEN; ?>
												</div>
												<i class="ti-video-camera"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label for="b6" class="col-sm-4 col-form-label"><?php echo BUTTON_6 ?></label>
											<div class="col-sm-8">
												<input type="text" class="form-control" placeholder="<?php echo BUTTON_6 ?>" name="b6" id="b6" value="">
												<i class="ti-hand-point-up"></i>
											</div>
										</div>
										<div class="form-group row no-gutters">
											<label class="col-sm-4 col-form-label"><?php echo VIDEO_6; ?></label>
											<div class="col-sm-8">
												<input type="file" hidden value="" id="video_file_6" name="video_file_6" accept="video/mp4,video/x-m4v,video/*" value="">
												<input type="hidden" name="old_video_file_6" value="" id="old_video_file_6">
												<div class="type-file">
													<?php echo NO_FILE_CHOOSEN; ?>
												</div>
												<i class="ti-video-camera"></i>
											</div>
										</div> -->
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

		if($("#videoModal").css("display") == 'none')
		{
			$("#video").html("");
		}
		function editLabel(id)
		{
			$.ajax({
				type: "POST",
				url: "<?php echo SITEURL ?>ajax_get_label_data.php",
				data: {id:id},
				dataType: "json",
				success: function(response){
					// alert(response['label']);
					$("#labels_id").val(response['labels_id']);
					$("#label").val(response['label']);
					$("#b1").val(response['b1']);
					$("#b2").val(response['b2']);
					$("#b3").val(response['b3']);
					$("#b4").val(response['b4']);
					// $("#b5").val(response['b5']);
					// $("#b6").val(response['b6']);
					
					$("#old_label_file").val(response['label_file']);
					$("#old_video_file_1").val(response['video_file_1']);
					$("#old_video_file_2").val(response['video_file_2']);
					$("#old_video_file_3").val(response['video_file_3']);
					$("#old_video_file_4").val(response['video_file_4']);
					// $("#old_video_file_5").val(response['video_file_5']);
					// $("#old_video_file_6").val(response['video_file_6']);
				}
			});
		}

		$("#edit-label-form").validate({
			ignore : [],
			rules: 
			{
				labels_id:{required : true},
				label:{required : true},
				label_file:{required:true},
				b1:{
					required: function(element)
					{
						if($("#video_file_1").val() != "")
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				},
				video_file_1:{
					required: function(element)
					{
						if($("#video_file_1").val() == "" && $("#video_file_2").val() == "" && $("#video_file_3").val() == "" && $("#video_file_4").val() == "" && $("#b2").val() == "" && $("#b3").val() == "" && $("#b4").val() == "" )
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
						if($("#video_file_2").val() != "")
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				},
				video_file_2:{
					required: function(element)
					{
						if($("#b2").val() != "")
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				},
				b3:{
					required: function(element)
					{
						if($("#video_file_3").val() != "")
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				},
				video_file_3:{
					required: function(element)
					{
						if($("#b3").val() != "")
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				},
				b4:{
					required: function(element)
					{
						if($("#video_file_4").val() != "")
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				},
				video_file_4:{
					required: function(element)
					{
						if($("#b4").val() != "")
						{
							return true;
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
			}
		});
	</script>
</body>
</html>
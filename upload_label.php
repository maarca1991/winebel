<?php 
include_once('connect.php');
//print_r($_SESSION);
//exit;

$db->rpcheckLogin();

$page = UPLOAD_LABEL_TITLE;

?>
<html>
<head>
	<title><?php echo UPLOAD_LABEL_TITLE.'| '.SITENAME ?></title>
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
						<div class="col-lg-8 p-3 p-md-5">
							<div class="card border-0 rounded-0 h-100">
								<div class="card-body">
									<a href="javascript:;" class="sidebar-toggle d-block d-md-none">
										<i class="ti-more"></i>
									</a>
									<h3 class="h3 mb-5 pb-3 border-bottom">
										<i class="ti-plus"></i>
										<?php echo UPLOAD_LABEL; ?>
									</h3>
									<div class="row">
										<div class="col-md-4 text-center text-center">
											<img src="<?php echo SITEURL ?>images/measures.webp" class="img-fluid sticky-top mb-5 mb-md-0">
										</div>
										<div class="col-md-8">
											<form method="post" name="label-form" id="label-form" action="<?php echo SITEURL; ?>process-upload-label/" enctype="multipart/form-data">
												<div class="loader" style="display:none;">
													<div><img src="<?php echo SITEURL?>images/winebel-loader.gif"></div>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" placeholder="<?php echo LABEL_NAME; ?>"
														name="label" id="label" value="">
													<i class="ti-text"></i>
												</div>
												<div class="form-group">
													<input type="file" hidden id="label_file" name="label_file" accept="image/x-png,image/gif,image/jpeg">
													<div class="type-file">
														<?php echo NO_FILE_CHOOSEN; ?>
													</div>
													<div id="label_file_error"></div>
													<i class="ti-image"></i>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" placeholder="<?php echo UPPER_CIRC_C1; ?>"
														name="upcirc" id="upcirc" value="">
													<i class="ti-arrow-up"></i>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" placeholder="<?php echo LOWER_CIRC_C2; ?>"
														name="downcirc" id="downcirc" value="">
													<i class="ti-arrow-down"></i>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" placeholder="<?php echo HEIGHT_H; ?>" name="height"
														id="height" value="">
													<i class="ti-arrows-vertical"></i>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" placeholder="<?php echo WIDTH_W; ?>" name="weight"
														id="weight" value="">
													<i class="ti-arrows-horizontal"></i>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="<?php echo BUTTON_1; ?>" name="b1" id="b1">
															<i class="ti-hand-point-up"></i>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="file" hidden name="video_file_1" id="video_file_1" accept="video/mp4,video/x-m4v,video/*">
															<div class="type-file">
																<?php echo VIDEO_1; ?>
															</div>
															<div id="video_file_1_error"></div>
															<i class="ti-video-camera"></i>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="<?php echo BUTTON_2; ?>" name="b2" id="b2">
															<i class="ti-hand-point-up"></i>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="file" hidden name="video_file_2" id="video_file_2" accept="video/mp4,video/x-m4v,video/*">
															<div class="type-file">
																<?php echo VIDEO_2; ?>
															</div>
															<div id="video_file_2_error"></div>
															<i class="ti-video-camera"></i>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="<?php echo BUTTON_3; ?>" name="b3" id="b3">
															<i class="ti-hand-point-up"></i>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="file" hidden name="video_file_3" id="video_file_3" accept="video/mp4,video/x-m4v,video/*">
															<div class="type-file">
																<?php echo VIDEO_3; ?>
															</div>
															<div id="video_file_3_error"></div>
															<i class="ti-video-camera"></i>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="<?php echo BUTTON_4; ?>" name="b4" id="b4">
															<i class="ti-hand-point-up"></i>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="file" hidden name="video_file_4" id="video_file_4" accept="video/mp4,video/x-m4v,video/*">  
															<div class="type-file">
																<?php echo VIDEO_4; ?>
															</div>
															<div id="video_file_4_error"></div>
															<i class="ti-video-camera"></i>
														</div>
													</div>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-primary-1 btn-lg btn-block rounded-pill px-5"><?php echo UPLOAD_LABEL_BUTTON; ?></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 right sidebar d-none d-lg-block">
							<h4 class="h4">
								<?php echo LABEL_SIDEBAR_TITLE; ?>
							</h4>
							<p><?php echo LABEL_SIDEBAR_DESCRIPTION; ?></p>
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
	
	$("#label-form").validate({
		ignore : [],
		rules:
		{
			label:{required : true},
			label_file:{required : true,accept: "image/*"},
			upcirc:{required:true,digits:true,min:1},
			downcirc:{required:true,digits:true,min:1},
			height:{required:true,digits:true,min:1},
			weight:{required:true,digits:true,min:1},
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
				accept: "video/*",
				required: function(element)
				{
					if($("#video_file_1").val() == "" && $("#video_file_2").val() == "" && $("#video_file_3").val() == "" && $("#video_file_4").val() == "" && $("#b2").val() == "" && $("#b3").val() == "" && $("#b4").val() == "")
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
				accept: "video/*",
				required: function(element)
				{
					if($("#b2").val() != "" )
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
				accept: "video/*",
				required: function(element)
				{
					if($("#b3").val() != "" )
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
				accept: "video/*",
				required: function(element)
				{
					if($("#b4").val() != "" )
					{
						return true;
					}
					else
					{
						return false;
					}
				}
			},
			b5:{
				required: function(element)
				{
					if($("#video_file_5").val() != "")
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
		messages: {
			label:{required:"<?php echo PLEASE_ENTER_LABEL_NAME; ?>"},
			label_file:{required:"<?php echo PLEASE_ENTER_LABEL_FILE; ?>",accept: "<?php echo PLEASE_UPLOAD_VALID_IMAGE; ?>"},
			upcirc:{required:"<?php echo PLEASE_ENTER_UPPER_CIRC; ?>",digits:"<?php echo PLEASE_ENTER_DIGITS; ?>",min:"<?php echo PLEASE_ENTER_MIN_1; ?>"},
			downcirc:{required:"<?php echo PLEASE_ENTER_LOWER_CIRC; ?>",digits:"<?php echo PLEASE_ENTER_DIGITS; ?>",min:"<?php echo PLEASE_ENTER_MIN_1; ?>"},
			height:{required:"<?php echo PLEASE_ENTER_HEIGTH; ?>",digits:"<?php echo PLEASE_ENTER_DIGITS; ?>",min:"<?php echo PLEASE_ENTER_MIN_1; ?>"},
			weight:{required:"<?php echo PLEASE_ENTER_WIDTH; ?>",digits:"<?php echo PLEASE_ENTER_DIGITS; ?>",min:"<?php echo PLEASE_ENTER_MIN_1; ?>"},
			b1:{required:"<?php echo PLEASE_ENTER_BUTTON1; ?>"},
			video_file_1:{accept:"<?php echo PLEASE_ENTER_VALIDE_VIDEO_1; ?>",required:"<?php echo PLEASE_ENTER_VIDEO1; ?>"},
			b2:{required:"<?php echo PLEASE_ENTER_BUTTON2; ?>"},
			video_file_2:{accept:"<?php echo PLEASE_ENTER_VALIDE_VIDEO_2; ?>",required:"<?php echo PLEASE_ENTER_VIDEO2; ?>"},
			b3:{required:"<?php echo PLEASE_ENTER_BUTTON3; ?>"},
			video_file_3:{accept:"<?php echo PLEASE_ENTER_VALIDE_VIDEO_3; ?>",required:"<?php echo PLEASE_ENTER_VIDEO3; ?>"},
			b4:{required:"<?php echo PLEASE_ENTER_BUTTON4; ?>"},
			video_file_4:{accept:"<?php echo PLEASE_ENTER_VALIDE_VIDEO_4; ?>",required:"<?php echo PLEASE_ENTER_VIDEO4; ?>"}
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
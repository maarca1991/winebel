<?php
include("connect.php");
include("../include/notification.class.php");

$db->rpcheckAdminLogin();
$ctable 		= "labels";
$ctable1 		= "Label";
$main_page 		= "Label";
$page 			= "add_".$ctable;
$page_title 	= ucwords($_REQUEST['mode'])." ".$ctable1;

$label 		= "";
$upcirc 	= "";
$downcirc 	= "";
$height 	= "";
$weight  	= "";

if(isset($_REQUEST['submit']))
{
	$label			= $db->clean($_REQUEST['label']);
	$winery			= $db->clean($_REQUEST['winery']);
	$upcirc			= $db->clean($_REQUEST['upcirc']);
	$downcirc		= $db->clean($_REQUEST['downcirc']);
	$height			= $db->clean($_REQUEST['height']);
	$weight			= $db->clean($_REQUEST['weight']);
	$label_file 	= $_FILES['label_file'];
	$b1				= $db->clean($_REQUEST['b1']);
	$video_file_1	= $_FILES['video_file_1'];
	$b2				= $db->clean($_REQUEST['b2']);
	$video_file_2	= ( $b2 != "" ) ? $_FILES['video_file_2'] : NULL ;
	$b3				= $db->clean($_REQUEST['b3']);
	$video_file_3	= ( $b3 != "" ) ? $_FILES['video_file_3'] : NULL ;
	$b4				= $db->clean($_REQUEST['b4']);
	$video_file_4	= ( $b4 != "" ) ? $_FILES['video_file_4'] : NULL ;

	if( !is_null($label_file['name']) && !empty($label_file['name']) )
	{
		if($_REQUEST['old_label_file']!="" && $label_file!=""){
			if(file_exists(LABEL_A.$_REQUEST['old_label_file'])){
				unlink(LABEL_A.$_REQUEST['old_label_file']);
			}
		}
		$target_file = LABEL_A.$label_file["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$label_file_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($label_file["tmp_name"], LABEL_A.$label_file_name);
		$label_file = SITEURL.LABEL.$label_file_name;
	}
	else
	{
		if($_REQUEST['old_label_file']!="" && $label_file!=""){
			$label_file = $_REQUEST['old_label_file'];
		}
		else
		{
			$label_file = "";
		}
	}

	if( !is_null($video_file_1['name']) && !empty($video_file_1['name']) )
	{
		if($_REQUEST['old_video_file_1']!="" && $video_file_1!=""){
			if(file_exists(LABEL_A.$_REQUEST['old_video_file_1'])){
				unlink(LABEL_A.$_REQUEST['old_video_file_1']);
			}
		}
		$target_file = LABEL_A.$video_file_1["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_1_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_1["tmp_name"], LABEL_A.$video_file_1_name);
		$video_file_1 = SITEURL.LABEL.$video_file_1_name;
	}
	else
	{
		if($_REQUEST['old_video_file_1']!="" && $video_file_1!=""){
			$video_file_1 = $_REQUEST['old_video_file_1'];
		}
		else
		{
			$video_file_1 = "";
		}
	}

	if( !is_null($video_file_2['name']) && !empty($video_file_2['name']) )
	{
		if($_REQUEST['old_video_file_2']!="" && $video_file_2!=""){
			if(file_exists(LABEL_A.$_REQUEST['old_video_file_2'])){
				unlink(LABEL_A.$_REQUEST['old_video_file_2']);
			}
		}
		$target_file = LABEL_A.$video_file_2["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_2_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_2["tmp_name"], LABEL_A.$video_file_2_name);
		$video_file_2 = SITEURL.LABEL.$video_file_2_name;
	}
	else
	{
		if($_REQUEST['old_video_file_2']!="" && $video_file_2!=""){
			$video_file_2 = $_REQUEST['old_video_file_2'];
		}
		else
		{
			$video_file_2 = "";
		}
	}

	if( !is_null($video_file_3['name']) && !empty($video_file_3['name']) )
	{
		if($_REQUEST['old_video_file_3']!="" && $video_file_3!=""){
			if(file_exists(LABEL_A.$_REQUEST['old_video_file_3'])){
				unlink(LABEL_A.$_REQUEST['old_video_file_3']);
			}
		}
		$target_file = LABEL_A.$video_file_3["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_3_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_3["tmp_name"], LABEL_A.$video_file_3_name);
		$video_file_3 = SITEURL.LABEL.$video_file_3_name;
	}
	else
	{
		if($_REQUEST['old_video_file_3']!="" && $video_file_3!=""){
			$video_file_3 = $_REQUEST['old_video_file_3'];
		}
		else
		{
			$video_file_3 = "";
		}
	}

	if( !is_null($video_file_4['name']) && !empty($video_file_4['name']) )
	{
		if($_REQUEST['old_video_file_4']!="" && $video_file_4!=""){
			if(file_exists(LABEL_A.$_REQUEST['old_video_file_4'])){
				unlink(LABEL_A.$_REQUEST['old_video_file_4']);
			}
		}
		$target_file = LABEL_A.$video_file_4["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_4_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_4["tmp_name"], LABEL_A.$video_file_4_name);
		$video_file_4 = SITEURL.LABEL.$video_file_4_name;
	}
	else
	{
		if($_REQUEST['old_video_file_4']!="" && $video_file_4!=""){
			$video_file_4 = $_REQUEST['old_video_file_4'];
		}
		else
		{
			$video_file_4 = "";
		}
	}

	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="edit")
	{
		$rows 	= array(
			"label"			=> $label,
			"winery"		=> $winery,
			"upcirc"		=> $upcirc,
			"downcirc"		=> $downcirc,
			"height"		=> $height,
			"weight"		=> $weight,
			"label_file" 	=> $label_file,
			"b1"			=> $b1,
			"b2"			=> $b2,
			"b3"			=> $b3,
			"b4"			=> $b4,
			"video_file_1"	=> $video_file_1,
			"video_file_2"	=> $video_file_2,
			"video_file_3"	=> $video_file_3,
			"video_file_4"	=> $video_file_4,
		);

		$where	= "labels_id=".$_REQUEST['id'];
		$db->rpupdate($ctable,$rows,$where);
		$_SESSION['MSG'] = "Updated";
		$db->rplocation(ADMINURL."manage-labels/");
		exit;
	}

	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="add")
	{
		$rows 	= array(
			"label"			=> $label,
			"winery"		=> $winery,
			"upcirc"		=> $upcirc,
			"downcirc"		=> $downcirc,
			"height"		=> $height,
			"weight"		=> $weight,
			"label_file" 	=> $label_file,
			"b1"			=> $b1,
			"b2"			=> $b2,
			"b3"			=> $b3,
			"b4"			=> $b4,
			"video_file_1"	=> $video_file_1,
			"video_file_2"	=> $video_file_2,
			"video_file_3"	=> $video_file_3,
			"video_file_4"	=> $video_file_4,
		);

		$db->minsert($ctable,$rows);
		$_SESSION['MSG'] = "Inserted";
		$db->rplocation(ADMINURL."manage-labels/");
		exit;
	}
}

if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="edit")
{
	$where 		= " labels_id='".$_REQUEST['id']."' AND isDelete=0";
	$ctable_r 	= $db->rpgetData($ctable,"*",$where);
	$ctable_d 	= @mysqli_fetch_array($ctable_r);

	$label   		= stripslashes($ctable_d['label']);
	$winery   		= stripslashes($ctable_d['winery']);
	$upcirc			= stripslashes($ctable_d['upcirc']);
	$downcirc		= stripslashes($ctable_d['downcirc']);
	$height			= stripslashes($ctable_d['height']);
	$weight			= stripslashes($ctable_d['weight']);
	$label_file 	= stripslashes($ctable_d['label_file']);
	$video_file_1 	= stripslashes($ctable_d['video_file_1']);
	$video_file_2 	= stripslashes($ctable_d['video_file_2']);
	$video_file_3 	= stripslashes($ctable_d['video_file_3']);
	$video_file_4 	= stripslashes($ctable_d['video_file_4']);
	$b1 			= stripslashes($ctable_d['b1']);
	$b2 			= stripslashes($ctable_d['b2']);
	$b3 			= stripslashes($ctable_d['b3']);
	$b4 			= stripslashes($ctable_d['b4']);
}

if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="delete")
{
	$id 	= $_REQUEST['id'];
	$rows 	= array("isDelete" => "1");
	
	$db->rpupdate($ctable,$rows,"labels_id='".$id."'");
	
	$_SESSION['MSG'] = "Deleted";
	$db->rplocation(ADMINURL."manage-labels/");
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

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-9">
				<div class="box box-success">
					<div class="box-header with-border">
					</div>
					<form role="form" name="frm" id="frm" action="." method="post" enctype="multipart/form-data">
						<input type="hidden" name="mode" id="mode" value="<?php echo $_REQUEST['mode']; ?>">
						<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
						<div class="box-body">
							<div class="form-group">
								<label for="winery"> Select User <code>*</code></label>
								<select id="winery" class="form-control" name="winery">
									<option value="">Select User</option>
									<?php
										$user_where = " isDelete = 0 AND active_account = 1";
										$user_r = $db->rpgetData("user","*",$user_where);
										while($user_d = @mysqli_fetch_array($user_r)){
									?>
									<option <?php echo ($user_d['id'] == $winery)? "selected" : "";  ?>  value="<?php echo $user_d['id']; ?>"><?php echo $user_d['name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="label"> Name <code>*</code></label>
								<input type="text" class="form-control" id="label" name="label" value="<?php echo $label; ?>">
							</div>
							<div class="form-group">
								<label for="label_file"> Label File <code>*</code></label>
								<input type="file" class="form-control" id="label_file" name="label_file" accept="image/x-png,image/gif,image/jpeg">
								<input type="hidden" name="old_label_file" value="<?php echo $label_file; ?>" id="old_label_file">
							</div>
							<?php if($_REQUEST['mode'] == 'edit'){ ?>
							<div class="form-group">
								<img src="<?php echo $label_file; ?>" width='200px' height="200px">
							</div>
							<?php } ?>
							<div class="form-group">
								<label for="upcirc"> Upper Circumference <code>*</code></label>
								<input type="text" class="form-control" id="upcirc" name="upcirc" value="<?php echo $upcirc; ?>">
							</div>
							<div class="form-group">
								<label for="downcirc"> Lower Circumference <code>*</code></label>
								<input type="text" class="form-control" id="downcirc" name="downcirc" value="<?php echo $downcirc; ?>">
							</div>
							<div class="form-group">
								<label for="height"> Height <code>*</code></label>
								<input type="text" class="form-control" id="height" name="height" value="<?php echo $height; ?>">
							</div>
							<div class="form-group">
								<label for="weight"> Weight <code>*</code></label>
								<input type="text" class="form-control" id="weight" name="weight" value="<?php echo $weight; ?>">
							</div>
							<div class="form-group">
								<label for="b1"> Button 1 <code>*</code></label>
								<input type="text" class="form-control" id="b1" name="b1" value="<?php echo $b1; ?>">
							</div>
							<div class="form-group">
								<label for="video_file_1">Video 1 <code>*</code></label>
								<input type="file" class="form-control" id="video_file_1" name="video_file_1" accept="video/mp4,video/x-m4v,video/*">
								<input type="hidden" name="old_video_file_1" value="<?php echo $video_file_1; ?>" id="old_video_file_1">
							</div>
							<?php if($_REQUEST['mode'] == 'edit' && $video_file_1!=""){ ?>
							<div class="form-group">
								<video width="300px" height="300px" controls <?php if($_REQUEST['mode'] == 'edit'){ ?> <?php } ?> >
									<source id="source" src="<?php echo $video_file_1; ?>" type="video/mp4">
								</video>
							</div>
							<?php } ?>
							<div class="form-group">
								<label for="b2"> Button 2 <code>*</code></label>
								<input type="text" class="form-control" id="b2" name="b2" value="<?php echo $b2; ?>">
							</div>
							<div class="form-group">
								<label for="video_file_2">Video 2 <code>*</code></label>
								<input type="file" class="form-control" id="video_file_2" name="video_file_2" accept="video/mp4,video/x-m4v,video/*">
								<input type="hidden" name="old_video_file_2" value="<?php echo $video_file_2; ?>" id="old_video_file_2">
							</div>
							<?php if($_REQUEST['mode'] == 'edit' && $video_file_2!=""){ ?>
							<video width="300px" height="300px" controls <?php if($_REQUEST['mode'] == 'edit'){ ?> <?php } ?>>
								<source id="source" src="<?php echo $video_file_2; ?>" type="video/mp4">
							</video>
							<?php } ?>
							<div class="form-group">
								<label for="b3"> Button 3 <code>*</code></label>
								<input type="text" class="form-control" id="b3" name="b3" value="<?php echo $b3; ?>">
							</div>
							<div class="form-group">
								<label for="video_file_3">Video 3 <code>*</code></label>
								<input type="file" class="form-control" id="video_file_3" name="video_file_3" accept="video/mp4,video/x-m4v,video/*">
								<input type="hidden" name="old_video_file_3" value="<?php echo $video_file_3; ?>" id="old_video_file_3">
							</div>
							<?php if($_REQUEST['mode'] == 'edit' && $video_file_3!=""){ ?>
							<video width="300px" height="300px" controls <?php if($_REQUEST['mode'] == 'edit'){ ?> <?php } ?>>
								<source id="source" src="<?php echo $video_file_3; ?>" type="video/mp4">
							</video>
							<?php } ?>
							<div class="form-group">
								<label for="b4"> Button 4 <code>*</code></label>
								<input type="text" class="form-control" id="b4" name="b4" value="<?php echo $b4; ?>">
							</div>
							<div class="form-group">
								<label for="video_file_4">Video 4 <code>*</code></label>
								<input type="file" class="form-control" id="video_file_4" name="video_file_4" accept="video/mp4,video/x-m4v,video/*">
								<input type="hidden" name="old_video_file_4" value="<?php echo $video_file_4; ?>" id="old_video_file_4">
							</div>
							<?php if($_REQUEST['mode'] == 'edit' && $video_file_4!=""){ ?>
							<video width="300px" height="300px" controls <?php if($_REQUEST['mode'] == 'edit'){ ?> <?php } ?>>
								<source id="source" src="<?php echo $video_file_4; ?>" type="video/mp4">
							</video>
							<?php } ?>

							<div class="box-footer">
								<button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
								<button type="button" class="btn btn-inverse waves-effect w-md waves-light" onClick="window.location.href='<?= ADMINURL ?>manage-labels/'">Back</button>
							</div>
						</div>
					</form>
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
	var check = $("#mode").val();
	if(check == "add")
	{
		$(function(){
			$("#frm").validate({
				ignore: "",
				rules: {
					label:{required:true},
					upcirc:{required:true},
					downcirc:{required:true},
					height:{required:true},
					weight:{required:true},
					winery:{required:true},
					label_file:{required:true,accept: "image/*"},
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
							if($("#video_file_1").val() == "" && $("#video_file_2").val() == "" && $("#video_file_3").val() == "" && $("#video_file_4").val() == "")
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
						accept: "video/*",
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
						accept: "video/*",
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
					}
				},
				messages: {
					label:{required:"Please enter name."},
					upcirc:{required:"Please enter upper circumference."},
					downcirc:{required:"Please enter lower circumference."},
					height:{required:"Please eneter height."},
					weight:{required:"Please enter weight."},
					winery:{required:"Please select user."},
					label_file:{required:"Please upload label file",accept: "Please upload valid image."},
					b1:{required:"Please enter button 1"},
					video_file_1:{accept: "Please upload valid video 1.",required:"Please enter video 1"},
					b2:{required:"Please enter button 2"},
					video_file_2:{accept: "Please upload valid video 2.",required:"Please enter video 2"},
					b3:{required:"Please enter button 3"},
					video_file_3:{accept: "Please upload valid video 3.",required:"Please enter video 3"},
					b4:{required:"Please enter button 4"},
					video_file_4:{accept: "Please upload valid video 4.",required:"Please enter video 4"}
				}
			});
		});
	}
	else
	{
		$(function(){
			$("#frm").validate({
				ignore: "",
				rules: {
					label:{required:true},
					upcirc:{required:true},
					downcirc:{required:true},
					height:{required:true},
					weight:{required:true},
					winery:{required:true},
					label_file:{
						accept: "image/*",
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
						accept: "video/*",
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
						accept: "video/*",
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
						accept: "video/*",
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
						accept: "video/*",
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
					label:{required:"Please enter name."},
					upcirc:{required:"Please enter upper circumference."},
					downcirc:{required:"Please enter lower circumference."},
					height:{required:"Please eneter height."},
					weight:{required:"Please enter weight."},
					winery:{required:"Please select user."},
					label_file:{required:"Please enter image.",accept:"Please enter valid image."},
					b1:{required:"Please enter button 1"},
					video_file_1:{accept: "Please upload valid video 1.",required:"Please enter video 1"},
					b2:{required:"Please enter button 2"},
					video_file_2:{accept: "Please upload valid video 2.",required:"Please enter video 2"},
					b3:{required:"Please enter button 3"},
					video_file_3:{accept: "Please upload valid video 3.",required:"Please enter video 3"},
					b4:{required:"Please enter button 4"},
					video_file_4:{accept: "Please upload valid video 4.",required:"Please enter video 4"}
				}
			});
		});
	}
</script>
</body>
</html>

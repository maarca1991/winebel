<?php
include("connect.php");
include("include/notification.class.php");
// print_r("<pre>");
// print_r($_POST);die();

$label 				= 	$db->clean($_POST['label']);
$label_file 		= 	$_FILES['label_file'];
$upcirc 			= 	$db->clean($_POST['upcirc']);	
$downcirc			= 	$db->clean($_POST['downcirc']);
$height				= 	$db->clean($_POST['height']);
$weight				= 	$db->clean($_POST['weight']);
$b1					= 	$db->clean($_POST['b1']);
$video_file_1		= 	$_FILES['video_file_1'];
$b2					= 	$db->clean($_POST['b2']);
$video_file_2		= 	( $b2 != "" ) ? $_FILES['video_file_2'] : NULL ;
$b3					= 	$db->clean($_POST['b3']);
$video_file_3		= 	( $b3 != "" ) ? $_FILES['video_file_3'] : NULL ;
$b4					= 	$db->clean($_POST['b4']);
$video_file_4		= 	( $b4 != "" ) ? $_FILES['video_file_4'] : NULL ;
// $b5					= 	$db->clean($_POST['b5']);
// $video_file_5		= 	( $b5 != "" ) ? $_FILES['video_file_5'] : NULL ;
// $b6					= 	$db->clean($_POST['b6']);
// $video_file_6		= 	( $b6 != "" ) ? $_FILES['video_file_6'] : NULL ;

if($label!="")
{
	if( !is_null($label_file['name']) && !empty($label_file['name']) )
	{
		if($_REQUEST['old_label_file']!="" && $label_file!=""){
			if(file_exists(LABEL.$_REQUEST['old_label_file'])){
				unlink(LABEL.$_REQUEST['old_label_file']);
			}
		}
		$target_file = LABEL.$label_file["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$label_file_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($label_file["tmp_name"], LABEL.$label_file_name);
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
			if(file_exists(LABEL.$_REQUEST['old_video_file_1'])){
				unlink(LABEL.$_REQUEST['old_video_file_1']);
			}
		}
		$target_file = LABEL.$video_file_1["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_1_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_1["tmp_name"], LABEL.$video_file_1_name);
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
			if(file_exists(LABEL.$_REQUEST['old_video_file_2'])){
				unlink(LABEL.$_REQUEST['old_video_file_2']);
			}
		}
		$target_file = LABEL.$video_file_2["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_2_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_2["tmp_name"], LABEL.$video_file_2_name);
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
			if(file_exists(LABEL.$_REQUEST['old_video_file_3'])){
				unlink(LABEL.$_REQUEST['old_video_file_3']);
			}
		}
		$target_file = LABEL.$video_file_3["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_3_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_3["tmp_name"], LABEL.$video_file_3_name);
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
			if(file_exists(LABEL.$_REQUEST['old_video_file_4'])){
				unlink(LABEL.$_REQUEST['old_video_file_4']);
			}
		}
		$target_file = LABEL.$video_file_4["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_4_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_4["tmp_name"], LABEL.$video_file_4_name);
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

	// if( !is_null($video_file_5['name']) && !empty($video_file_5['name']) )
	// {
	// 	if($_REQUEST['old_video_file_5']!="" && $video_file_5!=""){
	// 		if(file_exists(LABEL.$_REQUEST['old_video_file_5'])){
	// 			unlink(LABEL.$_REQUEST['old_video_file_5']);
	// 		}
	// 	}
	// 	$target_file = LABEL.$video_file_5["name"];
	// 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// 	$video_file_5_name = time()."_".rand(1,9999999).".".$imageFileType;
	// 	move_uploaded_file($video_file_5["tmp_name"], LABEL.$video_file_5_name);
	// 	$video_file_5 = SITEURL.LABEL.$video_file_5_name;
	// }
	// else
	// {
	// 	if($_REQUEST['old_video_file_5']!="" && $video_file_5!=""){
	// 		$video_file_5 = $_REQUEST['old_video_file_5'];
	// 	}
	// 	else
	// 	{
	// 		$video_file_5 = "";
	// 	}
	// }

	// if( !is_null($video_file_6['name']) && !empty($video_file_6['name']) )
	// {
	// 	if($_REQUEST['old_video_file_6']!="" && $video_file_6!=""){
	// 		if(file_exists(LABEL.$_REQUEST['old_video_file_6'])){
	// 			unlink(LABEL.$_REQUEST['old_video_file_6']);
	// 		}
	// 	}
	// 	$target_file = LABEL.$video_file_6["name"];
	// 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// 	$video_file_6_name = time()."_".rand(1,9999999).".".$imageFileType;
	// 	move_uploaded_file($video_file_6["tmp_name"], LABEL.$video_file_6_name);
	// 	$video_file_6 = SITEURL.LABEL.$video_file_6_name;
	// }
	// else
	// {
	// 	if($_REQUEST['old_video_file_6']!="" && $video_file_6!=""){
	// 		$video_file_6 = $_REQUEST['old_video_file_6'];
	// 	}
	// 	else
	// 	{
	// 		$video_file_6 = "";
	// 	}
	// }

	$rows 	= array(
		"label"			=> $label,
		"winery"		=> $_SESSION[SESS_PRE.'_SESS_USER_ID'],
		"upcirc"		=> $upcirc,
		"downcirc"		=> $downcirc,
		"height"		=> $height,
		"weight"		=> $weight,
		"label_file"	=> $label_file,
		"video_file_1"	=> $video_file_1,
		"b1"			=> $b1,
		"video_file_2"	=> $video_file_2,
		"b2"			=> $b2,
		"video_file_3"	=> $video_file_3,
		"b3"			=> $b3,
		"video_file_4"	=> $video_file_4,
		"b4"			=> $b4,
		// "video_file_5"	=> $video_file_5,
		// "b5"			=> $b5,
		// "video_file_6"	=> $video_file_6,
		// "b6"			=> $b6,
	);
	
	$where = " labels_id=".$_POST['labels_id'];
	$db->rpupdate('labels',$rows,$where);
	$_SESSION['MSG'] = 'success_edit_label';
	$db->rplocation(SITEURL."label/");
}
else
{
	$_SESSION['MSG'] = 'FILL_ALL_DATA';
	$db->rplocation(SITEURL."label/");
}

?>
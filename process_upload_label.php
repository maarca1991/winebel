<?php
include("connect.php");
include("include/notification.class.php");


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

if($label!="" && $label_file!="" && $upcirc!=""  && $downcirc!=""  && $height!="" && $weight!="")
{
	if( !is_null($label_file['name']) && !empty($label_file['name']) )
	{
		$target_file = LABEL.$label_file["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$label_file_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($label_file["tmp_name"], LABEL.$label_file_name);
		$label_file = SITEURL.LABEL.$label_file_name;
	}
	else
	{
		$label_file = "";
	}

	if( !is_null($video_file_1['name']) && !empty($video_file_1['name']) )
	{
		$target_file = LABEL.$video_file_1["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_1_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_1["tmp_name"], LABEL.$video_file_1_name);
		$video_file_1 = SITEURL.LABEL.$video_file_1_name;
	}
	else
	{
		$video_file_1 = "";
	}

	if( !is_null($video_file_2['name']) && !empty($video_file_2['name']) )
	{
		$target_file = LABEL.$video_file_2["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_2_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_2["tmp_name"], LABEL.$video_file_2_name);
		$video_file_2 = SITEURL.LABEL.$video_file_2_name;
	}
	else
	{
		$video_file_2 = "";
	}

	if( !is_null($video_file_3['name']) && !empty($video_file_3['name']) )
	{
		$target_file = LABEL.$video_file_3["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_3_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_3["tmp_name"], LABEL.$video_file_3_name);
		$video_file_3 = SITEURL.LABEL.$video_file_3_name;
	}
	else
	{
		$video_file_3 = "";
	}

	if( !is_null($video_file_4['name']) && !empty($video_file_4['name']) )
	{
		$target_file = LABEL.$video_file_4["name"];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$video_file_4_name = time()."_".rand(1,9999999).".".$imageFileType;
		move_uploaded_file($video_file_4["tmp_name"], LABEL.$video_file_4_name);
		$video_file_4 = SITEURL.LABEL.$video_file_4_name;
	}
	else
	{
		$video_file_4 = "";
	}

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
		"b4"			=> $b4
	);

	$db->minsert('labels',$rows);

	//Get User Data
	$user_data_r = $db->rpgetData("user","*"," id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']);
	$user_data_d = @mysqli_fetch_array($user_data_r);

	$subject = SITETITLE."Add New Labels";
	$nt = new Notification();
	include("mailbody/user_add_labels.php");
	$toemail = $email;
	$nt->rpsendEmail($toemail,$subject,$body);

	$_SESSION['MSG'] = 'success_upload_label';
	$db->rplocation(SITEURL."label/");
}
else
{
	$_SESSION['MSG'] = 'FILL_ALL_DATA';
	$db->rplocation(SITEURL."label/");
}

?>
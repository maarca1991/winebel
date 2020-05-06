<?php 
include("connect.php");
$lang_id 	= $db->clean($_POST['lang_id']);
$url 		= $db->clean($_POST['url']);

if($lang_id!="" && $url!="" && $_SESSION[SESS_PRE.'_SESS_USER_ID']>0) 
{
	$rows 	= array(
		"lang"	=> $lang_id
	);

	$where = " id=".$_SESSION[SESS_PRE.'_SESS_USER_ID'];
	$uid = $db->rpupdate('user',$rows,$where);

	$db->rplocation($url);
	exit;
}
else if($lang_id!="" && $url!="")
{
	$_SESSION[SESS_PRE.'_SESS_LANG'] = $lang_id;
	$db->rplocation($url);
	exit;
}
else
{
	$_SESSION['MSG'] = 'Something_Wrong';
	$db->rplocation($url);
	exit;
}

?>
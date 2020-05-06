<?php
ob_start();
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
include("include/define.php");
include("include/function.class.php");
$db = new Cart();

if($_SESSION[SESS_PRE.'_SESS_USER_ID'] != "" && isset($_SESSION[SESS_PRE.'_SESS_USER_ID']))
{
	$lang = $db->rpgetValue("user",'lang'," id=".$_SESSION[SESS_PRE.'_SESS_USER_ID']);
	$_SESSION[SESS_PRE.'_SESS_LANG'] = $lang;	
}

if($_SESSION[SESS_PRE.'_SESS_LANG'] == 1)
{
	include("lang/en_lang.php");
}
else if($_SESSION[SESS_PRE.'_SESS_LANG'] == 2)
{
	include("lang/de_lang.php");
}
else if($_SESSION[SESS_PRE.'_SESS_LANG'] == 3)
{
	include("lang/it_lang.php");
}
else if($_SESSION[SESS_PRE.'_SESS_LANG'] == 4)
{
	include("lang/fr_lang.php");
}
else if($_SESSION[SESS_PRE.'_SESS_LANG'] == 5)
{
	include("lang/sp_lang.php");
}
else
{
	include("lang/en_lang.php");
}
?>
<?php
include("connect.php");

unset($_SESSION[SESS_PRE.'_SESS_USER_ID']);
unset($_SESSION[SESS_PRE.'_SESS_ORDER_ID']);
unset($_SESSION[SESS_PRE.'_SESS_USER_NAME']);

$_SESSION[SESS_PRE.'_SESS_LANG'] = 1;
$db->rplocation(SITEURL);
exit;
?>
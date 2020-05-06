<?php 
	if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'pc-3' || $_SERVER['HTTP_HOST'] == 'pc-42'){

	    $Protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!=='off' || $_SERVER['SERVER_PORT']==443) ? "http://" : "http://";
		
	    $SITEURL = $Protocol.$_SERVER['HTTP_HOST']."/project/winebel/";
	    $ADMINURL = $Protocol.$_SERVER['HTTP_HOST']."/project/winebel/apanel/";
	}
	else 
	{
	    $SITEURL = 'http://winebel.com/';
	    $ADMINURL = 'http://winebel.com/apanel/';

	    //Client Server
	    //$SITEURL = 'https://www.winebel.com/';
	    //$ADMINURL = 'https://www.winebel.com/apanel/';
	}       

define('SITEURL', $SITEURL);

define('ADMINURL', $ADMINURL);

define('SITENAME','Winebel');

define('SITETITLE','Winebel');

define('SITENUMBER','123-456-7890');

define('SITEEMAIL','support@writelikesamurai.com');

define('ADMINTITLE','Winebel');
			
define('CURR','&dollar;');				
?>
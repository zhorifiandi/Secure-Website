<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

	$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
	$base_url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	$uri = explode("/", $_SERVER["REQUEST_URI"]);
	$uri_count = count($uri);
	array_shift($uri);
	array_shift($uri);
	array_shift($uri);
	
	/************************************************************************************************/
	
	$uri1=isset($uri[0])?$uri[0]:"";
	$uri2=isset($uri[1])?$uri[1]:"";
	$uri3=isset($uri[2])?$uri[2]:"";
	$uri4=isset($uri[3])?$uri[3]:"";
	$uri5=isset($uri[4])?$uri[4]:"";
	$uri6=isset($uri[5])?$uri[5]:"";
	$uri7=isset($uri[6])?$uri[6]:"";
	$uri8=isset($uri[7])?$uri[7]:"";
	$uri9=isset($uri[8])?$uri[8]:"";
		
	/************************************************************************************************/	
?>
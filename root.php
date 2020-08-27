<?php

//ini_set("allow_url_include", true);
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = 'https://';   
else  
    $url = 'http://';

// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// The root directory path of the website
$root = $url;

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    

// Store URI
$uri = $_SERVER['REQUEST_URI'];

// Directory template used for addresses for 'include_once' functions of PHP
if (!isset($temp)) {
	$temp = '.';
}

// The root webpage uri
//$root = $temp . "/root.php";

// The main webpage url
$index = $root . '/index.php';

// The connection configs file uri
$connection_config = $temp . '/connection_config.php';

// Location of the scripts (url)
$js = $root . '/js' . '/';

// Location of the stylesheets (url)
$stylesheets = $root . '/stylesheets' . '/';

// Location of the images (url)
$imgs = $root . '/images' . '/';

// The main pre-application webpage url
$app0 = $root .'/general/app_main.php';

// The group or private lesson choice (student pre-application) webpage url
$app_std0 = $root .'/general/app_s0.php';

// The application for students who chose private lessons page url
$app_std_private = $root .'/general/app_s_pr.php';

// The application for students who chose group lessons page url
$app_std_group = $root .'/general/app_s_gr.php';

// The application for teachers page url
$app_tch = $root .'/general/app_t.php';

// The URIs of headers and footer, head tag
$header_uri = $temp .'/header-footer/header.php';
$headerAdmin_uri = $temp .'/header-footer/headerAdmin.php';
$footer_uri = $temp .'/header-footer/footer.php';
$head_uri = $temp .'/head.php';
$back_link_uri = $temp . '/back_link.php';


switch ($url) {
	case $app0:
		$back_link = $index;
		break;
	case $app_std0:
		$back_link = $app0;
		break;
	case $app_std_group:
		$back_link = $app_std0;
		break;
	case $app_std_private:
		$back_link = $app_std0;
		break;
	case $app_tch:
		$back_link = $app0;
		break;
	default:
		$back_link = $index;
		break;
}

function exception_handler($exception){
	echo "<b> Exception: </b>" . $exception->getMessage();
}

set_exception_handler('exception_handler');
?>
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
	$temp = $_SERVER['DOCUMENT_ROOT'];
}

// This configs file local pathname
//$config = $temp . "/config.php";

// The connection configs file local pathname
$connection_config = $temp . '/connection_config.php';

// The main webpage URL
$index = $root . '/index.php';

// Location of the scripts (part of URL)
$js = $root . '/scripts' . '/';

// Location of the stylesheets (part of URL)
$css = $root . '/stylesheets' . '/';

// Location of the images (part of URL)
$imgs = $root . '/images' . '/';

// Location of general (public) pages (part of URL)
$general = $root . '/general' . '/';

// Location of the pages for authorized users (part of URL)
$administration = $root . '/administration' . '/';

// The main pre-application webpage URL
$appMain_href = $general . 'app_main.php';

// The group or private lesson choice (student pre-application) webpage URL
$appStd_href = $general . 'app_s0.php';

// The application for students who chose private lessons page URL
$appStdPrivate_href = $general .'app_s_pr.php';

// The application for students who chose group lessons page URL
$appStdGroup_href = $general .'app_s_gr.php';

// The application for teachers page URL
$appTch_href = $general .'app_t.php';

// The pathways of headers, footer, head tag, 'back' link
$header_pathname = $temp .'/header-footer/header.php';
$headerAdmin_pathname = $temp .'/header-footer/headerAdmin.php';
$footer_pathname = $temp .'/header-footer/footer.php';
$head_pathname = $temp .'/head.php';
$backLink_pathname = $temp . '/backlink.php';


switch ($url) {
	case $appMain_href:
		$backLink_href = $index;
		break;
	case $appStd_href:
		$backLink_href = $appMain_href;
		break;
	case $appStdGroup_href:
		$backLink_href = $appStd_href;
		break;
	case $appStdPrivate_href:
		$backLink_href = $appStd_href;
		break;
	case $appTch_href:
		$backLink_href = $appMain_href;
		break;
	default:
		$backLink_href = $index;
		break;
}

function exception_handler($exception){
	echo "<b> Exception: </b>" . $exception->getMessage();
}

set_exception_handler('exception_handler');

ini_set('session.cookie_httponly',1);
//ini_set('session.cookie_secure',1);
ini_set('session.use_strict_mode',1);
?>
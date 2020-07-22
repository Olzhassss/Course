<?php

//ini_set("allow_url_include", true);
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
else  
    $url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    
$thispage = $_SERVER['REQUEST_URI'];

// URI template used for href on local server
if (!isset($temp)) {
	$temp = ".";
}

// Location of the scripts (folder name)
$js = $temp . "/js/";

// The root webpage uri
$root = $temp . "/root.php";

// The main webpage uri
$index = $temp . "/index.php";

// The main pre-application webpage uri
$app0 = $temp ."/webpages/app_main.php";

// The group or private lesson choice (student pre-application) webpage uri
$app_std0 = $temp ."/webpages/app_s0.php";

// The application for students who chose private lessons
$app_std_private = $temp ."/webpages/app_s_pr.php";

// The application for students who chose private lessons
$app_std_group = $temp ."/webpages/app_s_gr.php";

// The application for teachers
$app_tch = $temp ."/webpages/app_t.php";

// The uri of header and footer, head tag
$header_uri = $temp ."/header-footer/header.php";
$footer_uri = $temp ."/header-footer/footer.php";
$head_uri = $temp ."/head.php";


switch ($temp . $thispage) {
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

?>
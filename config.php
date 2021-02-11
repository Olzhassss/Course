<?php
//ini_set("allow_url_include", true);
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = 'https://';   
else  
    $url = 'http://';

// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// The domain URL address of the website. Used for 'href' and 'src' attributes of html tags
$root_url = $url;

// Full URL address of the page
$url.= $_SERVER['REQUEST_URI'];    

// Root ldp on the server. Used for the 'include_once' functions of PHP
// Note: LDP stands for local directory path
if (!isset($root_ldp)) {
	$root_ldp = $_SERVER['DOCUMENT_ROOT'];
}
// This configs file LDP
//$config = $root_ldp . "/config.php";

// The connection configs file LDP
$connection_config = $root_ldp . '/connection_config.php';

// The main webpage URL
$index_url = $root_url . '/index.php';

// Location of the scripts (part of URL)
$js = $root_url . '/scripts' . '/';

// Location of the stylesheets (part of URL)
$css = $root_url . '/stylesheets' . '/';

// Location of the images (part of URL)
$imgs = $root_url . '/images' . '/';

// Location of general (public) pages as both URL and LDP
$general_url = $root_url . '/general' . '/';
$general_ldp = $root_ldp . '/general' . '/';

// Location of the pages for authorized users (URL and LDP)
$administration_url = $root_url . '/administration' . '/';
$administration_ldp = $root_ldp . '/administration' . '/';

// Location of the files needed for any kind of processing (without html) (URL and LDP)
$processing_url = $root_url . '/processing' . '/';
$processing_ldp = $root_ldp . '/processing' . '/';

// Location of miscellaneous files (URL and LDP)
$miscellaneous_ldp = $root_ldp . '/miscellaneous' . '/';
$miscellaneous_url = $root_url . '/miscellaneous' . '/';

// The URLs of the files at 'index.php' header navigation bar ('header.php')
// (main pre-application page, authorization page)
$appMain_url = $general_url . 'app_main.php';
$authorizationPage_url = $general_url . 'authorization_page.php';

// The group or private lesson choice (student pre-application) webpage URL
$appStd_url = $general_url . 'app_s0.php';

// URLs to the application webpages
$appStdPrivate_url = $general_url .'app_s_pr.php';
$appStdGroup_url = $general_url .'app_s_gr.php';
$appTch_url = $general_url .'app_t.php';

// The article template webpage URL
$article_url = $general_url . 'article.php';

// The main administration webpage URL
$adminIndex_url = $administration_url .'admin_index.php';

// The URLs of the files at 'index.php' header navigation bar ('headerAdmin.php')
// (log out page)
$logout_url = $processing_url . 'logout.php';

// URLs of the injectable php files
$appInject_url = $administration_url .'applications_injection.php';
$schInject_url = $administration_url .'schedule_injection.php';
$clsInject_url = $administration_url .'classes_injection.php';
$edtInject_url = $administration_url .'frontEdit_injection.php';
$memInject_url = $administration_url . 'members_injection.php';
$appCvInject_url = $administration_url .'appBrowse_injection.php';
$memCvInject_url = $administration_url .'memBrowse_injection.php';
$appTables_url = $administration_url . 'appTables_injection.php';
$memTables_url = $administration_url . 'memTables_injection.php';

$memEditInject_url = $administration_url . 'memEdit_injection.php';

$clsInfoInject_url = $administration_url . 'clsBrowse_injection.php';
$clsEditInject_url = $administration_url . 'clsEdit_injection.php';

$schEditInject_url = $administration_url . 'schEdit_injection.php';
$schEditOver_url = $administration_url . 'scheduleOverlay_injection.php';
$schStdEdtTbInject_url = $administration_url . 'schEditTable_injection.php';

// The LDPs of headers, footer, head tag, '<-Back' link
$header_ldp = $root_ldp .'/header-footer/header.php';
$headerAdmin_ldp = $root_ldp .'/header-footer/headerAdmin.php';
$footer_ldp = $root_ldp .'/header-footer/footer.php';
$head_ldp = $root_ldp .'/head.php';
$backLink_ldp = $miscellaneous_ldp . 'backLink.php';

// The URLs of the files in 'processing'
$router_url = $processing_url . 'admin_routing.php';
$appProcessing_url = $processing_url . 'app_processing.php';
$recordProcessing_url = $processing_url . 'record_processing.php';
$cvUpdProcessing_url = $processing_url . 'cvUpdate_processing.php';
$cvDelProcessing_url = $processing_url . 'cvDelete_processing.php';
$classProcessing_url = $processing_url . 'class_processing.php';
$scheduleProcessing_url = $processing_url . 'schedule_processing.php';
$authorizationProcessing_url = $processing_url . 'authorization_processing.php';
$txtUpdProcessing_url = $processing_url . 'texts_processing.php';

// The LDPs of the injectable php files
$appTables_ldp = $administration_ldp . 'appTables_injection.php';
$memTables_ldp = $administration_ldp . 'memTables_injection.php';
$memCvInject_ldp = $administration_ldp .'memBrowse_injection.php';
$memEditInject_ldp = $administration_ldp . 'memEdit_injection.php';
$memTchEdtTbInject_ldp = $administration_ldp . 'memEditTablesTch_injection.php';
$memStdEdtTbInject_ldp = $administration_ldp . 'memEditTablesStd_injection.php';

// Miscellaneous
$spinner_src = $imgs . "spinner.gif";
$imgBrw = $imgs.'loupe.png';
$imgAdd = $imgs.'checkmark.png';
$imgDel = $imgs.'xmark.png';
$imgEdt = $imgs.'pencil.png';

// Set the backLink_href according to current page url
switch ($url) {
	case $appMain_url:
		$backLink_href = $index;
		break;
	case $appStd_url:
		$backLink_href = $appMain_url;
		break;
	case $appStdGroup_url:
		$backLink_href = $appStd_url;
		break;
	case $appStdPrivate_url:
		$backLink_href = $appStd_url;
		break;
	case $appTch_url:
		$backLink_href = $appMain_url;
		break;
	default:
		$backLink_href = $index_url;
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
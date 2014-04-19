<?php


function versioned_resource($url) {
	if (strpos($url,"?")) {
		return HTROOT . $url . "&v=" . getlocalconfig("APP_VERSION");
	}
	else {
		return HTROOT . $url . "?v=" . getlocalconfig("APP_VERSION");
	}
}

function check_resource($resourceName) {
	if (file_exists(APP_ROOT . "/" . $resourceName)) {
		return true;
	}
	else {
		//plog_warning("Resource $resourceName does not exists");
		return false;
	}
}
function versioned_css($css, $media='all') {
	if (check_resource($css)) {
		return sprintf('<link href="%s" type="text/css" media="%s" rel="stylesheet">', versioned_resource($css), $media);
	}
}

function versioned_js($js, $charset='') {
	if (check_resource($js)) {
		$cs = "";
		if ($charset!='') {
			$cs = " charset=\"" . $charset . "\"";
		}
		return sprintf('<script type="text/javascript" src="%s"%s></script>', versioned_resource($js), $cs);
	}
}

function htmln($str) {
	echo nl2br(htmls($str));
}

function htmlo($str){
	echo htmls($str);
}

function htmls($str){
	return htmlspecialchars(uencode($str));
}

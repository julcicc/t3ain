<?
error_reporting(E_ALL|E_STRICT);
date_default_timezone_set("Europe/Madrid");
define("APP_ROOT",dirname(__FILE__));

//init some generic functions
function library($name, $subdir = '') {
	if ($subdir!='') $subdir .= '/';

	$file = APP_ROOT . "/lib/" . $subdir . $name . ".php";
	if (!is_readable($file)) {
		plog_error("Problem loading library:", $file);
		error_page("Error loading libraries");
	}

	return $file;
}

require_once APP_ROOT . "/localconfig.php";

require_once library("core");
require_once library("log");
require_once library("db");
require_once library("local");
require_once library("html");
require_once library("login");

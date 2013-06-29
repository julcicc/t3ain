<?php
define("LOG_LEVEL_DEBUG",7);
define("LOG_LEVEL_INFO",6);
define("LOG_LEVEL_ERROR",5);
define("LOG_LEVEL_WARNING",4);

define("LOG", "/tmp/t3ain.log");
define("LOG_LEVEL", LOG_LEVEL_DEBUG);

function psprint($var) {
	$str = "";
	switch( gettype( $var ) ) {
		case 'array': 
		case 'object': 
			ob_start();
			print_r( $var );
			$str = ob_get_contents();
			ob_end_clean();	
			break;
		default:
			$str = strval($var);
	}
	return $str;
}

function _plog_msg($argsArray) {
	$str = "";
	$app = "";
	foreach( $argsArray as $a ) {
		$str .= $app . psprint($a);
		$app = " ";
	}
	return $str;
}

function plog_error() {
	$msg = _plog_msg(func_get_args());
	__plog($msg, LOG_LEVEL_ERROR);
}

function plog_exception() {
	$msg = _plog_msg(func_get_args());
	__plog($msg, LOG_LEVEL_ERROR);
}

function plog_info() {
	$msg = _plog_msg(func_get_args());
	__plog($msg, LOG_LEVEL_INFO);
}

function plog_debug() {
	$msg = _plog_msg(func_get_args());
	__plog($msg, LOG_LEVEL_DEBUG);
}

function plog_warning() {
	$msg = _plog_msg(func_get_args());
	__plog($msg, LOG_LEVEL_WARNING);
}

function __plog($msg, $level) {
	if ($level <= LOG_LEVEL) {
        //printf("%s: %s \n", date('Y-m-d H:i:s'), $msg );
		$fp = fopen(LOG,"at");
		fwrite($fp, sprintf("%s: %s \n", date('Y-m-d H:i:s'), $msg ) );
		fclose($fp);
	}
}



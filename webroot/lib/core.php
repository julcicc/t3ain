<?php
session_start();

define('GETVAR_STRING','string');
define('GETVAR_INT','int');
define('GETVAR_DOUBLE','double');

function getvar($name, $type=GETVAR_STRING) {
	if (isset($_REQUEST[$name])) {
		
		if (is_array($_REQUEST[$name])) {
			return $_REQUEST[$name];
		}
		else {
			if (get_magic_quotes_gpc()) {
				$val = stripslashes(utf8_decode($_REQUEST[$name]));
			}
			else {
				$val = utf8_decode($_REQUEST[$name]);
			}
			switch ($type) {
				case GETVAR_INT: return intval($val);
				case GETVAR_DOUBLE: return doubleval($val);
				default: return $val;
			}
		}
	}
	else {
		switch ($type) {
			case GETVAR_INT: return 0;
			case GETVAR_DOUBLE: return 0;
			default: return null;
		}
	}
}

function getsession($name) {
	if (isset($_SESSION[$name])) {
		return $_SESSION[$name];
	}
	return null;
}

function putsession($name, $value) {
	$_SESSION[$name] = $value;
}

function delsession($name) {
	unset($_SESSION[$name]);
}


function error_page($msg) {
	if (!headers_sent()) header("HTTP/1.1 500 Internal Server Error");
	echo "<h1>Internal Server Error</h1>";
	echo $msg;
	exit;
}

// error handler function
function core_error_handler($errno, $errstr, $errfile, $errline){
	if (!(error_reporting() & $errno)) {
		// This error code is not included in error_reporting
		return;
	}

	$msg = "Error [$errno] $errstr. On line $errline in file $errfile";
	switch ($errno) {
		case E_USER_ERROR:
			plog_error($msg);
			break;
		case E_USER_WARNING:
			plog_warning($msg);
			break;
		case E_USER_NOTICE:
			plog_info($msg);
			break;
		default:
			plog_error($msg);
			break;
	}

	error_page("PHP Error (see logs)");
	/* Don't execute PHP internal error handler */
	return true;
}

function core_exception_handler($ex) {
	plog_exception($ex);;
	error_page("PHP Exception (see logs)");
	/* Don't execute PHP internal error handler */
	return true;
}

set_error_handler("core_error_handler");
set_exception_handler('core_exception_handler');

function uencode($str) {
	if (!is_utf8($str)) return utf8_encode($str);
	else return $str;
}

function udecode($str) {
	if (!is_utf8($str)) return $str;
	else return ut8_decode($str);	
}

function is_utf8($str) {
        // From http://w3.org/International/questions/qa-forms-utf-8.html 
        return preg_match('%^(?: 
                              [\x09\x0A\x0D\x20-\x7E]            # ASCII 
                              | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte 
                              |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs 
                              | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte 
                              |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates 
                              |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3 
                              | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15 
                              |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16 
                             )*$%xs', $str);
}

function getlocalconfig($name) {
	global $LOCALCONFIG;
	if (!isset($LOCALCONFIG) || !is_array($LOCALCONFIG)) {
		throw new Exception ("LOCALCONFIG is not setted!");
	}
	
	if (!isset($LOCALCONFIG[$name])) {
		throw new Exception("Local config var $name is not setted!");
	}
	
	return $LOCALCONFIG[$name];
}

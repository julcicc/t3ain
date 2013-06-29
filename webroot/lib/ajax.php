<?php

function ajax_process() {

	$call = getvar('call');
	if (!$call) {
		plog_error("Unsupplied call argument in ajax connection");
		error_page("Unsupplied call");
	}

	$parts = explode('.', $call);
	$n = count($parts);
	
	$fun = $parts[$n-1];
	$ajax_module = implode('.', array_slice($parts, 0, $n-1));

	require_once library($ajax_module, "ajax");
	if (!function_exists($fun)) {
		plog_error("Invalid call argument (function not found). Value:", $call);
		error_page("Invalid call");
	}

	$value = $fun();
	
	$type = getvar('type');
	if ($type=='html') {
		header( 'content-type: text/html; charset=ISO-8859-15' );
		echo $value;
		
	}
	else {
		header( 'content-type: text/plain; charset=ISO-8859-15' );
		echo json_encode($value);
	}
}


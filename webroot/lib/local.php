<?php

function format_price($value) {
	return number_format($value, 2, ",", ".");
}

function format_weight($value) {
	return number_format($value, 2, ",", ".") . " g.";
}

$MONTHS = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio"
					,"Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
					
$DAYS = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");

function _month_long($month) {
	global $MONTHS;
	return $MONTHS[intval($month)];
}

function _month_short($month) {
	global $MONTHS;
	return substr($MONTHS[intval($month)],3);
}

function _day_long($weekDay) {
	global $DAYS;
	return $DAYS[intval($weekDay)];
}

function _day_short($weekDay) {
	global $DAYS;
	return substr($DAYS[intval($weekDay)],3);
}

function format_datetime($value) {
	$tm = strtotime($value);
	return sprintf("%s %s %s %s"
	, date("d", $tm), _month_long(date("m", $tm)), date("Y", $tm)
	, date("H:i", $tm));
}

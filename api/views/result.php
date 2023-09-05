<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Cache-Control: cache, must-revalidate");
header('Content-Type:text/json; charset=UTF-8');
header("Pragma:cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
ini_set('display_errors', 'On');
error_reporting(E_ALL);

print $res;
//print_r(json_encode($res));
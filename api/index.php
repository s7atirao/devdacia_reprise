<?php  
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Cache-Control: cache, must-revalidate");
header('Content-Type:text/json; charset=UTF-8');
header("Pragma:cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cle='6f3c13e95a133248c5def89213f942db8913de6a';
$token='f2f0731988f8d8104f037d82382f148f';
$header = [ "x-api-key: $cle", 'Content-Type: application/json'];
$db = new PDO('mysql:host=localhost;dbname=mautonet_succursa_web','mautonet_web','2teI~GwcR0Gl');
if(!isset($_GET['endpoint'])|| empty($_GET['endpoint'])){
	http_response_code(404);
	require __DIR__ . '/views/forbiden.php';
}else{
	switch ($_GET['endpoint']) {
		case 'marques':getMarks();break;
		case 'modeles':getMarks($_GET['marque']);break;
		case 'versions':getVersions();break;
		case 'price':$res = getPrices();break;
		default:http_response_code(404);require __DIR__ . '/views/forbiden.php';break;
	}
}

function getMarks($marque=''){
	global $db;
	$sql  = "select * from marques";
	if($marque){
		$sql  = "select * from versions where mark_id like ".$marque;
	}
	$versions= $db->query($sql,PDO::FETCH_OBJ)->fetchAll();
	print_r(json_encode($versions));die;
}
function getVersions(){
	$arr=array();
	$arr[0]['id']=1;
	$arr[0]['libelle']='autre';
	print json_encode($arr);
}
function getPrices(){
	$arr=array();
	$arr['price']=0;
	print  json_encode($arr);
	return false;
	global $token;
	global $header;
	$link = 'https://api.moteur.ma/quote/car/price?t='.$token;
	$data = [ 
		"version" 	=>  $_GET['version'],
		"token" 	=> 	$_GET['vtoken']
	];

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $link,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_HTTPHEADER =>   $header
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	print_r($response);

}
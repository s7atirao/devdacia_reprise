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
	global $token;
	global $header;
	$link = "https://api.moteur.ma/ws/used/mm?t=$token";
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $link,
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_FOLLOWLOCATION => true, 
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_SSL_VERIFYPEER => false, 
		CURLOPT_HTTPHEADER =>   $header
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	print_r($response);
	curl_close($curl);


}
#date_mec=2016&genre=1&marque=77&energie=2&modele=863
function getVersions(){
	global $token;
	global $header;
	$link = "https://api.moteur.ma/quote/car/versions?t=$token";
	$data = [ 
		"mark_id" 	=>   $_GET['marque'],
		"model_id" 	=>  $_GET['modele'],
		// "mark" 		=>  "renault",
		// "model"		=>	"megane", 
		"year" 		=>  $_GET['date_mec'],
		"fuel"		=>  $_GET['energie'],
		"box" 		=>  $_GET['bav'], 
		"cv" 		=>  6,
		"km" 		=>  $_GET['km']
	]; 
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $link,
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTPHEADER =>   $header
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	//return $response;
	$response= json_decode($response);

	$versions = array();
	foreach($response->versions as $version){
		$versions[]['version'] = $version;
	}
	print_r(json_encode(array('versions'=>$versions,'vtoken'=>$response->token)));
}
function getPrices(){
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
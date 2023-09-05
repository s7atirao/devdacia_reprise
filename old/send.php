<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new PDO('mysql:host=localhost;dbname=preprodr_rsucc2019','preprodr_sucuser','TC)(Yg%B-1Dq');
$conn->exec("SET CHARACTER SET utf8");
$inputData=json_decode(file_get_contents("php://input"));
if (isset($inputData->nom)) {
	$datas = [
		'id' =>null,
		'nom'=>$inputData->nom,
		'prenom'=>$inputData->prenom,
		'telephone'=>$inputData->telephone,
		'email'=>$inputData->email,
		'source'=>'',//$_GET['utm_source'],
		'campaign'=>'',//$_GET['utm_campaign'],
		'content'=>'',//$_GET['utm_content'],
		'ip'=>$_SERVER['REMOTE_ADDR'],
		'marque'=>$inputData->marque,
		'modele'=>$inputData->modele,
		'version'=>$inputData->version,
		'description'=>$inputData->description,
		'annee'=>$inputData->annee,
		'immatriculation'=>$inputData->immatriculation,
		'kilometrage'=>$inputData->kilometrage,
		'carburant'=>$inputData->carburant,
		'bav'=>$inputData->bav,
		'propriete'=>$inputData->propriete,
		'carrosserie'=>$inputData->carrosserie,
		'pneus'=>$inputData->pneus,
		'ville'=>$inputData->ville,
		'brand'=>'Dacia'
	];
	$sql = "INSERT INTO reprise (id,nom,prenom,telephone,email,source,campaign,content,ip,marque,modele,annee,immatriculation,kilometrage,carburant,bav,propriete,ville,brand,carrosserie,pneus,version,description) VALUES (:id,:nom,:prenom,:telephone,:email,:source,:campaign,:content,:ip,:marque,:modele,:annee,:immatriculation,:kilometrage,:carburant,:bav,:propriete,:ville,:brand,:carrosserie,:pneus,:version,:description)";
	$stmt= $conn->prepare($sql);
	$res = $stmt->execute($datas);	
	print 'true';
}


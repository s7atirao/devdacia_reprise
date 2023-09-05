<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//$conn = new PDO('mysql:host=localhost;dbname=preprodr_rsucc2019','preprodr_sucuser','TC)(Yg%B-1Dq');
$conn = new PDO('mysql:host=localhost;dbname=succursa_web','succursa_web','!0yB*RpVfR%K');
//$conn = new PDO('mysql:host=localhost;dbname=succr','root','root');
$conn->exec("SET CHARACTER SET utf8");
$inputData=json_decode(file_get_contents("php://input"));
$to = $inputData->telephone;
$prix = $inputData->prixestime;
$prix = $prix-($prix/100)*15;
//$message = "La valeur estimative de votre véhicule est de ".$prix." Dhs, notre conseiller va prendre contact avec vous pour expertise et validation de prix. Bénéficiez d'un bonus reprise de 8000 Dhs en appelant le 0520482002. Stopit.ma";
$message = "Bonjour, Merci pour votre confiance, notre conseiller va prendre contact avec vous pour expertise et validation de prix";
if($prix){
	$url = 'http://plateformesms.itmobility.ma//sms_web/smsenvoi.php?log=renaultmaroc&mp=apirenault&ndest='.$to.'&message='.urlencode($message).'&id=1111&dcs=0&shortcode=SuccRenault';
	file_get_contents($url);
}

// https://plateformesms.itmobility.ma/sms_web/smsenvoi.php?log=renaultmaroc&mp=apirenault&ndest=0661119750&message=test&id=1111&dcs=0&shortcode=SuccRenault


if (isset($inputData->nom)) {
	$datas = [
		'id' =>null,
		'nom'=>$inputData->nom,
		'prenom'=>$inputData->prenom,
		'telephone'=>$inputData->telephone,
		'email'=>$inputData->mail,
		'source'=>'',//$_GET['utm_source'],
		'campaign'=>'',//$_GET['utm_campaign'],
		'content'=>'',//$_GET['utm_content'],
		'ip'=>$_SERVER['REMOTE_ADDR'],
		'marque'=>$inputData->marque,
		'modele'=>$inputData->modele,
		'version'=>$inputData->version,
		'description'=>isset($inputData->description)?$inputData->description:'',
		'annee'=>$inputData->annee,
		'immatriculation'=>$inputData->immatriculation,
		'kilometrage'=>$inputData->kilometrage,
		'prixestime'=>$prix,
		'carburant'=>$inputData->carburant,
		'bav'=>$inputData->bav,
		'propriete'=>$inputData->propriete,
		'carrosserie'=>$inputData->carrosserie,
		'pneus'=>$inputData->pneus,
		'ville'=>$inputData->ville,
		'palteforme'=>$inputData->palteforme,
		'brand'=>'Dacia'
	];

	$sql = "INSERT INTO reprise (id,email,nom,prenom,telephone,prixestime,source,campaign,content,ip,marque,modele,annee,immatriculation,kilometrage,carburant,bav,propriete,ville,brand,carrosserie,pneus,version,description,palteforme) VALUES (:id,:email,:nom,:prenom,:telephone,:prixestime,:source,:campaign,:content,:ip,:marque,:modele,:annee,:immatriculation,:kilometrage,:carburant,:bav,:propriete,:ville,:brand,:carrosserie,:pneus,:version,:description,:palteforme)";
	$stmt= $conn->prepare($sql);
	$res = $stmt->execute($datas);	

	// Email Brochure
	if($prix){
		$to = $inputData->mail;
		$nom = $inputData->nom.' '.$inputData->prenom;
		$subject = 'Votre Reprise';
		$msg = "<body style='margin: 10px; font-family: Verdana, Geneva, sans-serif; font-size: 11px;'>
		<div style='width: 600px;'>
		<p>Bonjour ".$nom.",</p><br />
		<p>
		Nous vous remercions d’avoir demandé une estimation de votre véhicule. Vous pouvez bénéficier d’un bonus à la reprise de 8000 DHS.
		</p>
		<p>
		N.B : notre conseiller va prendre contact avec vous pour expertise et validation de prix
		La valeur réelle vous sera communiquée après expertise dans nos locaux. 
		</p>
		<p>
		Prenez Rendez-vous avec un de nos conseillers sur le 0520 48 2002. 
		Succursales Renault</p>

		<p style=\"color:gray;line-height:2px;\">Renault Maroc - Succursales</p>
		<p style=\"color:gray;line-height:2px;\">T&eacute;l : 05 20 48 20 02</p>
		</div>
		</body>";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'To: '.$nom.' <'.$to.'>' . "\r\n";
		$headers .= 'From: Renault Maroc - Succursales <contact@succursalesrenault.ma>' . "\r\n";
		$headers .= 'Bcc: hamdan@pyxicom.com' . "\r\n";
		mail($to, $subject, $msg, $headers);
	}
	print 'true';
}


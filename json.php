<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

$saldo = "https://api.digiflazz.com/v1/cek-saldo";

$fields['cmd']="deposit";
$fields['username']="rorazaoEQ5xo";
$fields['sign']="dev-08ceccb0-572e-11ec-91c4-85d2e994b59b";

echo json_encode(json_request($saldo,$fields));


function json_request($fullurl,$fields)
{
		
		$jsonnya = json_encode($fields);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FAILONERROR, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_URL, $fullurl);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonnya);
		$returned =  curl_exec($ch);
	
		return(json_decode($returned));
}

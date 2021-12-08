<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

echo "xxxxxx";
$fields = json_decode(file_get_contents('php://input'));

//var_dump($_POST);

$url = $json['url'];
unset($json['url']);

//echo json_encode(json_request($url,$fields));
var_dump($fields);


//echo json_encode($fields);


function json_request($fullurl,$fields)
{
		
		$jsonnya = json_encode($fields);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FAILONERROR, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, $fullurl);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonnya);
		$returned =  curl_exec($ch);
	
		return(json_decode($returned));
}

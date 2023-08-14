<?php

use App\Requests\Request;
use GuzzleHttp\Client;

require_once '../vendor/autoload.php';

$server='0039';
$client = new Client(['verify' => false]);
$headers = ['headers'=>['wolkvox-token'=>'7b69645f6469737472697d2d3230323130323138313634353034']];
$res = $client->request('GET','https://wv'.$server.'.wolkvox.com/api/v2/billing.php?api=chat_licenses',$headers);
var_dump(json_decode($res->getBody()->getContents()));
// $request = new Request();
// $request->handler();
// include('../App/Views/Invoice.php');

?>
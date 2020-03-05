<?php
declare(strict_types=1);
require_once('../config/minterapi/vendor/autoload.php');
use Minter\MinterAPI;
use Minter\SDK\MinterTx;
use Minter\SDK\MinterCoins\MinterMultiSendTx;

function getBlockByHash ($api, $hash)
{
    $api = new MinterAPI($api);
    return $api->getTransaction($hash);
}

$api = 'API-NODE';
$hash = "0xBCAEC4A920F1EFB5B6D163D57660EF50A7630AB3B20A4B797C8EACC33BFCF055"; //for an example

//---------------------------- Блок
$block = getBlockByHash($api, $hash)->result->height;
//---------------------------- Отправитель
$tx_from = 'tx.from';
$from = getBlockByHash($api, $hash)->result->tags->$tx_from;
$from = 'Mx' . $from;
//---------------------------- Получатель
$tx_to = 'tx.to';
$To = getBlockByHash($api, $hash)->result->tags->$tx_to;
$To = 'Mx' . $To;
//---------------------------- Payload
$payload = getBlockByHash($api, $hash)->result->payload;

// {"type":0,"img":5,"hash":"0xBCAEC4A920F1EFB5B6D163D57660EF50A7630AB3B20A4B797C8EACC33BFCF055"}

$payload = base64_decode($payload);
$decode_payload_hash = json_decode($payload,true);

$TypeHash = $decode_payload_hash['type'];
$ImgHash = $decode_payload_hash['img'];
$CreateHash = $decode_payload_hash['hash'];
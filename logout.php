<?php
include 'vendor/autoload.php';
use Hybridauth\Hybridauth;
use Hybridauth\HttpClient;

use Hybridauth\Storage\Session;

session_start();


$config = [
    'callback' => HttpClient\Util::getCurrentUrl(),
    'providers' => [
        'Line' => [
            'enabled' => true,
            'keys'    => [ 'id' => 'xxx', 'secret' => 'xxx'],
        ],
    ],
];

$hybridauth = new Hybridauth($config);
$adapters = $hybridauth->getConnectedAdapters();

if ($adapters){

$user = $adapters['Line']->disconnect();


}else{
print("Not login");
}


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
            'keys'    => [ 'id' => '', 'secret' =''],
        ],
    ],
];

$hybridauth = new Hybridauth($config);
$adapters = $hybridauth->getConnectedAdapters();

if ($adapters){

$storage = new Session;
$token = $storage->get("access_token");
print($token);

$user = $adapters['Line']->getUserProfile();

print_r($user);

}else{
print("Not login");
}


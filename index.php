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
try {    
    $hybridauth = new Hybridauth( $config );
    $adapter = $hybridauth->authenticate( 'Line' );
    $tokens = $adapter->getAccessToken();
    $userProfile = $adapter->getUserProfile();
    print_r( $tokens );
    print_r( $userProfile );

    $storage = new Session;
    $storage->set("access_token",$tokens["access_token"]);

header("Location: view.php");
die();
}
catch (\Exception $e) {
    echo $e->getMessage();
}

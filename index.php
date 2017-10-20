<?php
require_once 'vendor/autoload.php';

use JsonRPC\Client;

if ($_GET['info'] ?? false) {
    phpinfo();
} else {
    // here set up balanced nginx
    $client = new Client('http://web:1080/');
    $http = $client->getHttpClient()
                   ->withDebug()
                   ->withHeaders(['Host: service']);

    try {
        $result = $client->execute('addition', [3, 5]);
    } catch (Exception $e) {
        // debug info is disgusting
        var_dump($e);
    }
    var_dump($result);
}



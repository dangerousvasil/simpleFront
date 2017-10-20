<?php
require_once 'vendor/autoload.php';

use JsonRPC\Client;

if ($_GET['info'] ?? false) {
    phpinfo();
} else {
    $appConfig = '/etc/application/config.ini';
    $conf = parse_ini_file($appConfig, true);

    var_dump($conf);

}



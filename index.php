<?php

if ($_GET['info'] ?? false) {
    phpinfo();
} else {
    $appConfig = '/etc/application/config.ini';
    $conf = parse_ini_file($appConfig, true);

    $serviceHost = $conf['application']['service.host'][0];

    // 1. инициализация
    $ch = curl_init();

    // 2. устанавливаем опции, включая урл
    curl_setopt($ch, CURLOPT_URL, 'http://' . $serviceHost);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);

    $header[] = "Host: service";
    @curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    // 3. выполнение запроса и получение ответа
    $output = curl_exec($ch);

    var_dump($output);
    // 4. очистка ресурсов
    curl_close($ch);

}



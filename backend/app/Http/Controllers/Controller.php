<?php

namespace App\Http\Controllers;

abstract class Controller {
    private $serverUrl = 'browser';

    protected function curlRequest($url, $post = []) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Устанавливаем параметр, чтобы curl возвращал данные, вместо того, чтобы выводить их в браузер.
        curl_setopt($ch, CURLOPT_URL, $url);

        if ($post) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
        }

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        //curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 1);
        //curl_setopt($ch, CURLOPT_LOW_SPEED_TIME, 1);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function sendRequest($data) {
        $ch = curl_init($this->serverUrl);

        $jsonData = json_encode($data);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData),
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
}

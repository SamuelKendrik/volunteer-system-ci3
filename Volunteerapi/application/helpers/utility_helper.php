<?php

function curl($method, $host, $data, $header = array('Content-Type: application/x-www-form-urlencoded'))
{

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $host,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false
    ));
    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
}

function graph($method, $uri, $arr = array())
{

    $header = array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode(config_item('lms_mail_client') . ':' . config_item('lms_mail_secret')),
    );

    $data = NULL;
    if ($result = curl($method, config_item('lms_mail_host') . $uri, json_encode($arr), $header)) {
        $data = json_decode($result);
    }
    return $data;
}

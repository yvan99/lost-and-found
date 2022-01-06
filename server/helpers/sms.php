<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/lost-and-found/server/core/init.php';

## SEND SMS MESSAGE USING INTOUCH SMS API
function sendSms($recepients,$message)
{
    $data = array(
        "sender"     => "", // Enter sender names
        "recipients" => $recepients, // Recepients array
        "message"    => $message,  // SMS contents
    );

    $url      = "https://www.intouchsms.co.rw/api/sendsms/.json";
    $data     = http_build_query($data);
    $username = "Nikita"; // Acount username
    $password = "nikita123+"; // Account passwprd
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $httpResponse = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($httpResponse != 200) {
        # if http response is not success...
        return $httpResponse.'SMS system error ,SMS not send';
        exit;
    }
    else{
        return $result;
    }

}

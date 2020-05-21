<?php

require __DIR__ . '/twilio-php-master/src/Twilio/autoload.php';

use Twilio\Rest\Client;

if (isset($_GET["id"]) && isset($_GET["token"]) && isset($_GET["body"]) && isset($_GET["from"]) && isset($_GET["to"])) {
    $sid    = $_GET["id"];
    $token  = $_GET["token"];
    $twilio = new Client($sid, $token);

    $to = $_GET['to'];
    $from = $_GET['from'];
    $body = $_GET['body'];

    $message = $twilio->messages
        ->create(
            "whatsapp:+" . $to,
            array(
                "from" => "whatsapp:+" . $from,
                "body" => $body
            )
        );
    echo 'Message Send...';
} else {
    echo "There is no request yet! Copy this link(webhook) and make an HTTP Get Request from your device.";
}

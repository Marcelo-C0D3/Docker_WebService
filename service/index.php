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
    $a = 'Message Send...';
} else {
    $a = "There is no request yet! Copy this link(webhook) and make an HTTP Get Request from your device.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        p {
            color: white;
            font-size: 10px;
        }

        .center {
            display: block;
            margin: 0 auto;
        }

    </style>
</head>

</html>

<html>

<head>
    <style>
        body {
            background-color: black;
        }

        h1 {
            color: white;
            font-size: 100px;
            text-align: center;
        }
        h2 {
            color: red;
            font-size: 80px;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>Radio Monitoring WebService</h1>
    <h1> WebHook</h1>
    <h2> <?=$a?></h2>

</body>

</html>
<?php
require_once "vendor/autoload.php";

$google_client = new Google_Client();

$google_client->setClientId('359168896513-sssl55t9h7074b6bpm176276cq5ielon.apps.googleusercontent.com');

$google_client->setClientSecret('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');

$google_client->setRedirectUri('http://localhost:80/tallersoftware/index.php?c=Sesion&a=ApiGoogle');

$google_client->addScope('email');

$google_client->addScope('profile');

?>

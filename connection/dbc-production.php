<?php
    $host = 'shoelogger.db.4930530.113.hostedresource.net';
    $password = 'LogMySteps0!';
    $user = 'shoelogger';
    $db = 'shoelogger';

    $mysqli = new mysqli($host, $user, $password, $db);

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }

    $mysqli -> query("SET NAMES 'utf8'");
?>
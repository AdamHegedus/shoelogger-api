<?php
    $host = '';
    $password = '';
    $user = '';
    $db = '';

    $mysqli = new mysqli($host, $user, $password, $db);

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    }

    $mysqli -> query("SET NAMES 'utf8'");
?>
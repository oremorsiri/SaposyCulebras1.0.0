<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'saposyculebras';

    try {
        $connection = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $error) {
        die('Connection Failed: ' . $error->getMessage());
    }

?>
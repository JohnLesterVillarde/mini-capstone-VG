<?php

$host = 'localhost';
$user = 'root';
$password = '1234';
$database = 'villardegodacadb';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die('connection failed ' . mysqli_connect_error());
}
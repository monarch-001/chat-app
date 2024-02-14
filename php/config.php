<?php

$host = 'localhost';
$port = 3306;
$dbName = 'chat';
$dbUserName = 'root';
$dbPassword = '';

// $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", "$dbUserName", "$dbPassword");
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn = mysqli_connect("localhost", "root", "", "chat");

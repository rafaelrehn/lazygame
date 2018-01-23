<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baianogame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//definicoes entrada de dados
ini_set('default_charset', 'utf-8');
$conn->query("SET NAMES utf8");


?>
<?php
$hostname = "localhost";
$database = "clientes";
$username = "root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);
if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

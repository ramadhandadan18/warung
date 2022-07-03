<?php
// include "function.php";
include_once("function.php");

$server = "localhost";
$username = "root";
$password = "";
$database = "db_warung";

$mysqli = new mysqli($server, $username, $password, $database);

if ($mysqli === false) {
    die("Maaf, Gagal Konek ke Database" .  $mysqli->connect_error);
}
return $mysqli;

// $db_host = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_name = "db_warung";

// try {
//     //create PDO connection 
//     $mysqli = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
// } catch (PDOException $e) {
//     //show error
//     die("Terjadi masalah: " . $e->getMessage());
// }

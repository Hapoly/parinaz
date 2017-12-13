<?php

/* ================= Database connection ======================= */
$servername = "localhost";
$username = "root";
$password = "1996";
$dbname = "parinaz";

// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->exec("SET NAMES utf8");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* ================= Site configs ============================== */
define('URL', 'http://localhost/parinaz/'); 
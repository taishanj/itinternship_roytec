<?php
// Database connection details (replace with your own)
$host = "localhost";
$dbname = "sellersmarkt";
$username = "root";
$password = "";

// Create connection using PDO
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Set error mode to exceptions
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

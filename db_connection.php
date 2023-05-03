<?php
$servername = "localhost";
$username = "root";
$password = ""; // Remove the space between the quotes
$dbname = "SPD_Database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
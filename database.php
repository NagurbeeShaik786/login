<?php
$servername = "localhost";
$username = "root"; // Change if different
$password = "";     // Change if a password is set
$dbname = "userdb"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

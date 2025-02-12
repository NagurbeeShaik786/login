<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.html");
    exit();
}

echo "<h1>Welcome to the Dashboard!</h1>";
echo "<a href='logout.php'>Logout</a>";
?>

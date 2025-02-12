<?php
require_once "database.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user["id"]; // Store user ID in session
        header("Location: landing_page.php"); // Redirect to dashboard
        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password.</div>";
    }
}
?>

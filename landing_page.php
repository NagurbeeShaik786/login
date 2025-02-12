<?php
session_start();
require_once "database.php";

if (!isset($_SESSION["user"])) {
    header("Location: login.html");
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION["user"];
$sql = "SELECT firstname, lastname, phone, email, gender, address FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<div class='alert alert-danger'>User not found.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Landing Page</title>
    <link rel="stylesheet" href="landing.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Welcome, <?php echo htmlspecialchars($user['firstname']); ?>!</h1>
            <div class="details">
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['firstname']); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['lastname']); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
            </div>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>
</html>

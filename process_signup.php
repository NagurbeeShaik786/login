<?php
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $gender = trim($_POST["gender"]);
    $address = trim($_POST["address"]);
    $password = trim($_POST["password"]);

    $errors = [];

    // Password validation
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $errors[] = "Password must contain at least 8 characters, one uppercase, one lowercase, one special character, and one number.";
    }

    // Check for existing email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $errors[] = "Email already exists.";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Insert the user into the database
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (firstname, lastname, phone, email, gender, address, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $firstname, $lastname, $phone, $email, $gender, $address, $passwordHash);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Registration successful!</div>";
            header("Location: login.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}
?>

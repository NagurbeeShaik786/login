<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glassmorphism Registration Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <div class="glass-card">
            <h2>Register</h2>
            <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordconfirm = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
            ?>
            <form method="post" action="">
                <div class="input__box">
                    <input type="text" name="fullname" placeholder="Full Name" required>
                </div>
                <div class="input__box">
                    <input type="text" name="lastname" placeholder="Last Name" required>
                </div>
                <div class="input__box">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input__box">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input__box">
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
                </div>
                <div class="input__box">
                    <input type="submit" name="submit" value="Register">
                </div>
            </form>
            <p class="signin">Already have an account? <a href="login.html">Sign in</a></p>
        </div>
    </div>
</body>
</html>

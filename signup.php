<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <section>
        <div class="colour"></div>
        <div class="colour"></div>
        <div class="colour"></div>
        <div class="box">
            <div class="square" style="--i: 0"></div>
            <div class="square" style="--i: 1"></div>
            <div class="square" style="--i: 2"></div>
            <div class="square" style="--i: 3"></div>
            <div class="square" style="--i: 4"></div>
            <div class="container">
                <div class="form">
                    <h2>Sign Up Form</h2>
                    <form method="post" action="process_signup.php">
                        <div class="input__box">
                            <input type="text" name="firstname" placeholder="First Name" required>
                        </div>
                        <div class="input__box">
                            <input type="text" name="lastname" placeholder="Last Name" required>
                        </div>
                        <div class="input__box">
                            <input type="text" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="input__box">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="input__box">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="input__box">
                            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                        </div>
                        <div class="input__box">
                            <select name="gender" required style="width: 100%; padding: 10px 20px; background: rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.5); border-radius: 35px; color: #fff;">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="input__box">
                            <textarea name="address" placeholder="Address" rows="4" required style="width: 100%; padding: 10px 20px; background: rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.5); border-radius: 10px; color: #fff;"></textarea>
                        </div>
                        <div class="input__box">
                            <input type="submit" name="submit" value="Sign Up">
                        </div>
                    </form>
                    <p class="signin">
                        Already have an account? <a href="login.php">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

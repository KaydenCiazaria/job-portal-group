<?php
session_start();
include_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gradient Background with Sticky Bottom Bar</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom, white, #C0E4EC);
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .content {
        width: auto;
        max-width: 400px;
        background-color: white;
        padding: 25px;
        border-radius: 0px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    .user-type {
        width: 50%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .box {
        position: relative;
        width: 300px;
        height: 50px;
        background-color: #DDD7D7;
        margin-bottom: 20px;
        border-radius: 0px; /* Removed border-radius from .box */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .user-type {
        width: 50%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    #employer, #jobSeeker {
        background-color: #DDD7D7;
    }

    .user-type.active {
        background-color: #2980b9;
        color: black;
    }

    .box span {
        position: absolute;
        left: 0px;
        top: -17px;
        font-size: 12px;
    }

    .box:last-child {
        width: 100px;
        margin-right: auto;
    }

    .logo {
        width: 90px;
        height: 90px;
        align-self: center;
        margin-bottom: 30px;
    }

    .footer {
        display: flex;
        justify-content: flex-start;
        width: 100%;
        background-color: white;
        color: black;
        text-align: center;
        position: fixed;
        bottom: 0;
        padding: 10px 20px;
    }

    .footer span {
        margin-left: 10px;
        margin-right: 15px;
        font-weight: bold;
    }

    .signup {
        text-decoration: none;
        color: #3498db;
        cursor: pointer;
    }

    .signup-text {
        position: absolute;
        bottom: -105px;
    }

    .signup:hover {
        text-decoration: underline;
    }

    .login-button {
        width: 100px;
        margin-top: 0px;
        height: 30px;
        margin-right: auto;
        background-color: #DDD7D7;
        color: white;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        position: relative;
    }

    .login-button:hover {
        background-color: #2980b9;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }

    .login-button .login-text {
        color: black;
        position: relative;
        top: 0%;
        transform: translateY(-50%);
    }

    .box input[type="email"],
    .box input[type="password"] {
        width: calc(100% - 20px);
        padding: 5px;
        border: none;
        border-radius: 5px;
        background-color: #DDD7D7;
        box-sizing: border-box;
    }

    .radio-buttons {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    input[type="radio"] {
        display: none;
    }

    input[type="radio"]:checked + label {
        background-color: #ABF0FF;
    }

    label {
        width: 50%;
        text-align: center;
        padding: 15px 10px;
        border-radius: 0; /* Remove general border-radius */
        cursor: pointer;
        background-color: #DDD7D7;
        margin-bottom: 0; /* Remove margin */
    }

    /* Add specific border-radius for individual labels */
    #employer + label {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    #jobSeeker + label {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .error-message {
        color: red;
        margin-bottom: 10px;
    }
</style>
</head>
<body>

<div class="content">
    <img src="Joblook_logo.jpeg" alt="Logo" class="logo">

    <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials'): ?>
        <div class="error-message">Invalid email or password. Please try again.</div>
    <?php endif; ?>

    <form action="process_login.php" method="post">
        <div class="box">
            <div class="radio-buttons">
                <input type="radio" id="employer" name="userType" value="employer" required>
                <label for="employer">Employer</label>
                <input type="radio" id="jobseeker" name="userType" value="jobseeker" required>
                <label for="jobseeker">Job Seeker</label>
            </div>
        </div>

        <div class="box">
            <span>Email Address:</span>
            <input type="email" id="emailInput" name="email" required>
        </div>

        <div class="box">
            <span>Password:</span>
            <input type="password" id="passwordInput" name="password" required>
        </div>

        <button type="submit" class="login-button">
            <span class="login-text">Log In</span>
        </button>
    </form>

    <p class="signup-text">Don't have an Account? <a href="Register-Page-Option.html" id="signupButton" class="signup">Sign up</a></p>
</div>

<div class="footer">
    <span>Terms & Conditions</span>
    <span>Privacy</span>
    <span>About Us</span>
    <span>Contact Us</span>
</div>

</body>
</html>
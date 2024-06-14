<?php
session_name('jobseeker_session');
session_start();
include_once('config.php');
if (isset($_POST["registerButton"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $fullname = $firstname . ' ' . $lastname;

        $countrycode = isset($_POST['countrycode']) ? $_POST['countrycode'] : '';
        $phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '';

        $day = isset($_POST['day']) ? $_POST['day'] : '';
        $month = isset($_POST['month']) ? $_POST['month'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $birthday = $year . "-" . $month . "-" . $day;

        $university = isset($_POST['university']) ? $_POST['university'] : '';
        $degree = isset($_POST['degree']) ? $_POST['degree'] : '';
        $major = isset($_POST['major']) ? $_POST['major'] : '';

        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Check if email already exists
        $check_query = "SELECT * FROM jobseeker WHERE jobseeker_email='$email'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            // Email already exists
            echo "Email is already used by another user. Please choose another email to register.";
        } else {
            // Insert new jobseeker data into the database
            $insert_query = "INSERT INTO jobseeker (jobseeker_fullname, jobseeker_countrycode, jobseeker_phonenumber, jobseeker_birthday, jobseeker_university, jobseeker_degree, jobseeker_major, jobseeker_email, jobseeker_password) VALUES ('$fullname', '$countrycode', '$phonenumber', '$birthday', '$university', '$degree', '$major', '$email', '$password')";
            
            if ($conn->query($insert_query) === TRUE) {
                $_SESSION['fullname']= $fullname;
                $_SESSION['countrycode']= $countrycode;
                $_SESSION['phonenumber']= $phonenumber;
                $_SESSION['email']= $email;
                $_SESSION['password']= $password;
                $_SESSION['major'] = $major;
                $_SESSION['university'] = $university;
                header("Location: dashboard-jobseeker.php");
                exit();
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<title>Gradient Background with Sticky Bottom Bar</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom, white, #C0E4EC);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .content-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex: 1;
    }
    .content {
        width: 100%;
        max-width: 600px;
        background-color: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 100px;
        margin-bottom: 20px; /* Space between content box and "Already have an account" text */
    }

    .box {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .box span {
        width: 25%;
        font-size: 14px;
    }

    .box .input-group {
        width: 75%;
        display: flex;
    }

    .box .input-group input, .box input[type="text"], .box input[type="email"], .box input[type="password"] {
        width: 70%;
        margin-left: 10px;
        border: 1px solid #DDD7D7;
        background: #DDD7D7;
        outline: none;
        padding: 10px;
        border-radius: 5px;
    }

    .box .input-group input.small {
        width: 30%;
    }

    .logo {
        width: 120px;
        height: 120px;
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
        text-align: center;
        margin-bottom: 5px;
    }

    .signup:hover {
        text-decoration: underline;
    }

    .register-button {
    display: block; /* Change to block for centering */
    width: 200px;
    height: 40px;
    margin: 20px auto 0 auto; /* Center horizontally and add top margin */
    background-color: #DDD7D7;
    color: black;
    text-align: center;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    line-height: 40px;
    }

    .register-button:hover {
        background-color: #2980b9;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }

</style>
</head>
<body>

<div class="content-wrapper">
    <div class="content">
        <img src="Joblook_logo.jpeg" alt="Logo" class="logo">

        <form method="post">
            <div class="box">
                <span>Name:</span>
                <div class="input-group">
                    <input type="text" name="firstname" placeholder="First Name">
                    <input type="text" name="lastname" placeholder="Last Name" style="margin-left: 10px;">
                </div>
            </div>

            <div class="box">
                <span>Phone:</span>
                <div class="input-group">
                    <input type="text" name="countrycode" placeholder="Country Code" class="small">
                    <input type="text" name="phonenumber" placeholder="Phone Number" style="width: 65%; margin-left: 10px;">
                </div>
            </div>

            <div class="box">
                <span>Birthday:</span>
                <div class="input-group">
                    <input type="text" name="day" placeholder="Day" class="small">
                    <input type="text" name="month" placeholder="Month" class="small" style="margin-left: 10px;">
                    <input type="text" name="year" placeholder="Year" class="small" style="margin-left: 10px;">
                </div>
            </div>

            <div class="box">
                <span>University:</span>
                <input type="text" name="university" placeholder="University">
            </div>

            <div class="box">
                <span>Degree:</span>
                <input type="text" name="degree" placeholder="Degree">
            </div>

            <div class="box">
                <span>Major:</span>
                <input type="text" name="major" placeholder="Major">
            </div>

            <div class="box">
                <span>Email:</span>
                <input type="email" name="email" placeholder="Email">
            </div>
            
            <div class="box">
                <span>Password:</span>
                <input type="password" name="password" placeholder="Password">
            </div>

            <button type="submit"name="registerButton" id="registerButton" class="register-button">
                Register Me
            </button>
        </form>
    </div>

    <p class="signup-text">Already have an account? <a href="Log-In-Page.html" id="loginButton" class="signup">Log In</a></p>
</div>

<div class="footer">
    <span>Terms & Conditions</span>
    <span>Privacy</span>
    <span>About Us</span>
    <span>Contact Us</span>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        display: inline-block;
        width: 200px;
        height: 40px;
        margin-top: 20px;
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
        <img src="Photos/Joblook_logo.jpeg" alt="Logo" class="logo">

        <div class="box">
            <span>Name:</span>
            <div class="input-group">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name" style="margin-left: 10px;">
            </div>
        </div>

        <div class="box">
            <span>Phone:</span>
            <div class="input-group">
                <input type="text" placeholder="Country Code" class="small">
                <input type="text" placeholder="Phone Number" style="width: 65%; margin-left: 10px;">
            </div>
        </div>

        <div class="box">
            <span>Birthday:</span>
            <div class="input-group">
                <input type="text" placeholder="Day" class="small">
                <input type="text" placeholder="Month" class="small" style="margin-left: 10px;">
                <input type="text" placeholder="Year" class="small" style="margin-left: 10px;">
            </div>
        </div>

        <div class="box">
            <span>University:</span>
            <input type="text" placeholder="University">
        </div>

        <div class="box">
            <span>Degree:</span>
            <input type="text" placeholder="Degree">
        </div>

        <div class="box">
            <span>Major:</span>
            <input type="text" placeholder="Major">
        </div>

        <div class="box">
            <span>Email:</span>
            <input type="email" placeholder="Email">
        </div>

        <div class="box">
            <span>Password:</span>
            <input type="password" placeholder="Password">
        </div>

        <a href="dashboard-employer.html" id="registerButton" class="register-button">
            Register Me
        </a>
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

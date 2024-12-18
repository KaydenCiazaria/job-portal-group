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
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .content {
        width: auto;
        max-width: 300px;
        background-color: white;
        padding: 25px;
        border-radius: 0px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative; /* Added relative positioning */
    }

    .user-type {
        width: 50%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    
    #employer {
        background-color: #DDD7D7;
    }
    
    #jobSeeker {
        background-color: #DDD7D7;
    }

    .box {
        position: relative;
        width: 300px;
        height: 50px;
        background-color: #DDD7D7;
        margin-bottom: 20px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer; /* Make the box clickable */
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
        background-color: #2980b9; /* Background color changes to blue */
        color: black; /* Text color remains black */
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
        cursor: pointer; /* Make the signup text clickable */
    }

    .signup-text {
        position: absolute; /* Change to absolute positioning */
        bottom: -105px; /* Adjust as needed */
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
        top: 24%;
        transform: translateY(-50%);
    }

    .box input[type="email"],
    .box input[type="password"] {
        width: calc(100% - 20px); /* Adjusted width */
        padding: 10px; /* Increased padding */
        border: none; /* Removed border */
        border-radius: 5px; /* Added border radius */
        background-color: #DDD7D7; /* Matched background color with respective boxes */
        margin-top: 5px; /* Added margin */
        box-sizing: border-box; /* Added to include padding and border in width calculation */
    }
</style>
</head>
<body>

<div class="content">
    <img src="C:\xampp\htdocs\SSWP_FinalProject\Photos\Joblook_logo.jpeg" alt="Logo" class="logo">

    <div class="box" id="userTypeBox">
        <div class="user-type" id="employer">Employer</div>
        <div class="user-type" id="jobSeeker">Job Seeker</div>
    </div>

    <div class="box">
        <span>Email Address:</span>
        <input type="email" id="emailInput"> <!-- Email input -->
    </div>

    <div class="box">
        <span>Password:</span>
        <input type="password" id="passwordInput"> <!-- Password input -->
    </div>

    <a href="#" id="loginButton" class="login-button"> <!-- Change to anchor tag -->
        <span class="login-text">Log In</span>
    </a>

    <p class="signup-text">Don't have an Account? <a href="Register-Page-Option.html" id="signupButton" class="signup">Sign up</a></p> <!-- Change to anchor tag -->
</div>

<div class="footer">
    <span>Terms & Conditions</span>
    <span>Privacy</span>
    <span>About Us</span>
    <span>Contact Us</span>
</div>

<script>
    document.getElementById('employer').addEventListener('click', function() {
        document.getElementById('employer').style.backgroundColor = '#ABF0FF';
        document.getElementById('jobSeeker').style.backgroundColor = '#DDD7D7';
        // Change the href of the login button to dashboardemployer.html
        document.getElementById('loginButton').href = 'dashboardemployer.html';
    });
    
    document.getElementById('jobSeeker').addEventListener('click', function() {
        document.getElementById('jobSeeker').style.backgroundColor = '#ABF0FF';
        document.getElementById('employer').style.backgroundColor = '#DDD7D7';
        // Change the href of the login button to dashboardjobseeker.html
        document.getElementById('loginButton').href = 'dashboardjobseeker.html';
      
        // Change the href of the signup button to Register-Page-Jobseeker.html
        document.getElementById('signupButton').href = 'Register-Page-Jobseeker.html';
    });
</script>

</body>
</html>

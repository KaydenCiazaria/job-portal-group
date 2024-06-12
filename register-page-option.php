<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Page</title>
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
        max-width: 400px; /* Increased max-width for better alignment */
        background-color: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .option-box {
        width: 100%; /* Set to 100% width */
        height: 80px; /* Adjusted height */
        display: flex;
        justify-content: space-between; /* Align employer and job seeker to the sides */
        align-items: center;
        margin-bottom: 20px;
    }
    
    .user-type {
        width: 130px; /* Adjusted width */
        height: 100%;
        background-color: #DDD7D7;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer; /* Make the box clickable */
        transition: background-color 0.3s; /* Smooth transition */
    }    

    #employer {
        margin-right: 10px; /* Added margin between employer and job seeker */
    }

    #employer.active, #jobSeeker.active {
        background-color: #2980b9; /* Background color changes to blue when active */
        color: black; /* Text color remains black */
    }

    .option-text {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        text-align: center;
        color: #2278BD; /* Changed text color */
    }

    .register-button {
        width: 150px;
        height: 30px;
        background-color: #DDD7D7; /* Changed button background color */
        color: black; /* Changed button text color */
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background-color 0.3s; /* Smooth transition */
    }

    .register-button:hover {
        background-color: #1c6ea4;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }
</style>
</head>
<body>

<div class="content">
    <h2 class="option-text">Register Page</h2>
    <p>Which one are you?</p>

    <div class="option-box" id="userTypeBox">
        <div class="user-type" id="employer">Employer</div>
        <div class="user-type" id="jobSeeker">Job Seeker</div>
    </div>

    <a href="#" id="registerButton" class="register-button">Register Me</a>
</div>

<script>
    document.getElementById('employer').addEventListener('click', function() {
        document.getElementById('employer').classList.add('active');
        document.getElementById('jobSeeker').classList.remove('active');
        // Change the href of the register button to registrationemployer.html
        document.getElementById('registerButton').href = 'Register-Page-Employer.php';
    });
    
    document.getElementById('jobSeeker').addEventListener('click', function() {
        document.getElementById('jobSeeker').classList.add('active');
        document.getElementById('employer').classList.remove('active');
        // Change the href of the register button to registrationjobseeker.html
        document.getElementById('registerButton').href = 'registrationjobseeker.html';
    });
</script>

</body>
</html>

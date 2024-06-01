<?php
session_name('employer_session');
session_start();
include_once('config.php');

$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $fullname = $firstname . ' ' . $lastname;

    $countrycode = isset($_POST['countrycode']) ? $_POST['countrycode'] : '';
    $phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '';
    
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if email already exists
    $check_query = $conn->prepare("SELECT * FROM employer WHERE employer_email=?");
    $check_query->bind_param("s", $email);
    $check_query->execute();
    $check_result = $check_query->get_result();

    if ($check_result->num_rows > 0) {
        // Email already exists
        $errors[] = "Email is already used by another user. Please choose another email to register.";
    } else {
        // Insert new employer data into the database
        $insert_query = $conn->prepare("INSERT INTO employer (employer_fullname, employer_countrycode, employer_phonenumber, employer_email, employer_password) VALUES (?, ?, ?, ?, ?)");
        $insert_query->bind_param("sssss", $fullname, $countrycode, $phonenumber, $email, $password);
        
        if ($insert_query->execute()) {
            // Registration successful, redirect to dashboard
            $_SESSION['fullname']= $fullname;
            $_SESSION['countrycode']= $countrycode;
            $_SESSION['phonenumber']= $phonenumber;
            $_SESSION['employer_email']= $email;
            $_SESSION['password']= $password;
            header("Location: dashboard-employer.php");
            exit();
        } else {
            $errors[] = "Error: Unable to register. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employer Registration</title>
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

    .box {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .box span {
        width: 25%;
        font-size: 12px;
    }

    .box .input-group {
        width: 75%;
        display: flex;
    }

    .box .input-group input {
        width: 50%;
        margin-left: 10px;
        border: 1px solid #DDD7D7;
        background: #DDD7D7;
        outline: none;
        padding: 10px;
        border-radius: 5px;
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
        bottom: -90px;
    }
    
    .signup:hover {
        text-decoration: underline;
    }

    .register-button {
    width: 150px;
    height: 30px;
    margin-top: 20px;
    background-color: #DDD7D7;
    color: white;
    text-align: center;
    border-radius: 5px;
    cursor: pointer;
    position: relative;
    margin: 20px auto 0; /* Center the button horizontally */
    display: block; /* Ensure button takes full width of container */
    }


    .register-button:hover {
        background-color: #2980b9;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }

    .register-button .register-text {
        color: black;
        position: relative;
        top: 25%;
        transform: translateY(-50%);
    }

    .box input[type="email"], .box input[type="password"] {
        width: 66%; /* Adjust the width as needed */
        margin-left: 10px;
        border: 1px solid #DDD7D7;
        background: #DDD7D7;
        outline: none;
        padding: 10px;
        border-radius: 5px;
    }
</style>
</head>
<body>

<div class="content">
    <img src="Photos/Joblook_logo.jpeg" alt="Logo" class="logo">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                <input type="text" name="countrycode" placeholder="Country Code" style="width: 25%;">
                <input type="text" name="phonenumber" placeholder="Phone Number" style="width: 65%; margin-left: 10px;">
            </div>
        </div>

        <div class="box">
            <span>Email:</span>
            <input type="email" name="email" placeholder="Email">
        </div>

        <div class="box">
            <span>Password:</span>
            <input type="password" name="password" placeholder="Password">
        </div>

        <form action="dashboard-employer.php">
        <button type="submit" name="registerButton" class="register-button">
        <span class="register-text">Register Me</span>
        </button>
        </form>

        <p class="signup-text">Already have an account? <a href="Log-In-Page.html" id="loginButton" class="signup">Log In</a></p>

        <?php
        // Display validation errors, if any
        if (!empty($errors)) {
            echo '<div style="color: red;">';
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            echo '</div>';
        }
        ?>
    </form>
</div>

<div class="footer">
    <span>Terms & Conditions</span>
    <span>Privacy</span>
    <span>About Us</span>
    <span>Contact Us</span>
</div>

</body>
</html>

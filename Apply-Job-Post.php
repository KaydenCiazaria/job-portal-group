<?php
include_once('config.php');
session_name('jobseeker_session');
session_start();
if (isset($_POST['submit-button'])) {
$essay_input = isset($_POST['essay']) ? $_POST['essay'] : '';
$jobpost_id = $_SESSION['selected_jobpost_id'];
$jobseeker_email = $_SESSION['email'];

$jobseeker_query = "SELECT jobseeker_id FROM jobseeker WHERE jobseeker_email = ?";
$stmt = $conn->prepare($jobseeker_query);
$stmt->bind_param("s", $jobseeker_email);
$stmt->execute();
$jobseeker_result = $stmt->get_result();
$jobseeker = $jobseeker_result->fetch_assoc();
$jobseeker_id = $jobseeker['jobseeker_id'];

$essay_input = isset($_POST['essay']) ? $_POST['essay'] : '';
$is_pending = 1; // true
$is_accepted = 0; // false
$is_rejected = 0; // false

$sql = "INSERT INTO apply_job (jobpost_id, jobseeker_id, essay, is_pending, is_accepted, is_rejected) 
VALUES (?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("iisiii", $jobpost_id, $jobseeker_id, $essay_input, $is_pending, $is_accepted, $is_rejected);

    if ($stmt->execute()) {
        echo "New job application created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Error: " . $conn->error;
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, white, #C0E4EC);
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #f4f4f4;
            border-bottom: 1px solid #ddd;
        }

        .header img {
            max-height: 50px;
        }

        .header .nav {
            margin-left: auto;
        }

        .header .nav button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .content {
            padding: 20px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .content-container {
            width: 60%;
        }

        .title {
            font-size: 1.2em;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }

        .content-box {
            margin-bottom: 20px;
            padding: 60px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 30px;
            position: relative;
        }

        .inner-title {
            font-size: 1em;
            font-weight: bold;
            color: black;
            position: absolute;
            top: 30px;
            left: 20px;
        }

        .inner-box {
            margin-top: 20px;
            background-color: #f2f2f2;
            /* Light grey background color */
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }


        .inner-box textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        .below-title {
            font-size: 1em;
            color: black;
            margin-top: 30px;
        }

        .submit-button {
            display: flex;
            justify-content: flex-start;
            margin-top: 20px;
        }

        .submit-button button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1em;
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
    </style>
</head>

<body>
    <div class="header">
        <img src="Photos/Joblook_logo(textOnly).jpeg" alt="Logo">
        <div class="nav">
            <button onclick="location.href='dashboard-employer.php'">Home</button>
            <button onclick="location.href='create-post.php'">Create Post</button>
            <button onclick="location.href='Log-In-Page.html'">Log out</button>
        </div>
    </div>
    <div class="content">
        <div class="content-container">
            <div class="title">Application information</div>
            <div class="content-box">
                <div class="above-title">Tell us why you want this job? </div>
                <form method="post">
                    <div class="inner-box">
                        <textarea id="userInput" name="essay" rows="6" cols="50" placeholder="Enter your text here..."></textarea>
                    </div>
                <div class="below-title">Upload your documents here:</div>
                <div>Email to:<span id="emailPlaceholder">[Placeholder]</span></div>
                <form method="post">
                <div class="submit-button"> 
                    <button type="submit"name="submit-button">Submit</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>
    <div class="footer">
        <span>Terms & Conditions</span>
        <span>Privacy</span>
        <span>About Us</span>
        <span>Contact Us</span>
    </div>
</body>

</html>
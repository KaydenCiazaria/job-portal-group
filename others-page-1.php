<?php
include_once('config.php');

// Start employer session to check if it's active
session_name('employer_session');
session_start();
$employer_logged_in = isset($_SESSION['email']);

// Start jobseeker session to check if it's active
session_name('jobseeker_session');
session_start();
$jobseeker_logged_in = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Terms and Condition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: "Roboto", sans-serif;
        }

        h1 {
            font-size: 35px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: underline;
        }

        .logo {
            max-width: 100%;
            height: auto;
        }

        .page {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .box {
            width: 100%;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .header img {
            max-height: 50px;
        }

        .container {
            flex-grow: 1;
            background: linear-gradient(to bottom, white, #C0E4EC);
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding: 20px;
        }

        .content {
            flex-grow: 2;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .pad {
            padding-top: 30px;
            padding-bottom: 30px;
            width: 100%;
            max-width: 70%;
        }

        .footer {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            gap: 20px;
        }

        .footer span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="box header">
            <span>
                <img src="Photos/Joblook_logo(textOnly).jpeg" class="logo">
            </span>
            <span style="margin-left: auto;">
                <?php
                if ($employer_logged_in) {
                    echo '<a href="dashboard-employer.php">&larr; Go Back</a>';
                } elseif ($jobseeker_logged_in) {
                    echo '<a href="dashboard-jobseeker.php">&larr; Go Back</a>';
                } else {
                    echo '<a href="log-in-page.php">Log in</a>';
                }
                ?>
            </span>
        </div>
        <div class="box container">
            <h1>Terms and Condition</h1>
        </div>
        <div class="box content">
            <div class="pad">
                <ol>
                    <li>
                        <strong>Acceptance of Terms:</strong>
                        By using JobLook, you agree to these terms, including any updates or modifications.
                    </li>
                    <li>
                        <strong>User Accounts:</strong>
                        Maintain the confidentiality of your account credentials and be responsible for all activities under your account.
                    </li>
                    <li>
                        <strong>Prohibited Activities:</strong>
                        Do not engage in illegal, abusive, or harmful activities on our platform.
                    </li>
                    <li>
                        <strong>Limitation of Liability:</strong>
                        We are not liable for any damages arising from your use of our services.
                    </li>
                    <li>
                        <strong>Termination:</strong>
                        We may suspend or terminate your access to our services at any time without notice.
                    </li>
                    <li>
                        <strong>Contact Us:</strong>
                        For questions or concerns, contact us at contact@joblook.com.
                    </li>
                </ol>
                <p>By using JobLook, you agree to these terms. Thank you.</p>
            </div>
        </div>
        <div class="box footer">
            <span><a href="others-page-1.php">Terms & Conditions</a></span>
            <span><a href="others-page-2.php">Privacy</a></span>
            <span><a href="others-page-3.php">About Us</a></span>
            <span><a href="others-page-4.php">Contact Us</a></span>
        </div>
    </div>
</body>
</html>

<?php
include_once('config.php');
session_name('employer_session');
session_start();

// Check if the jobseeker_id is set in the session
if (isset($_SESSION['jobseeker_id'])) {
    $jobseeker_id = $_SESSION['jobseeker_id'];

    // Fetch the essay and jobseeker's name from the database
    $query = "SELECT j.jobseeker_fullname, a.essay 
              FROM apply_job a
              JOIN jobseeker j ON a.jobseeker_id = j.jobseeker_id
              WHERE a.jobseeker_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $jobseeker_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $applicant = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
} else {
    // If no jobseeker_id is found in the session, redirect to the employer dashboard
    header("Location: employer_dashboard.php");
    exit;
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

        .essay-content {
            font-size: 1em;
            color: black;
            margin-top: 20px;
            padding: 10px;
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
            <div class="title">Applicant's Essay</div>
            <div class="content-box">
                <?php if (isset($applicant)): ?>
                    <div class="above-title">Name: <?php echo htmlspecialchars($applicant['jobseeker_fullname']); ?></div>
                    <div class="inner-box">
                        <div class="essay-content">
                            <?php echo nl2br(htmlspecialchars($applicant['essay'])); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <p>No essay found for this applicant.</p>
                <?php endif; ?>
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

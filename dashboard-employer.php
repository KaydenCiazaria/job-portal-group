<?php
include_once('config.php');
session_name('employer_session');
session_start();

// Placeholder for fetching active job posts and applicants from the database
// Replace this with actual database queries
$activeJobPosts = [
    ['id' => 1, 'title' => 'Software Engineer', 'location' => 'Jakarta'],
    ['id' => 2, 'title' => 'Marketing Specialist', 'location' => 'Bandung'],
    ['id' => 3, 'title' => 'Data Analyst', 'location' => 'Surabaya'],
];

$applicants = [
    1 => [
        ['name' => 'Kinder Mary', 'university' => 'UBM', 'degree' => 'S1 - Komunikasi', 'age' => 26, 'email' => 'kindermary16@gmail.com', 'phone' => '+62 813 2564 8974'],
        ['name' => 'John Doe', 'university' => 'UI', 'degree' => 'S1 - Informatika', 'age' => 24, 'email' => 'johndoe@example.com', 'phone' => '+62 812 3456 7890'],
        ['name' => 'Bryant Effendi', 'university' => 'UBM', 'degree' => 'S1 - Informatika', 'age' => 22, 'email' => 'bryanteffendi@example.com', 'phone' => '+62 811 1689 3549'],
        ['name' => 'Bryant Effendi', 'university' => 'UBM', 'degree' => 'S1 - Informatika', 'age' => 22, 'email' => 'bryanteffendi@example.com', 'phone' => '+62 811 1689 3549']
    ],
    2 => [
        ['name' => 'Jane Smith', 'university' => 'ITB', 'degree' => 'S2 - Marketing', 'age' => 27, 'email' => 'janesmith@example.com', 'phone' => '+62 811 2345 6789']
    ],
    3 => [
        ['name' => 'Alice Brown', 'university' => 'UGM', 'degree' => 'S1 - Statistik', 'age' => 25, 'email' => 'alicebrown@example.com', 'phone' => '+62 812 5678 9012']
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, white, #C0E4EC);
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
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

        .header .nav {
            margin-left: auto;
        }

        .header .nav a {
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .content-box {
            margin-bottom: 10px;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .content-box.one {
            display: flex;
            align-items: center;
        }

        .content-box.one h2 {
            padding-left: 20px;
            padding-right: 20px;
        }

        .content-box.one .profile-info {
            margin-left: 20px;
        }

        .content-box.one .profile-info p {
            margin: 5px 0;
        }

        .divider {
            width: 1px;
            height: 100%;
            background-color: #ddd;
            margin: 0 20px;
        }

        .content-row {
            display: flex;
            justify-content: space-between;
            flex: 1;
        }

        .content-box.third {
            display: flex;
            flex-direction: column;
            width: 32%;
            max-height: 380px;
            overflow-y: auto;
        }

        .list-group {
            width: 100%;
        }

        .create-more {
            margin-top: 10px;
            text-align: center;
        }

        .content-box.two-thirds {
            width: 66%;
            display: flex;
            flex-direction: column;
            max-height: 380px;
            overflow-y: auto;
        }

        .applicants-container {
            display: flex;
            flex-wrap: wrap;
            overflow-x: scroll;
            overflow: hidden;
        }

        .applicant-box {
            width: 48%;
            margin: 1%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
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
            <a href="dashboard-employer.php" class="btn btn-primary">Home</a>
            <a href="Create-job-post-page.php" class="btn btn-primary">Create Post</a>
            <a href="Log-In-Page.php" class="btn btn-primary">Log out</a>
        </div>
    </div>
    <div class="content">
        <div class="content-box one">
            <h2>Employer Profile</h2>
            <div class="divider"></div>
            <div class="profile-info">
                <p><strong>Name:</strong> <?php echo $_SESSION['fullname'] ?></p>
                <p><strong>Phone Number:</strong> <?php echo $_SESSION['phonenumber'] ?></p>
                <p><strong>Email:</strong> <?php echo $_SESSION['email'] ?></p>
            </div>
        </div>
        <div class="content-row">
            <div class="content-box third title">
                <h2>Active Job Posts</h2>
                <div class="list-group" id="list-tab" role="tablist">
                    <?php foreach ($activeJobPosts as $job): ?>
                        <a class="list-group-item list-group-item-action" id="job-<?php echo $job['id']; ?>-list" data-toggle="list" href="#job-<?php echo $job['id']; ?>" role="tab" aria-controls="job-<?php echo $job['id']; ?>"><?php echo $job['title']; ?></a>
                    <?php endforeach; ?>
                </div>
                <a href="Apply-Job-Post.php" class="btn btn-primary create-more">Create More</a>
            </div>
            <div class="content-box two-thirds">
                <h2>Current Applicants</h2>
                <div class="tab-content" id="nav-tabContent">
                    <?php foreach ($activeJobPosts as $job): ?>
                        <div class="tab-pane fade" id="job-<?php echo $job['id']; ?>" role="tabpanel" aria-labelledby="job-<?php echo $job['id']; ?>-list">
                            <?php if (!empty($applicants[$job['id']])): ?>
                                <div class="applicants-container">
                                    <?php foreach ($applicants[$job['id']] as $applicant): ?>
                                        <div class="applicant-box">
                                            <p><strong>Name:</strong> <?php echo $applicant['name']; ?></p>
                                            <p><strong>University:</strong> <?php echo $applicant['university']; ?></p>
                                            <p><strong>Degree, Major:</strong> <?php echo $applicant['degree']; ?></p>
                                            <p><strong>Age:</strong> <?php echo $applicant['age']; ?></p>
                                            <p><strong>Email:</strong> <?php echo $applicant['email']; ?></p>
                                            <p><strong>Phone Number:</strong> <?php echo $applicant['phone']; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p>No applicants for this job post yet.</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <span>Terms & Conditions</span>
        <span>Privacy</span>
        <span>About Us</span>
        <span>Contact Us</span>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

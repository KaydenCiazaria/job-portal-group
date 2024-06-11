<?php
session_name('job_seeker_session');
session_start();
include_once('config.php');

// Placeholder for fetching job data from the database
$jobs = [
    ['company' => 'BCA', 'location' => 'Jakarta', 'salary' => '$1000', 'age' => '25-30', 'gender' => 'Any', 'type' => 'Full-time'],
    ['company' => 'Mandiri', 'location' => 'Jakarta', 'salary' => '$1200', 'age' => '22-28', 'gender' => 'Male', 'type' => 'Part-time'],
    ['company' => 'Pepsi', 'location' => 'Bandung', 'salary' => '$1100', 'age' => '23-29', 'gender' => 'Female', 'type' => 'Full-time'],
    ['company' => 'McDonald\'s', 'location' => 'Surabaya', 'salary' => '$900', 'age' => '18-25', 'gender' => 'Any', 'type' => 'Full-time'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Job</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, white, #C0E4EC);
            height: 100vh;
            overflow: hidden; /* Prevent scrolling */
            display: flex;
            flex-direction: column;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #f4f4f4;
            border-bottom: 0px solid #ddd;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding-right: 40px; /* Added padding to the right */
        }

        .header img {
            max-height: 50px;
        }

        .header .nav {
            margin-left: auto;
            display: flex;
            justify-content: flex-end; /* Align items to the left of the available space */
            padding-right: 40px;
        }

        .header .nav button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 0.8em;
        }

        .search-container {
            margin-top: 80px; /* Adjusted margin to account for fixed header */
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .search-container input[type="text"] {
            width: 400px; /* Increased width */
            padding: 10px;
            border: 1px solid #DDD7D7;
            border-radius: 5px;
            margin-right: 10px; /* Added margin to create space between input and button */
        }

        .search-container button {
            padding: 10px 20px;
            border: none;
            background-color: #DDD7D7;
            border-radius: 5px;
            cursor: pointer;
        }

        .job-listings {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            margin-bottom: 60px; /* Added margin to prevent content from touching the footer */
            height: calc(100vh - 220px); /* Adjusted height to account for header and footer */
            background: white; /* Match the background color of the content area */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .job-listing {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .job-listing img {
            height: 50px;
        }

        .job-details {
            flex-grow: 1;
            padding-left: 20px;
        }

        .job-details div {
            margin-bottom: 5px;
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
            padding: 10px; /* Reduced padding to make the footer smaller */
            font-size: 1em;
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
            <button onclick="location.href='dashboard-jobseeker.php'">Home</button>
            <button onclick="location.href='Search-Job-Page.php'">Search Job</button>
            <button onclick="location.href='Log-In-Page.php'">Log out</button>
        </div>
    </div>

    <div class="search-container">
        <input type="text" placeholder="Search for a Job...">
        <button>SEARCH</button>
    </div>

    <div class="job-listings">
        <?php foreach ($jobs as $job): ?>
            <div class="job-listing">
                <img src="Photos/<?= $job['company'] ?>_logo.png" alt="<?= $job['company'] ?> Logo">
                <div class="job-details">
                    <div><strong>JOB NAME:</strong> <?= $job['company'] ?></div>
                    <div><strong>LOCATION:</strong> <?= $job['location'] ?></div>
                    <div><strong>SALARY:</strong> <?= $job['salary'] ?></div>
                    <div><strong>Age:</strong> <?= $job['age'] ?></div>
                    <div><strong>Gender:</strong> <?= $job['gender'] ?></div>
                    <div><strong>Type:</strong> <?= $job['type'] ?></div>
                </div>
                <button>APPLY</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="footer">
        <span>Terms & Conditions</span>
        <span>Privacy</span>
        <span>About Us</span>
        <span>Contact Us</span>
    </div>
</body>
</html>

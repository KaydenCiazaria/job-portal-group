<?php
session_name('jobseeker_session');
session_start();
include_once('config.php');

// Read from database
if (isset($_POST["search-button"])) {
    // When search-button is clicked
    $search_input = $_POST["search-job"];
    $stmt = $conn->prepare("SELECT jobpost_id, job_name, job_type, salary_wage, age, gender, is_active FROM job_post WHERE is_active = 1 AND job_name = ?");
    $stmt->bind_param("s", $search_input);
} else {
    // When search-button is not clicked
    $stmt = $conn->prepare("SELECT jobpost_id, job_name, job_type, salary_wage, age, gender, is_active FROM job_post WHERE is_active = 1");
}

$stmt->execute();
$stmt->store_result();

// Check if any rows were returned
if ($stmt->num_rows > 0) {
    // Bind results to variables
    $stmt->bind_result($jobpost_id, $job_name, $job_type, $salary_wage, $age, $gender, $is_active);
    
    $job_post_result = [];
    while ($stmt->fetch()) {
        $job_post_result[] = array(
            'jobpost_id' => $jobpost_id,
            'job_name' => $job_name,
            'job_type' => $job_type,
            'salary_wage' => $salary_wage,
            'age' => $age,
            'gender' => $gender,
            'is_active' => $is_active
        );
    }
}else {
    echo "No jobs available.";
}

#Close connection
if (mysqli_close($conn)) {
    // echo "Connection closed";
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Job</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, white, #C0E4EC);
            height: 100vh;
            overflow: hidden;
            /* Prevent scrolling */
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
            padding-right: 40px;
            /* Added padding to the right */
        }

        .header img {
            max-height: 50px;
        }

        .header .nav {
            margin-left: auto;
            display: flex;
            justify-content: flex-end;
            /* Align items to the left of the available space */
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
            margin-top: 80px;
            /* Adjusted margin to account for fixed header */
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .search-container input[type="text"] {
            width: 400px;
            /* Increased width */
            padding: 10px;
            border: 1px solid #DDD7D7;
            border-radius: 5px;
            margin-right: 10px;
            /* Added margin to create space between input and button */
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
            margin-bottom: 60px;
            /* Added margin to prevent content from touching the footer */
            height: calc(100vh - 220px);
            /* Adjusted height to account for header and footer */
            background: white;
            /* Match the background color of the content area */
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
            padding: 10px;
            /* Reduced padding to make the footer smaller */
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
        <form action="search-job-page.php" method="post">
            <input type="text" placeholder="Search for a Job..." name="search-job" required>
            <button type="submit" name="search-button">SEARCH</button>
        </form>
    </div>

    <div class="job-listings">
        <?php foreach ($job_post_result as $job) : ?>
            <div class="job-listing">
                <!-- Image here -->
                <div class="job-details">
                    <div><strong>JOB NAME:</strong> <?= $job['job_name'] ?></div>
                    <div><strong>LOCATION:</strong> <?= $job['job_type'] ?></div>
                    <div><strong>SALARY:</strong> <?= $job['salary_wage'] ?></div>
                    <div><strong>Age:</strong> <?= $job['age'] ?></div>
                    <div><strong>Gender:</strong> <?= $job['gender'] ?></div>
                    <div><strong>Type:</strong> <?= $job['is_active'] ?></div>
                </div>
                <form action="set-session.php" method="post">
                    <input type="hidden" name="job_id" value="<?= $job['jobpost_id'] ?>">
                    <button type="submit" class="btn btn-primary">Apply to <?php echo $job['job_name']; ?></button>
                </form>
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

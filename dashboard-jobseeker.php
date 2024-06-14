<?php
include_once('config.php');
session_name('jobseeker_session');
session_start();

// Prepare and execute the SQL query
$jobseeker_email = $_SESSION['email'];
$jobseeker_query = "SELECT jobseeker_id FROM jobseeker WHERE jobseeker_email = ?";
if ($stmt = $conn->prepare($jobseeker_query)) {
    $stmt->bind_param("s", $jobseeker_email);
    $stmt->execute();
    $stmt->bind_result($jobseeker_id);
    $stmt->fetch();
    $stmt->close();
}

$stmt = $conn->prepare(
    "SELECT aj.jobpost_id, aj.jobseeker_id, jp.job_name, jp.salary_wage, aj.is_pending, aj.is_accepted, aj.is_rejected 
     FROM apply_job aj
     INNER JOIN job_post jp ON aj.jobpost_id = jp.jobpost_id
     WHERE aj.jobseeker_id = ?"
);
$stmt->bind_param("i", $jobseeker_id);

$stmt->execute();
$stmt->store_result();

// Check if any rows were returned
if ($stmt->num_rows > 0) {
    // Bind results to variables
    $stmt->bind_result($jobpost_id, $jobseeker_id, $job_name, $salary_wage, $is_pending, $is_accepted, $is_rejected);

    // Arrays to hold jobs based on status
    $accepted_jobs = [];
    $pending_jobs = [];

    while ($stmt->fetch()) {
        // Depending on the status, add job to appropriate array
        if ($is_accepted == 1) {
            $accepted_jobs[] = array(
                'jobpost_id' => $jobpost_id,
                'jobseeker_id' => $jobseeker_id,
                'job_name' => $job_name,
                'job_wage' => $salary_wage
            );
        } elseif ($is_pending == 1 && $is_rejected == 0) {
            $pending_jobs[] = array(
                'jobpost_id' => $jobpost_id,
                'jobseeker_id' => $jobseeker_id,
                'job_name' => $job_name,
                'job_wage' => $salary_wage
            );
        } else {
            echo "No jobs available.";
        }
    }
}
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            position: relative;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, white, #C0E4EC);
        }

        .header {
            display: flex;
            align-items: center;
            padding: 20px;
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

        /* .box {
            background-color: red;
            border: 5px solid black;
        } */

        .page {
            height: 100vh;
        }

        .content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .content-box {
            margin-bottom: 10px;
            padding: 20px;
            /* Adjust padding for content box */
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .content-box-right {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .left {
            width: 60%;
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .right {
            width: 40%;
        }

        .profile {
            flex: 1;
            width: 80%;
            text-align: center;
        }

        .job-container {
            position: absolute;
            width: 400px;
            right: 30px;
        }

        #jobpending-container {
            top: 75px;
        }

        #jobaccepted-container {
            bottom: 15px;
            /* Adjust this value based on the height of #jobpending-container */
        }

        .title-container {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        #jobpending,
        #jobaccepted {
            width: 100%;
            height: 200px;
            overflow-y: auto;
        }

        .job-suggestion {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .suggest-content {
            flex-grow: 1;
            height: 100%
        }

        div.scroll {
            margin: 4px, 4px;
            padding: 4px;
            overflow-x: hidden;
            /* to create scrolling vertically */
            overflow-y: auto;
            text-align: left;
        }

        .list {
            display: flex;
            flex-direction: column;
            width: 90%;
            height: 100%;
        }

        .list-group-item {
            flex: 1;
            text-align: center;
            padding: 10px;
            word-wrap: break-word;
            /* Ensures text wraps within the item */
        }

        .job-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .job-desc-1,
        .job-desc-2,
        .job-desc-3 {
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .action-button {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .job-content {
            flex: 1;
            height: 50px;
        }

        .title {
            text-align: center;
            height: 50px;
            background-color: lightblue;
            border-radius: 5px;

        }

        .footer {
            display: flex;
            justify-content: flex-start;
            width: 100%;
            background-color: white;
            color: black;
            text-align: center;
            margin-top: auto;
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
    <div class="page">
        <div class="header">
            <img src="Photos/Joblook_logo(textOnly).jpeg" alt="Logo">
            <div class="nav">
                <a href="home.php" class="btn btn-primary">Home</a>
                <a href="Apply-Job-Post.php" class="btn btn-primary">Create Post</a>
                <a href="Log-In-Page.html" class="btn btn-primary">Log out</a>
            </div>
        </div>
        <div class="content">

            <div class="left">
                <div class="profile content-box">
                    <h1>Profile</h1>
                    <div class="job-title"><?php echo $_SESSION['fullname']; ?></div>
                    <div class="job-desc-1">Major:<?php echo $_SESSION['major']; ?></div>
                    <div class="job-desc-2">University:<?php echo $_SESSION['university']; ?></div>
                    <div class="job-desc-3">Country code:<?php echo $_SESSION['countrycode']; ?></div>
                </div>

                <div class="profile job-suggestion content-box">
                    <div class="suggest-content">
                        <ul class="list-group list-group-horizontal-md">
                            <li class="list-group-item ">
                                <div class="job-title">Job 1</div>
                                <div class="job-desc-1">Position: Junior Developer</div>
                                <div class="job-desc-2">Wage range: 7.5jt - 10jt</div>
                                <div class="job-desc-3">Location: Tangerang</div>
                            </li>
                            <li class="list-group-item">
                                <div class="job-title">Job 2</div>
                                <div class="job-desc-1">Position: Junior Developer
                                    <div class="job-desc-2">Wage range: 7.5jt - 10jt
                                        <div class="job-desc-3">Location: Tangerang
                            </li>
                            <li class="list-group-item">
                                <div class="job-title">Job 3</div>
                                <div class="job-desc-1">Position: Junior Developer</div>
                                <div class="job-desc-2">Wage range: 7.5jt - 10jt</div>
                                <div class="job-desc-3">Location: Tangerang</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="content-box-right list content-box-r" id="jobpending-container">
                    <div class="title">
                        <h1>Pending(?)</h1>
                    </div>
                    <div class="job-content scroll">
                        <ol class="list-group list-group-flush">
                            <?php if (!empty($pending_jobs)) : ?>
                                <?php foreach ($pending_jobs as $job) : ?>

                                    <li class="list-group-item d-flex">
                                        <div class="me-auto">
                                            <div class="fw-bold">Job Name: <?php echo $job['job_name']; ?></div>
                                            <div>Salary: Rp <?php echo $job['job_wage']; ?></div>
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No pending jobs available.</p>
                            <?php endif; ?>
                        </ol>
                    </div>
                    <div class="title">
                        <h1>Accepted(?)</h1>
                    </div>
                    <div class="job-content scroll">
                        <ol class="list-group list-group-flush">

                            <?php if (!empty($accepted_jobs)) : ?>
                                <?php foreach ($accepted_jobs as $job) : ?>

                                    <li class="list-group-item d-flex">
                                        <div class="me-auto">
                                            <div class="fw-bold">Job Name: <?php echo $job['job_name']; ?></div>
                                            <div>Salary: <?php echo $job['job_wage']; ?></div>
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No accepted jobs available.</p>
                            <?php endif; ?>

                        </ol>
                    </div>
                    <div class="title action-button">
                        <button class="btn btn-primary">Search for more</button>
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
    </div>
</body>

</html>

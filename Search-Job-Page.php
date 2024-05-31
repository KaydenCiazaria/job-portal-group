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
            font-size: 0.8em;
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
            font-size: 0.8em;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        .search-container input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-container button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
        }

        .content {
            padding: 10px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            overflow-y: auto;
        }

        .content-container {
            width: 100%;
            max-width: 800px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .job-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .job-item img {
            max-height: 100px;
            margin-right: 20px;
        }

        .job-details {
            flex: 1;
        }

        .job-details p {
            margin: 5px 0;
        }

        .apply-button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
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
            padding: 20px;
            font-size: 1.2em;
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
    
    <div class="search-container">
        <form action="search.php" method="GET">
            <input type="text" name="search" placeholder="Search for a Job..." />
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="content">
        <div class="content-container">
            <div class="job-item">
                <img src="Photos/job1.jpg" alt="Job Photo">
                <div class="job-details">
                    <p><strong>Job Name:</strong> Example Job 1</p>
                    <p><strong>Location:</strong> Example Location 1</p>
                    <p><strong>Salary:</strong> $50,000</p>
                    <p><strong>Age:</strong> 25-35</p>
                    <p><strong>Gender:</strong> Any</p>
                    <p><strong>Type:</strong> Full-time</p>
                </div>
                <button class="apply-button">Apply</button>
            </div>
            <div class="job-item">
                <img src="Photos/job2.jpg" alt="Job Photo">
                <div class="job-details">
                    <p><strong>Job Name:</strong> Example Job 2</p>
                    <p><strong>Location:</strong> Example Location 2</p>
                    <p><strong>Salary:</strong> $60,000</p>
                    <p><strong>Age:</strong> 30-40</p>
                    <p><strong>Gender:</strong> Any</p>
                    <p><strong>Type:</strong> Part-time</p>
                </div>
                <button class="apply-button">Apply</button>
            </div>
            <!-- Repeat similar blocks for more job listings -->
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

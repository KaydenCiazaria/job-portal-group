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
                <?php
                // Placeholder data until database integration
                $jobseeker = [
                    ['id' => 1, 'Name' => 'Bryant Effendi']
                ];

                // Selecting a random job post for demonstration
                $applicantsEssay = $jobseeker[array_rand($jobseeker)];
                ?>
                <div class="above-title">Name: <?php echo $applicantsEssay['Name']; ?></div>
                <div class="inner-box">
                    <div class="essay-content">
                        This is where the applicant's essay content would go. You can replace this text with dynamic content from a database later.
                    </div>
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
</body>

</html>

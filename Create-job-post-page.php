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

        .content {
            padding: 10px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 20px; /* Adjust to move the content box and title lower */
        }

        .content-container {
            width: 100%;
            max-width: 600px;
        }

        .title {
            font-size: 1.2em;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }

        .content-box {
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-top: 10px; /* Adjust to move the content box lower */
        }

        .inner-box {
            margin-bottom: 10px;
        }

        .inner-box label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .inner-box input[type="text"],
        .inner-box input[type="file"] {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2; /* Light grey background color */
        }

        .submit-button {
            display: flex;
            justify-content: flex-start;
            margin-top: 40px; /* Top padding for the Create button */
        }

        .submit-button button {
            padding: 15px 30px; /* Increased size for the Create button */
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
            padding: 20px;
            font-size: 1.2em;
        }

        .footer span {
            margin-left: 10px;
            margin-right: 15px;
            font-weight: bold;
        }

        .label-top-padding {
            padding-top: 30px; /* Adjust top padding for the label */
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
            <div class="title">Job Information</div>
            <div class="content-box">
                <div class="inner-box">
                    <label for="job-name" class="label-top-padding">Name of job:</label>
                    <input type="text" id="job-name" name="job-name" />
                </div>
                <div class="inner-box">
                    <label for="job-type">Type of work:</label>
                    <input type="text" id="job-type" name="job-type" />
                </div>
                <div class="inner-box">
                    <label for="wage">Wage:</label>
                    <input type="text" id="wage" name="wage" />
                </div>
                <div class="inner-box">
                    <label for="age-group">Age group:</label>
                    <input type="text" id="age-group" name="age-group" />
                </div>
                <div class="inner-box">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" />
                </div>
                <div class="inner-box">
                    <label for="company-logo">Company Logo:</label>
                    <input type="file" id="company-logo" name="company-logo" />
                </div>
                <div class="submit-button">
                    <button>Create</button>
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

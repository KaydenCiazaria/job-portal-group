<!DOCTYPE html>
<html lang="en">

<head>

    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        .roboto-regular {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .roboto-bold {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        h1 {
            font-size: 35;

        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: underline;
        }

        .logo {
            width: 40%;
            height: auto;
        }

        .page {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            /* align-items:center; */
            height: 100vh;

        }

        .box {
            width: 100%;
        }

        .header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;

        }

        .container {
            flex-grow: 1;
            background: linear-gradient(to bottom, white, #C0E4EC);
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: end;

        }

        .container p {
            padding-bottom: 20px;
        }

        .content {
            flex-grow: 2;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .pad {
            padding-top: 30px;
            padding-bottom: 30px;
            width: 70%;
        }

        .footer {
            margin-top: auto;
            display: flex;
            flex-direction: row;
            justify-content: baseline;
            align-items: center;
            padding-left: 30px;
            gap: 20px;
        }

        .footer span {
            font-weight: bold;
        }

        .element {
            margin-left: 50px;
            margin-right: 50px;
        }
    </style>
</head>

<body>
    <div class="page roboto-regular">
        <div class="box header">
            <span class="element">
                <img src="Joblook_text.jpg" class="logo">
            </span>
            <span class="element">
                <p id="log-in">
                    <a href="log-in-page.php">Log in</a>
                </p>
            </span>
        </div>
        <div class="box container">
            <p>
            <h1>Contact Us</h1>
            </p>
        </div>
        <div class="box content">
            <div class="pad">
                <h2>For any inquiries, feedback, or assistance</h2>
                <P>feel free to contact us via email at contact@joblook.com.<br>
                    <br>
                    Operating Hours:<br>
                    Our support team is available during standard business hours, Monday through Friday, excluding holidays.<br>
                    <br>
                    Stay Connected:<br>
                    Follow us on social media for updates, news, and job opportunities.<br>
                    <br>
                    Thank you for reaching out to JobLook. We look forward to assisting you!<br>
                </p>

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
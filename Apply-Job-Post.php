<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        }
        .content-box {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .content-box.split {
            display: flex;
            justify-content: space-between;
        }
        .content-box.split .left, .content-box.split .right {
            width: 48%;
        }
        .content-box.split .divider {
            width: 4%;
            border-left: 1px solid #ddd;
            margin: 0 10px;
        }
        .content-box.third, .content-box.two-thirds {
            display: inline-block;
            vertical-align: top;
        }
        .content-box.third {
            width: 32%;
        }
        .content-box.two-thirds {
            width: 66%;
        }
        .content-box.title {
            padding-top: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo.png" alt="Logo">
        <div class="nav">
            <button onclick="location.href='home.php'">Home</button>
            <button onclick="location.href='create-post.php'">Create Post</button>
            <button onclick="location.href='logout.php'">Log out</button>
        </div>
    </div>
    <div class="content">
        <div class="content-box split">
            <div class="left">
                <!-- Left content goes here -->
            </div>
            <div class="divider"></div>
            <div class="right">
                <!-- Right content goes here -->
            </div>
        </div>
        <div class="content-box third title">
            <h2>Title</h2>
            <!-- Content for the third-width box goes here -->
        </div>
        <div class="content-box two-thirds">
            <!-- Content for the two-thirds-width box goes here -->
        </div>
    </div>
</body>
</html>

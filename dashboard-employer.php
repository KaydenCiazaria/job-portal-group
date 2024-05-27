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
        .header .nav form {
            display: inline;
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
            flex-direction: column;
        }
        .content-box {
            margin-bottom: 10px;
            padding: 20px; /* Adjust padding for content box */
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .content-box.one {
            display: flex;
            align-items: center;
        }
        .content-box.one h2 {
            padding-left: 20px; /* Add padding on the left */
            padding-right: 20px; /* Add padding on the right */
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
        }
        .content-box.third {
            display: flex;
            flex-direction: column;
            align-items: center; /* Align items horizontally centered */
            justify-content: center; /* Align content vertically centered */
            width: 32%;
            margin-right: 2%;
            height: 370px;
            position: relative; /* Set position to relative */
        }
        .content-box.two-thirds {
            width: 66%; /* Adjust the width of the two-thirds content box */
            height: 370px;
        }
        .content-box.two-thirds h2 {
            position: relative; /* Set position to relative */
            top: -20px; /* Adjust the top position */
            padding-top: 10px; /* Adjust the padding to move the text "Active Job Post" up */
        }
        .list-group {
            width: 100%; /* Adjust the width of the menu tab */
            height: 80%; /* Adjust the height of the menu tab */
            overflow-y: auto; /* Add scroll if content exceeds height */
        }
        .create-more {
            position: absolute;
            bottom: 10px; /* Adjust the distance from the bottom */
            left: 50%; /* Center the button horizontally */
            transform: translateX(-50%); /* Center the button horizontally */
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
            <form method="POST" action="">
                <button type="submit" name="home">Home</button>
                <button type="submit" name="create_post">Create Post</button>
                <button type="submit" name="logout">Log out</button>
            </form>
        </div>
    </div>
    <div class="content">
        <div class="content-box one">
            <h2>Employer Profile</h2>
            <div class="divider"></div>
            <div class="profile-info">
                <p><strong>Name:</strong> [Placeholder Name]</p>
                <p><strong>Phone Number:</strong> [Placeholder Phone Number]</p>
                <p><strong>Email:</strong> [Placeholder Email]</p>
            </div>
        </div>
        <div class="content-row">
            <div class="content-box third title">
                <h2>Active Job Post</h2>
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                </div>
                <button class="btn btn-primary create-more">Create More</button>
            </div>
            <div class="content-box two-thirds">
                <h2>Current Applicants</h2>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Home tab content</div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Profile tab content</div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Messages tab content</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Settings tab content</div>
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

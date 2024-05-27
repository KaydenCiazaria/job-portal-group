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
        }

        .content1 {
            position: absolute;
            left: 200px;
            top: 75px;
            height: 250px;
            width: 600px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f8f9fa;
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
            bottom: 15px; /* Adjust this value based on the height of #jobpending-container */
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

        #jobpending, #jobaccepted {
            width: 100%;
            height: 200px;
            overflow-y: auto;
        }

        #jobsuggest {
            position: absolute;
            height: 250px;
            left: 200px;
            bottom: 30px;
            width: 600px; /* Matches the width of .content1 */
            display: flex;
            justify-content: space-between;
        }

        .list-group-item {
            flex: 1;
            text-align: center;
            padding: 10px;
            word-wrap: break-word; /* Ensures text wraps within the item */
        }

        .job-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .job-desc-1, .job-desc-2, .job-desc-3 {
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .action-button {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="content1">
        <h1>Profile</h1>
        <div class="job-title">John Doe</div>
        <div class="job-desc-1">Position: Senior Developer</div>
        <div class="job-desc-2">Wage Range: 15jt - 20jt</div>
        <div class="job-desc-3">Location: Jakarta</div>
    </div>
    
    <ul class="list-group list-group-horizontal" id="jobsuggest">
        <li class="list-group-item">
            <div class="job-title">Job 1</div>
            <div class="job-desc-1">Position: Junior Developer</div>
            <div class="job-desc-2">Wage range: 7.5jt - 10jt</div>
            <div class="job-desc-3">Location: Tangerang</div>
        </li>
        <li class="list-group-item">
            <div class="job-title">Job 2</div>
            <div class="job-desc-1">Position: Junior Developer</div>
            <div class="job-desc-2">Wage range: 7.5jt - 10jt</div>
            <div class="job-desc-3">Location: Tangerang</div>
        </li>
        <li class="list-group-item">
            <div class="job-title">Job 3</div>
            <div class="job-desc-1">Position: Junior Developer</div>
            <div class="job-desc-2">Wage range: 7.5jt - 10jt</div>
            <div class="job-desc-3">Location: Tangerang</div>
        </li>
    </ul>
    
    <div class="job-container" id="jobpending-container">
        <div class="title-container">Pending Jobs</div>
        <div id="jobpending">
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
                <li class="list-group-item">Item 6</li>
                <li class="list-group-item">Item 7</li>
                <li class="list-group-item">Item 8</li>
                <li class="list-group-item">Item 9</li>
                <li class="list-group-item">Item 10</li>
            </ul>
        </div>
    </div>
    
    <div class="job-container" id="jobaccepted-container">
        <div class="title-container">Accepted Jobs</div>
        <div id="jobaccepted">
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
                <li class="list-group-item">Item 6</li>
                <li class="list-group-item">Item 7</li>
                <li class="list-group-item">Item 8</li>
                <li class="list-group-item">Item 9</li>
                <li class="list-group-item">Item 10</li>
            </ul>
        </div>
        <div class="action-button">
            <button class="btn btn-primary">Search for more</button>
        </div>
    </div>
</body>
</html>

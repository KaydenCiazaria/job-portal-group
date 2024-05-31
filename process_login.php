<?php
session_start();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $userType = filter_var($_POST['userType'], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login_page.php?error=invalid_email");
        exit();
    }

    // Connect to database
    $conn = new mysqli('hostname', 'username', 'password', 'database');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ? AND user_type = ?");
    $stmt->bind_param("ss", $email, $userType);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            // Store user info in session
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_type'] = $userType;

            // Redirect to respective dashboard
            if ($userType == 'employer') {
                header("Location: dashboard-employer.php");
            } else {
                header("Location: dashboard-jobseeker.php");
            }
            exit();
        } else {
            // Invalid password
            header("Location: login_page.php?error=invalid_credentials");
            exit();
        }
    } else {
        // User not found
        header("Location: login_page.php?error=invalid_credentials");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If form was not submitted, redirect to login page
    header("Location: login_page.php");
    exit();
}
?>

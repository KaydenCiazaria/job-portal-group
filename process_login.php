<?php
include_once('config.php');
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // No filter as password should be hashed/verified directly
    $userType = filter_var($_POST['userType']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: Log-In-Page.php?error=invalid_email");
        exit();
    }

    // Escape variables to protect against SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $userType = mysqli_real_escape_string($conn, $userType);

    // Determine the table and query based on user type
    if ($userType == 'employer') {
        $sql = "SELECT * FROM employer WHERE employer_email = '$email' AND employer_password = '$password'";
        session_name('employer_session');
    } elseif ($userType == 'jobseeker') {
        $sql = "SELECT * FROM jobseeker WHERE jobseeker_email = '$email' AND jobseeker_password = '$password'";
        session_name('jobseeker_session');
    } else {
        // Invalid user type
        header("Location: Log-In-Page.php?error=invalid_user_type");
        exit();
    }

    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if (!$result) {
        error_log("Query failed: " . mysqli_error($conn));
        header("Location: Log-In-Page.php?error=query_error");
        exit();
    }

    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Redirect to respective dashboard
        if ($userType == 'employer') {
            session_name('employer_session');
            session_start();
            $sql = "SELECT * FROM employer WHERE employer_email = '$email' AND employer_password = '$password'";
            $_SESSION['fullname'] = $row['employer_fullname'];
            $_SESSION['countrycode'] = $row['employer_countrycode'];
            $_SESSION['phonenumber'] = $row['employer_phonenumber'];
            $_SESSION['email'] = $row['employer_email'];
            header("Location: dashboard-employer.php");
        } else {
            session_name('jobseeker_session');
            session_start();
            $sql = "SELECT * FROM jobseeker WHERE jobseeker_email = '$email' AND jobseeker_password = '$password'";
            $_SESSION['fullname'] = $row['jobseeker_fullname'];
            $_SESSION['countrycode'] = $row['jobseeker_countrycode'];
            $_SESSION['phonenumber'] = $row['jobseeker_phonenumber'];
            $_SESSION['email'] = $row['jobseeker_email'];
            header("Location: dashboard-jobseeker.php");
        }
        exit();
    } else {
        // Invalid credentials
        header("Location: Log-In-Page.php?error=invalid_credentials");
        exit();
    }
}

// Close connection
mysqli_close($conn);
?>

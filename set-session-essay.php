<?php
session_name('employer_session');
session_start();

// Check if jobseeker_id is set in the POST request
if (isset($_POST['jobseeker_id'])) {
    // Store jobseeker_id in session
    $_SESSION['jobseeker_id'] = $_POST['jobseeker_id'];
    
    // Redirect to view-essay-page.php
    header("Location: view-essay-page.php");
    exit();
} else {
    // Redirect back to employer dashboard if no jobseeker_id is set
    header("Location: employer_dashboard.php");
    exit();
}
?>

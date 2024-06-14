<?php
session_name('jobseeker_session');
session_start();

// Check if job_id is set in the POST request
if (isset($_POST['job_id'])) {
    // Store job_id in session
    $_SESSION['selected_jobpost_id'] = $_POST['job_id'];
    
    // Redirect to a new page or back to job listings page
    header("Location: apply-job-post.php"); // Change to the page where you want to redirect the user
    exit();
} else {
    // Redirect back to job listings page if no job_id is set
    header("Location: Search-Job-Page.php");
    exit();
}
?>
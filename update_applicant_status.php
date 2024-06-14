<?php
include_once('config.php');

$jobseeker_id = $_POST['jobseeker_id'] ?? null;
$jobpost_id = $_POST['jobpost_id'] ?? null;
$action = $_POST['action'] ?? null;

if (!$jobseeker_id || !$jobpost_id || !$action) {
    die(json_encode(['status' => 'error', 'message' => 'Missing parameters']));
}

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Set the initial state of is_pending, is_accepted, and is_rejected based on action
$is_pending = 0;
$is_accepted = ($action == 'accept') ? 1 : 0;
$is_rejected = ($action == 'reject') ? 1 : 0;

// Update the applicant's status
$sql = "UPDATE apply_job SET is_pending = ?, is_accepted = ?, is_rejected = ? WHERE jobseeker_id = ? AND jobpost_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiii", $is_pending, $is_accepted, $is_rejected, $jobseeker_id, $jobpost_id);

if ($stmt->execute()) {
    // Store success message in session
    session_start();
    $_SESSION['message'] = "Applicant status updated successfully.";
    $_SESSION['active_tab'] = $jobpost_id; // Set active tab in session
    header("Location: dashboard-employer.php");
    exit;
} else {
    die(json_encode(['status' => 'error', 'message' => 'Failed to update applicant status']));
}

$stmt->close();
$conn->close();
?>

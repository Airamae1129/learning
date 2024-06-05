<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include('db_connect.php');

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// Retrieve form data
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$retype_password = $_POST['retype_password'];

// Retrieve current password from database
$query = "SELECT password FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($stored_password);
$stmt->fetch();
$stmt->close();

if (password_verify($current_password, $stored_password)) {

    if ($new_password === $retype_password) {
        $update_query = "UPDATE users SET password = ? WHERE user_id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("si", $hashed_password, $user_id);
        $update_stmt->execute();
        $update_stmt->close();

    
        $_SESSION['success_message'] = "Password updated successfully.";
        header("Location: profile.php");
        exit();
    } else {
        $_SESSION['error_message'] = "New password and retype password do not match.";
        header("Location: profile.php");
        exit();
    }
} else {
    $_SESSION['error_message'] = "Incorrect current password.";
    header("Location: profile.php");
    exit();
}
?>

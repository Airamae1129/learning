<?php
include('admin/dbcon.php');
session_start();
$user_id = $_SESSION['id'];

// Get POST data
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];

// Fetch the current hashed password from the database
$query = $conn->prepare("SELECT password FROM student WHERE student_id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_assoc();

if ($row) {
    // Verify the current password
    if (password_verify($current_password, $row['password'])) {
        // Hash the new password
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $update_query = $conn->prepare("UPDATE student SET password = ? WHERE student_id = ?");
        $update_query->bind_param("si", $hashed_new_password, $user_id);
        if ($update_query->execute()) {
            echo 'password_change_success';
        } else {
            echo 'error';
        }
    } else {
        echo 'current_password_incorrect';
    }
} else {
    echo 'error';
}

$query->close();
$update_query->close();
?>

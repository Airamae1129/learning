<?php
include('dbcon.php');
include('session.php');

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$retype_password = $_POST['retype_password'];

// Fetch the current password from the database
$query = mysqli_query($conn, "SELECT password FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error());
$row = mysqli_fetch_array($query);
$hashed_password = $row['password'];

$response = array();

if (!password_verify($current_password, $hashed_password)) {
    $response['success'] = false;
    $response['message'] = 'Current password is incorrect';
} elseif ($new_password !== $retype_password) {
    $response['success'] = false;
    $response['message'] = 'New passwords do not match';
} else {
    // Hash the new password
    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $stmt = $conn->prepare("UPDATE teacher SET password = ? WHERE teacher_id = ?");
    $stmt->bind_param("si", $new_hashed_password, $session_id);

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['message'] = 'Error updating password';
    }

    $stmt->close();
}

echo json_encode($response);
?>

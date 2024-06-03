<?php
include('admin/dbcon.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


$stmt_student = $conn->prepare("SELECT * FROM student WHERE username=?");
$stmt_student->bind_param("s", $username);
$stmt_student->execute();
$result_student = $stmt_student->get_result();
$row_student = $result_student->fetch_assoc();

$stmt_teacher = $conn->prepare("SELECT * FROM teacher WHERE username=?");
$stmt_teacher->bind_param("s", $username);
$stmt_teacher->execute();
$result_teacher = $stmt_teacher->get_result();
$row_teacher = $result_teacher->fetch_assoc();

// Check if user is a student
if ($result_student->num_rows > 0) {
    // Verify password
    if (password_verify($password, $row_student['password'])) {
        $_SESSION['id'] = $row_student['student_id'];
        echo 'true_student';
    } else {
        echo 'false';
    }
} 
// Check if user is a teacher
elseif ($result_teacher->num_rows > 0) {
    // Verify password
    if (password_verify($password, $row_teacher['password'])) {
        $_SESSION['id'] = $row_teacher['teacher_id'];
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}

// Close prepared statements
$stmt_student->close();
$stmt_teacher->close();
?>

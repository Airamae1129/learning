<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    
    $delete_student_query = "DELETE FROM student WHERE student_id = $id";
    $delete_class_student_query = "DELETE FROM teacher_class_student WHERE student_id = $id";
    
    if (mysqli_query($conn, $delete_student_query) && mysqli_query($conn, $delete_class_student_query)) {
        // Successfully deleted
        header('Location: students.php?status=success');
        exit;
    } else {
       
        echo "Error deleting student: " . mysqli_error($conn);
    }
} else {
    echo "Student ID not provided.";
}
?>

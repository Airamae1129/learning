

<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    
    $delete_student_query = "DELETE FROM teacher WHERE teacher_id = $id";

    
    if (mysqli_query($conn, $delete_student_query) ) {
        // Successfully deleted
        header('Location: teachers.php?status=success');
        exit;
    } else {
       
        echo "Error deleting student: " . mysqli_error($conn);
    }
} else {
    echo "Teacher ID not provided.";
}
?>

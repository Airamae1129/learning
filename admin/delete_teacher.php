<?php
include('dbcon.php');

if(isset($_GET['id'])) {
    
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $delete_query = "DELETE FROM teacher WHERE teacher_id = $id";
    
  
    if(mysqli_query($conn, $delete_query)) {
        
        header('Location: teachers.php');
        exit;
    } else {
    
        echo "Error deleting teacher: " . mysqli_error($conn);
    }
} else {
    
    header('Location: teachers.php');
    exit;
}
?>

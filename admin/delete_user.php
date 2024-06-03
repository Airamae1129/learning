<?php
// Include database connection
include('dbcon.php');

if(isset($_GET['id'])) {
 
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $delete_query = "DELETE FROM users WHERE user_id = $id";
    
   
    if(mysqli_query($conn, $delete_query)) {
        echo "User deleted successfully.";
        header('Location: admin_user.php');
        exit;
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>

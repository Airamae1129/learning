<?php
// Include database connection
include('dbcon.php');

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Prepare the delete query
    $delete_query = "DELETE FROM department WHERE department_id = $id";
    
    // Execute the query and check if the deletion was successful
    if (mysqli_query($conn, $delete_query)) {
        // Redirect to department page with success status
        header('Location: department.php?status=success');
        exit;
    } else {
        // Display an error message if the deletion fails
        echo "Error deleting department: " . mysqli_error($conn);
    }
} else {
    // Display an error message if the ID is not provided
    echo "Department ID not provided.";
}

// Close the database connection
$conn->close();
?>

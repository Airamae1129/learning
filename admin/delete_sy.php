<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM school_year WHERE school_year_id='$id'");
    if ($result) {
        header("location: school_year.php");
        exit();
    } else {
        // Handle deletion failure
        echo "Failed to delete the school year.";
    }
} else {
    // Handle invalid request
    echo "Invalid request.";
}
?>

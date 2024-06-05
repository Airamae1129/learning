<?php
include('dbcon.php');


if(isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $delete_query = "DELETE FROM school_year WHERE school_year_id = '$id'";
    $result = mysqli_query($conn, $delete_query);

    if($result) {
        header("Location: school_year.php");
        exit();
    } else {
        echo "Error: Failed to delete school year.";
    }
} 
?>

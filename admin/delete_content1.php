<?php
include('dbcon.php');

if(isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $delete_query = "DELETE FROM content WHERE content_id = '$id'";
    $result = mysqli_query($conn, $delete_query);

    if($result) {
        header("Location: content.php");
        exit();
    } else {

        echo "Error: Failed to delete content.";
    }
} 
?>

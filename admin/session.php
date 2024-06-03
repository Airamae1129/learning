
<?php
session_start();

if (!isset($_SESSION['id']) || trim($_SESSION['id']) == '') {
    echo "<script>window.location = 'index.php';</script>";
    exit();
}

$session_id = $_SESSION['id'];

include('dbcon.php'); 

$user_query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$session_id'") or die(mysqli_error($conn));

if (mysqli_num_rows($user_query) > 0) {
    $user_row = mysqli_fetch_array($user_query);
    $user_username = $user_row['username'];
} else {
    echo "User not found.";
    echo "<script>window.location = 'logout.php';</script>";
    exit();
}
?>

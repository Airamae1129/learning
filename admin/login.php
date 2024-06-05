<?php
include('dbcon.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
error_reporting(E_ALL);
ini_set('display_errors', 1);


$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'") or die(mysqli_error($conn));
$count = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);

if ($count > 0) {
    // if (password_verify($password, $row['passowrd'])) {
        $logout_date = '-';
        $_SESSION['id'] = $row['user_id'];
        echo 'true';
        mysqli_query($conn, "INSERT into user_log (username, login_date, logout_date, user_id) VALUES ('$username', NOW(), '$logout_date', ".$row['user_id'].")
        ") or die(mysqli_error($conn));
    // } else {
    //     echo 'false';
    // }
} else {
    echo 'false';
}

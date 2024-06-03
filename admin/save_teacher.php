<?php
// Include database connection file
include('dbcon.php');

// Include PHPMailer autoloader
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to generate random 8-digit password
function generatePassword() {
    return rand(10000000, 99999999);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $department_id = $_POST['department'];
    $username = $_POST['username'];

    // Generate a password
    $password = generatePassword();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Sanitize user input
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $email = mysqli_real_escape_string($conn, $email);
    $department_id = intval($department_id); // Assuming department_id is integer
    $username = mysqli_real_escape_string($conn, $username);

    // Check if the teacher already exists
    $stmt = $conn->prepare("SELECT * FROM teacher WHERE firstname = ? AND lastname = ? AND email = ?");
    $stmt->bind_param("sss", $firstname, $lastname, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count > 0) {
        echo "<script>alert('Data Already Exist');</script>";
    } else {
        // Insert new teacher
        $stmt = $conn->prepare("INSERT INTO teacher (firstname, lastname, email, username, password, location, department_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $location = 'uploads/NO-IMAGE-AVAILABLE.jpg';
        $stmt->bind_param("ssssssi", $firstname, $lastname, $email, $username, $hashedPassword, $location, $department_id);

        if ($stmt->execute()) {
            // Send email with the hashed password
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'skillforge107@gmail.com'; // Your Gmail address
            $mail->Password = 'mwcjxrjvcxapdtoj'; // Your Gmail password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('skillforge107@gmail.com', 'SkillForge');
            $mail->addAddress($email);
            $mail->Subject = 'Your Password';
            $mail->Body = 'Your password is: ' . $password;

            if ($mail->send()) {
                echo 'Teacher added successfully. Email sent with password.';
            } else {
                echo 'Teacher added successfully, but email could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            echo "<script>alert('Error inserting data');</script>";
        }
    }

    // Close the statement
    $stmt->close();
}
?>

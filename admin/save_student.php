<?php
include('dbcon.php');

// Function to generate a random 8-digit password
function generatePassword() {
    return rand(10000000, 99999999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $un = mysqli_real_escape_string($conn, $_POST['un']);
    $fn = mysqli_real_escape_string($conn, $_POST['fn']);
    $ln = mysqli_real_escape_string($conn, $_POST['ln']);
    $em = mysqli_real_escape_string($conn, $_POST['em']);
    $class_id = intval($_POST['class_id']);
    $password = generatePassword();
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $gold = 0;

    // Check if the username or email already exists
    $check_query = mysqli_query($conn, "SELECT * FROM student WHERE username='$un' OR email='$em'") or die(mysqli_error());
    if (mysqli_num_rows($check_query) > 0) {
        $message = "Username or Email Already Exists";
        $message_type = "danger";
    } else {
        // Insert new student record
        $insert_query = "INSERT INTO student (username, firstname, lastname, email, gold, location, class_id, status, password) 
                         VALUES ('$un', '$fn', '$ln', '$em', '$gold', 'uploads/NO-IMAGE-AVAILABLE.jpg', '$class_id', 'Unregistered', '$hash_pass')";
        $result = mysqli_query($conn, $insert_query);

        if ($result) {
            // Send email with the password
            require '../vendor/autoload.php';
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com';
            $mail->Password = 'your-email-password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('your-email@gmail.com', 'Your Name');
            $mail->addAddress($em);
            $mail->Subject = 'Your Password';a
            $mail->Body = 'Your password is: ' . $password;

            if ($mail->send()) {
                $message = "Student added successfully. Email sent with password.";
                $message_type = "success";
            } else {
                $message = "Student added successfully, but email could not be sent. " . $mail->ErrorInfo;
                $message_type = "warning";
            }
        } else {
            $message = "Error inserting student record: " . mysqli_error($conn);
            $message_type = "danger";
        }
    }
    echo json_encode(['message' => $message, 'message_type' => $message_type]);
}
?>

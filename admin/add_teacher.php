<?php
// Include the database connection at the top of the script
include('dbcon.php');
?>


<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Add Teacher</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form method="post">
                    <div class="control-group">
                        <label>Department:</label>
                        <div class="controls">
                            <select name="department" class="" required>
                                <option value="">Select Department</option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM department ORDER BY department_name");
                                while ($row = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $row['department_id'] . '">' . $row['department_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="firstname" type="text" placeholder="Firstname" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="lastname" type="text" placeholder="Lastname" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="username" type="text" placeholder="Username" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="email" type="email" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Teacher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('dbcon.php');

require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generatePassword() {
    return rand(10000000, 99999999);
}

if (isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department_id = $_POST['department'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $password = generatePassword();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT * FROM teacher WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count > 0) {
        $message = "Username Already Exists";
        $message_type = "danger";
    } else {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM teacher WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;

        if ($count > 0) {
            $message = "Email Already Exists";
            $message_type = "danger";
        } else {
            $stmt = $conn->prepare("INSERT INTO teacher (firstname, lastname, email, username, password, location, department_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $location = 'uploads/NO-IMAGE-AVAILABLE.jpg';
            $stmt->bind_param("ssssssi", $firstname, $lastname, $email, $username, $hashed_password, $location, $department_id);

            if ($stmt->execute()) {
                // Send email with the new password
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'skillforge107@gmail.com'; 
                $mail->Password = 'mwcjxrjvcxapdtoj'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('skillforge107@gmail.com', 'SkillForge');
                $mail->addAddress($email);
                $mail->Subject = 'Your Password';
                $mail->Body = 'Your password is: ' . $password;

                if ($mail->send()) {
                    $message = "Teacher added successfully. Email sent with password.";
                    $message_type = "success";
                } else {
                    $message = "Teacher added successfully, but email could not be sent. Mailer Error: " . $mail->ErrorInfo;
                    $message_type = "warning";
                }
            } else {
                $message = "Error inserting data";
                $message_type = "danger";
            }
        }
    }

    $stmt->close();
    echo "<script>window.location = 'teachers.php?message=" . urlencode($message) . "&message_type=" . urlencode($message_type) . "';</script>";
}
?>
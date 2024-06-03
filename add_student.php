<?php
include('header_dashboard.php');
include('session.php');
$get_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <?php include('script.php'); ?>
</head>
<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('class_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->
                    <div class="pull-right">
                        <a href="my_students.php?id=<?php echo $get_id; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
                    </div>
                    <?php
                    $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                                                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                                                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                                        WHERE teacher_class_id = '$get_id'") or die(mysqli_error());
                    $class_row = mysqli_fetch_array($class_query);
                    ?>
                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#">My Students</a><span class="divider">/</span></li>
                        <li><a href="#"><b>Add Student</b></a></li>
                    </ul>
                    <!-- end breadcrumb -->

                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form method="post" action="">
                                    <button name="submit" type="submit" class="btn btn-info"><i class="icon-save"></i>&nbsp;Add Student</button>
                                    <br>
                                    <br>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Course Year and Section</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Your table content goes here -->
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
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

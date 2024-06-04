<?php
include('admin/dbcon.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * 
            FROM ( 
                    SELECT username, password, 'student' AS 'type', student_id AS 'id'
                        FROM student 
                    UNION ALL 
                    SELECT username, password, 'teacher' AS 'type', teacher_id AS 'id'
                        FROM teacher 
                ) AS combined_results 
            WHERE combined_results.username=?
            LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    // Verify password
    if (password_verify($password, $row['password'])) {
        $type = $row['type'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['user_type'] = $type;

        echo $type == 'teacher' ? 'true' : 'true_student';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}

$stmt->close();

?>

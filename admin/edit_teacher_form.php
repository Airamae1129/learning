<?php
$message = "";
$message_type = "";

if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department_id = $_POST['department'];

    // Check if the email already exists
    $email = $_POST['email'];
    $query_email = mysqli_query($conn, "SELECT * FROM teacher WHERE email = '$email' AND teacher_id != '$get_id'") or die(mysqli_error($conn));
    $count_email = mysqli_num_rows($query_email);

    // Check if the username already exists
    $username = $_POST['username'];
    $query_username = mysqli_query($conn, "SELECT * FROM teacher WHERE username = '$username' AND teacher_id != '$get_id'") or die(mysqli_error($conn));
    $count_username = mysqli_num_rows($query_username);

    if ($count_email > 0) {
        $message = "<span style='font-weight: bold; font-size: 12pt;'>Email Already Exists</span>";
		$message_type = "danger";

    } else if ($count_username > 0) {
        $message = "<span style='font-weight: bold; font-size: 12pt;'>Username Already Exists</span>";
		$message_type = "danger";

    } else {
        mysqli_query($conn, "UPDATE teacher SET firstname = '$firstname', lastname = '$lastname', department_id = '$department_id', email = '$email', username = '$username' WHERE teacher_id = '$get_id'") or die(mysqli_error($conn));
		$message = "<span style='font-weight: bold; font-size: 12pt;'>Teacher updated successfully</span>";
		$message_type = "success";

    }
}

// For displaying the message on the main page interface
if (!empty($message)) {
        echo "<div class='alert alert-{$message_type}' id='alert'>{$message}</div>";
        echo "<script>
                setTimeout(function() {
                    var alert = document.getElementById('alert');
                    alert.style.display = 'none';
                }, 2500);
              </script>";
    }
?>

<div class="row-fluid">
    <a href="teachers.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Teacher</a>
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Edit Teacher</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form method="post">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$get_id'") or die(mysqli_error($conn));
                    $row = mysqli_fetch_array($query);
                    ?>
                    
                    <div class="control-group">
                        <label>Department:</label>
                        <div class="controls">
                            <select name="department" class="chzn-select" required>
                                <?php
                                $query_teacher = mysqli_query($conn, "SELECT * FROM teacher JOIN department ON teacher.department_id = department.department_id WHERE teacher.teacher_id = '$get_id'") or die(mysqli_error($conn));
                                $row_teacher = mysqli_fetch_array($query_teacher);
                                ?>
                                <option value="<?php echo $row_teacher['department_id']; ?>">
                                    <?php echo $row_teacher['department_name']; ?>
                                </option>
                                <?php
                                $department = mysqli_query($conn, "SELECT * FROM department ORDER BY department_name");
                                while ($department_row = mysqli_fetch_array($department)) {
                                ?>
                                    <option value="<?php echo $department_row['department_id']; ?>"><?php echo $department_row['department_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder="Firstname">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="<?php echo $row['lastname']; ?>" name="lastname" id="focusedInput" type="text" placeholder="Lastname">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="<?php echo $row['username']; ?>" name="username" id="focusedInput" type="text" placeholder="Username">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="<?php echo $row['email']; ?>" name="email" id="focusedInput" type="text" placeholder="Email">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                            <button name="update" class="btn btn-success">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>




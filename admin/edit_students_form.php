<?php
$message = "";
$message_type = "";

if (isset($_POST['update'])) {
    $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $class_id = $_POST['cys'];
    $email = $_POST['em'];
    $username = $_POST['un'];

    // Check if the email already exists
    $query_email = mysqli_query($conn, "SELECT * FROM student WHERE email = '$email' AND student_id != '$get_id'") or die(mysqli_error($conn));
    $count_email = mysqli_num_rows($query_email);

    // Check if the username already exists
    $query_username = mysqli_query($conn, "SELECT * FROM student WHERE username = '$username' AND student_id != '$get_id'") or die(mysqli_error($conn));
    $count_username = mysqli_num_rows($query_username);

    if ($count_email > 0) {
        $message = "<span style='font-weight: bold; font-size: 12pt;'>Email Already Exists</span>";
        $message_type = "danger";
    } else if ($count_username > 0) {
        $message = "<span style='font-weight: bold; font-size: 12pt;'>Username Already Exists</span>";
        $message_type = "danger";
    } else {
        mysqli_query($conn, "UPDATE student SET firstname = '$firstname', lastname = '$lastname', class_id = '$class_id', email = '$email', username = '$username' WHERE student_id = '$get_id'") or die(mysqli_error($conn));
        $message = "<span style='font-weight: bold; font-size: 12pt;'>Student updated successfully</span>";
        $message_type = "success";
    }
}
if (!empty($message)) {
  echo "<div class='alert alert-{$message_type}' id='alert'>{$message}</div>";
  echo "<script>
          setTimeout(function() {
              var alert = document.getElementById('alert');
              alert.style.display = 'none';
          }, 1500);
        </script>";
}
?>

<div class="row-fluid">
    <a href="students.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Student</a>
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Edit Student</div>
        </div>
        <div class="block-content collapse in">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM student LEFT JOIN class ON class.class_id = student.class_id WHERE student_id = '$get_id'") or die(mysqli_error());
            $row = mysqli_fetch_array($query);
            ?>
            <div class="span12">
                <form method="post">
                    <div class="control-group">
                        <div class="controls">
                            <select name="cys" class="" required>
                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                                <?php
                                $cys_query = mysqli_query($conn, "SELECT * FROM class ORDER BY class_name");
                                while ($cys_row = mysqli_fetch_array($cys_query)) {
                                    ?>
                                    <option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="un" value="<?php echo $row['username']; ?>" class="input focused" id="focusedInput" type="text" placeholder="ID Number" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="fn" value="<?php echo $row['firstname']; ?>" class="input focused" id="focusedInput" type="text" placeholder="Firstname" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="ln" value="<?php echo $row['lastname']; ?>" class="input focused" id="focusedInput" type="text" placeholder="Lastname" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="em" value="<?php echo $row['email']; ?>" class="input focused" id="focusedInput" type="text" placeholder="Email" required>
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



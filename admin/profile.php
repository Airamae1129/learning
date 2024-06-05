<?php
// Start the session
session_start();
if (isset($_SESSION['id'])) {

    $session_id = $_SESSION['id'];

} else {
    
}

include('dbcon.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["current_password"]) && isset($_POST["new_password"]) && isset($_POST["retype_password"])) {

        $currentPassword = $_POST["current_password"];
        $newPassword = $_POST["new_password"];
        $retypePassword = $_POST["retype_password"];

        if ($newPassword === $retypePassword) {

          
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? AND password = ?");
            $stmt->bind_param("ss", $_SESSION['id'], $currentPassword);

          
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {

            
                $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
                $stmt->bind_param("ss", $newPassword, $_SESSION['id']);

                if ($stmt->execute()) {
      
                    $_SESSION['success_message'] = "<span style='font-size: 12pt; font-weight: bold;'>Password successfully updated.</span>";
                    header("Location: profile.php");
                    exit();
                } else {
                    $_SESSION['message'] = "<span style='font-size: 12pt; font-weight: bold;'>Password update failed: " . $conn->error . "</span>";
                }
            } else {
                $_SESSION['message'] = "<span style='font-size: 12pt; font-weight: bold;'>Current password is incorrect!</span>";
            }
        } else {
            $_SESSION['message'] = "<span style='font-size: 12pt; font-weight: bold;'>New password and retype password don't match!</span>";
        }
    } else {
        $_SESSION['message'] = "<span style='font-size: 12pt; font-weight: bold;'>Please fill in all the fields!</span>";
    }
}


$conn->close();
?>




<?php include('header.php'); ?>

<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('profile_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                            <?php
                            if (isset($_SESSION['success_message'])) {
                                echo '<div id="success_message" class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                                unset($_SESSION['success_message']);
                            } elseif (isset($_SESSION['message'])) {
                                echo '<div id="message" class="alert alert-danger">' . $_SESSION['message'] . '</div>';
                                unset($_SESSION['message']);
                            }
                            ?>

                            <script>
                            // Add script to remove message after 2500 milliseconds (2.5 seconds)
                            setTimeout(function() {
                                var message = document.getElementById('message');
                                if (message) {
                                    message.remove();
                                }
                            }, 2500);
                            </script>


                                <div class="alert alert-info"><i class="icon-info-sign"></i> Please Fill in required details</div>
                                <?php if(isset($errorMessage)): ?>
                                    <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                                <?php endif; ?>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="change_password" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="current_password">Current Password</label>
                                        <div class="controls">
                                            <input type="password" id="current_password" name="current_password" placeholder="Current Password" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="new_password">New Password</label>
                                        <div class="controls">
                                            <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="retype_password">Re-type Password</label>
                                        <div class="controls">
                                            <input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('footer.php'); ?>
        </div>
    </div>
    <?php include('script.php'); ?>
</body>
</html>

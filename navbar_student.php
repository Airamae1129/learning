<div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
					<span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Welcome to: Skill Forge</a>
				<div class="nav-collapse collapse">
    <ul class="nav pull-right">
        <?php 
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT firstname, lastname FROM student WHERE student_id = ?");
        $stmt->bind_param("s", $session_id);
        $stmt->execute();
        $result = $stmt->get_result();
        // Check if a row is returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Output first name and last name
            $firstname = htmlspecialchars($row['firstname']);
            $lastname = htmlspecialchars($row['lastname']);
            ?>
            <li class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user icon-large"></i><?php echo $firstname . " " . $lastname; ?> <i class="caret"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="change_password_student.php"><i class="icon-circle"></i> Change Password</a></li>
                    <li><a tabindex="-1" href="#myModal_student" data-toggle="modal"><i class="icon-picture"></i> Change Avatar</a></li>
                    <li class="divider"></li>
                    <li><a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a></li>
                </ul>
            </li>
            <?php
        } 
       ?>
    </ul>
</div>

            </div>
        </div>
</div>
<?php include('avatar_modal_student.php'); ?>	
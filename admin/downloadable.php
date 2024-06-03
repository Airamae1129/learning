<?php include('header.php'); ?>
<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Downloadable File Uploaded List</title>
    <link rel="stylesheet" href="path/to/your/css/file.css"> <!-- Add your CSS file path -->
    <script src="path/to/your/js/file.js"></script> <!-- Add your JS file path -->
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('downloadable_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Downloadable File Uploaded List</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>File Name</th>
                                            <th>Description</th>
                                            <th>Upload By</th>
                                            <th>Class</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // Adjust the path if db_connection.php is located in a different directory
                                           include('dbcon.php');

                                            if (!$conn) {
                                                die("Connection failed: " . mysqli_connect_error());
                                            }

                                            $query = mysqli_query($conn, "SELECT * FROM files 
                                                                          LEFT JOIN teacher ON teacher.teacher_id = files.teacher_id 
                                                                          LEFT JOIN teacher_class ON teacher_class.teacher_class_id = files.class_id 
                                                                          INNER JOIN class ON class.class_id = teacher_class.class_id") 
                                                                          or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['fdatein']; ?></td>
                                            <td><?php echo $row['fname']; ?></td>
                                            <td><?php echo $row['fdesc']; ?></td>
                                            <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                            <td><?php echo $row['class_name']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <?php include('script.php'); ?>
</body>
</html>

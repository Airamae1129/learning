<?php
include('header_dashboard.php');
include('session.php');
$get_id = $_GET['id'];
?>

<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('quiz_sidebar_teacher.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <?php
                        $school_year_query = mysqli_query($conn, "select * from school_year order by school_year DESC") or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Results</b></a></li>
                    </ul>
                    <!-- end breadcrumb -->

                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-right"></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="pull-right">
                                    <button class="btn btn-success" onclick="goBack()"><i class="icon-arrow-left"></i> Back</button>
                                    <script>
                                        function goBack() {
                                            window.history.back();
                                        }
                                    </script>
                                </div>
                                <form action="delete_quiz_question.php" method="post">
                                    <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                                        <a data-toggle="modal" href="#backup_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
                                        <?php include('modal_delete_quiz_question.php'); ?>
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT student.*, student_class_quiz.grade
                                                            FROM student
                                                            INNER JOIN student_class_quiz ON student.student_id = student_class_quiz.student_id
                                                            WHERE student.class_id = '$get_id' AND student_class_quiz.class_quiz_id = '$get_id'") or die(mysqli_error());

                                            while ($row = mysqli_fetch_array($query)) {
                                                $id  = $row['student_id'];
                                                $fullName = $row['firstname'] . ' ' . $row['lastname'];
                                            ?>
                                                <tr id="del<?php echo $id; ?>">
                                                    <td><?php echo $fullName; ?></td>
                                                    <td><?php echo $row['grade']; ?></td>
                                                </tr>
                                            <?php } ?>
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
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>

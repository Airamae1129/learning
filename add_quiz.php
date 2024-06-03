<?php 
include('header_dashboard.php');
include('session.php');

if (isset($_POST['save'])){
    $quiz_title = $_POST['quiz_title'];
    $description = $_POST['description'];
    $gold_points = $_POST['gold_points']; // Retrieve gold points value
    $exp_points = $_POST['exp_points'];   // Retrieve experience points value
    
    // Insert data into the quiz table, including the new columns for gold points and experience points
    mysqli_query($conn, "INSERT INTO quiz (quiz_title, quiz_description, quizGold, quizExp, date_added, teacher_id) 
                        VALUES ('$quiz_title', '$description', '$gold_points', '$exp_points', NOW(), '$session_id')") 
    or die(mysqli_error());
    
    // Redirect back to teacher_quiz.php after successful insertion
    ?>
    <script>
        window.location = 'teacher_quiz.php';
    </script>
    <?php
}
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
                        $school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Quiz</b></a></li>
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
                                    <a href="teacher_quiz.php" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
                                </div>
                                <form class="form-horizontal" method="post">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">Quiz Title</label>
                                        <div class="controls">
                                            <input type="text" name="quiz_title" id="inputEmail" placeholder="Quiz Title">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword">Quiz Description</label>
                                        <div class="controls">
                                            <input type="text" class="span8" name="description" id="inputPassword" placeholder="Quiz Description" required>
                                        </div>
                                    </div>                                       
                                    <div class="control-group">
                                        <label class="control-label" for="inputGold">Gold</label>
                                        <div class="controls">
                                            <input type="text" name="gold_points" id="inputGold" placeholder="Gold">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputExp">Experience Points</label>
                                        <div class="controls">
                                            <input type="text" name="exp_points" id="inputExp" placeholder="Experience Points">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">                                      
                                            <button name="save" type="submit" class="btn btn-success"><i class="icon-save"></i> Save</button>
                                        </div>
                                    </div>
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
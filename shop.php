<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<style>
    /* Styles for Empty Box */
    .student-info {
        width: 90%; /* Reduce width to 69% */
        height: 100px; /* Fixed height for each student info box */
        margin-bottom: 10px; /* Spacing between student info boxes */
        background-color: #f0f0f0; /* Example background color */
        position: relative; /* Enable positioning of the number */
        display: flex; /* Use flexbox for easy centering */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
        margin: 0 auto; /* Center horizontally */
    }

    /* Style for the number */
    .student-number {
        position: absolute; /* Position relative to parent */
        top: 45px; /* Adjust top position */
        left: 50px; /* Adjust left position */
        font-size: 50px; /* Adjust font size */
        font-weight: bold; /* Make font bold */
    }

    /* Style for name and level */
    .student-text {
        font-size: 20px; /* Adjust font size */
        font-weight: bold; /* Make font bold */
        text-align: center; /* Center text */
    }

    /* Scrollable Container */
    .scrollable-container {
        max-height: 500px; /* Set maximum height for scrollable container */
        overflow-y: auto; /* Enable vertical scrolling */
        width: 69%; /* Reduce width to 69% */
        margin: 0 auto; /* Center horizontally */
    }

    /* Style for the leaderboard title */
    .leaderboard-title {
        text-align: center; /* Center text */
        font-size: 24px; /* Adjust font size */
        font-weight: bold; /* Make font bold */
        margin-bottom: 50px; /* Add margin below the title */
 margin-top: 30px; /* Add margin below the title */
    }
</style>

<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            
        </div>
        <div class="row-fluid">
            <?php include('shop_sidebar.php'); ?>
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
                        <li><a href="#"><b>Leaderboard</b></a></li>
                    </ul>
                    <!-- end breadcrumb -->
                    <!-- block -->

<div class="span12">
                <!-- Leaderboard Title -->
                <div class="leaderboard-title">LEADERBOARD</div>
            </div>

                    <div class="clearfix">
                        <!-- Scrollable Container for Student Info -->
                        <div class="scrollable-container">
                            <?php
                            $student_query = mysqli_query($conn, "SELECT firstname, lastname, level FROM student ORDER BY level DESC") or die(mysqli_error($conn));
                            $counter = 1; // Initialize counter
                            while ($student_row = mysqli_fetch_assoc($student_query)) {
                                $firstname = $student_row['firstname'];
                                $lastname = $student_row['lastname'];
                                $level = $student_row['level'];
                            ?>
                                <!-- Student Info Box -->
                                <div class="student-info">
                                    <!-- Number -->
                                    <span class="student-number"><?php echo $counter; ?></span>
                                    <!-- Name and Level -->
                                    <div class="student-text">
                                        <p><?php echo $firstname . ' ' . $lastname; ?></p>
                                        <p>Level: <?php echo $level; ?></p>
                                    </div>
                                </div>
                            <?php
                                $counter++; // Increment counter
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <?php include('script.php'); ?>
</body>
</html>

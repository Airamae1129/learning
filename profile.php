
    <?php include('header_dashboard.php'); ?>
    <?php include('session.php'); ?>
    <?php
    // Assuming $conn is your database connection
    // Query to retrieve student's name, level, and gold using the student_id from the session
    $query = mysqli_query($conn, "SELECT firstname, lastname, level, gold FROM student WHERE student_id = '$session_id'");
    // Fetch the result
    $row = mysqli_fetch_assoc($query);
    // Extract first name, last name, level, and gold
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $level = $row['level'];
    $gold = $row['gold'];
    ?>
    <style>
        /* Styles for Empty Box */
        .empty-box {
            width: 33%; /* 4x8 grid, so 33.33% of the container width */
            height: 66.67vh; /* 8 parts of the 12-part vertical grid */
            background-color: #f0f0f0; /* Example background color */
            float: left;
            text-align: center; /* Center the image horizontally */
            line-height: 66.67vh; /* Center the image vertically */
 margin-bottom: 60px; /* Spacing between text boxes */
 position: relative; /* Added */

        }

        /* Styles for Text Boxes */
        .text-box {
            width: 90%; /* Occupy full width of the remaining space */
            height: 12.5vh; /* 1 part of the 12-part vertical grid */
            background-color: #ffffff; /* Example background color */
            margin-bottom: 10px; /* Spacing between text boxes */
 margin-top: 50px; /* Spacing between text boxes */
            display: flex;
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
        }

        /* Styles for Student's Name */
        .student-name,
        .level,
        .gold {
            font-size: 24px; /* Adjust font size as needed */
        }

        /* Clearfix */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

.avatar, .hat, .shirt, .pants, .hand {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: contain;
            background-repeat: no-repeat;
        }
        .hat {
            background-position: center top;
        }
        .shirt {
            background-position: center center;
        }
        .pants {
            background-position: center bottom;
        }
        .hand {
            background-position: right bottom;
        }      
    </style>


    </style>

<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('profile_sidebar.php'); ?>
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
                        <li><a href="#"><b>Profile</b></a></li>
                    </ul>
                    <!-- end breadcrumb -->
                    <!-- block -->
                    <div class="clearfix">
                        <!-- Empty Box for Images -->
                        <div class="span4 empty-box">
                            <!-- Display the image -->
 <div class="hat" style="background-image: url('<?php echo $row['hat']; ?>')"></div>
    <!-- Display the shirt image -->
    <div class="shirt" style="background-image: url('<?php echo $row['shirt']; ?>')"></div>
    <!-- Display the pants image -->
    <div class="pants" style="background-image: url('<?php echo $row['pants']; ?>')"></div>
    <!-- Display the hand image -->
    <div class="hand" style="background-image: url('<?php echo $row['hand']; ?>')"></div>
                            <img src="admin/images/roblox.png" alt="Roblox" style="max-height: 100%; max-width: 100%;">
                        </div>
                        <!-- Text Boxes -->
                        <div class="span8">
                            <!-- Text Box 1 -->
                            <div class="text-box">
                                <!-- Display student's name -->
                                <span class="student-name"><?php echo $firstname . ' ' . $lastname; ?></span>
                            </div>
                            <!-- Text Box 2 -->
                            <div class="text-box">
                                <!-- Display student's level -->
                                <span class="level">Level: <?php echo $level; ?></span>
                            </div>
                            <!-- Text Box 3 -->
                            <div class="text-box">
                                <!-- Display student's gold -->
                                <span class="gold">Gold: <?php echo $gold; ?></span>
                            </div>
                            <!-- Text Box 4 -->
                           
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
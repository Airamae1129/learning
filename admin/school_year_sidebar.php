

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        #sidebar {
            position: fixed;
            top: 50px;
            left: 0;
            width: 300px;
            padding-top: 20px;
            overflow-y: auto;
            z-index: 1020;
        }
        #sidebar.collapsed {
            width: 60px;
        }
        #sidebar .nav > li > a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
        }
        #sidebar .nav > li > a .text {
            margin-left: 10px;
            white-space: nowrap;
        }
        #sidebar.collapsed .text {
            display: none;
        }
        #sidebar .minimize-icon {
            cursor: pointer;
            text-align: right;
            margin-right: 10px;
            padding: 10px 15px;
        }
        .content {
            margin-left: 310px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .content.collapsed {
            margin-left: 70px;
        }
        @media (max-width: 767px) {
            #sidebar {
                width: 100%;
                position: relative;
                top: 0;
                height: auto;
            }
            #sidebar.collapsed {
                width: 100%;
            }
            .content {
                margin-left: 0;
            }
            .content.collapsed {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="span3">
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" id="sidebar">
        <li><a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a></li>
        <li><a href="subjects.php"><i class="icon-chevron-right"></i><i class="icon-list-alt"></i> Subject</a></li>
        <li><a href="class.php"><i class="icon-chevron-right"></i><i class="icon-group"></i> Class</a></li>
        <li><a href="admin_user.php"><i class="icon-chevron-right"></i><i class="icon-user"></i> Admin Users</a></li>
        <li><a href="department.php"><i class="icon-chevron-right"></i><i class="icon-building"></i> Department</a></li>
        <li> <a href="students.php"><i class="icon-chevron-right"></i><i class="icon-group"></i> Students</a></li>
		<li><a href="teachers.php"><i class="icon-group"></i>&nbsp;&nbsp;Teachers</a></li>
        <li><a href="downloadable.php"><i class="icon-chevron-right"></i><i class="icon-download"></i> Downloadable Materials</a></li>
        <li><a href="assignment.php"><i class="icon-chevron-right"></i><i class="icon-upload"></i> Uploaded Assignments</a></li>
        <li><a href="content.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Content</a></li>
        <li><a href="user_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> User Log</a></li>
        <li><a href="activity_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Activity Log</a></li>
        <li><a href="school_year.php"><i class="icon-chevron-right"></i><i class="icon-calendar"></i> School Year</a></li>
        <li><a href="calendar_of_events.php"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>Calendar of Events</a></li>
    </ul>
    </div>

    <!-- Your JavaScript code -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.minimize-icon').on('click', function() {
                $('#sidebar').toggleClass('collapsed');
                $('.content').toggleClass('collapsed');
                if ($('#sidebar').hasClass('collapsed')) {
                    $(this).removeClass('glyphicon-chevron-left').addClass('glyphicon-chevron-right');
                } else {
                    $(this).removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-left');
                }
            });
        });
    </script>
</body>
</html>

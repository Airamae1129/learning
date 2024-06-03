<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar with Sidebar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .navbar-brand {
            padding: 15px 15px;
            font-size: 18px;
            line-height: 20px;
            color: #0047AB;
        }
        #sidebar {
            position: fixed;
            top: 50px;
            left: 0;
            width: 250px;
            height: calc(100% - 50px);
            background-color: #f1f1f1;
            padding-top: 20px;
            overflow-y: auto;
            z-index: 1020;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: width 0.3s;
        }
        #sidebar.collapsed {
            width: 60px;
        }
        #sidebar .nav > li > a {
            padding: 10px 15px;
            color: #0047AB;
            display: flex;
            align-items: center;
        }
        #sidebar .nav > li > a .text {
            margin-left: 10px;
            white-space: nowrap;
            transition: opacity 0.3s;
        }
        #sidebar.collapsed .nav > li > a .text {
            opacity: 0;
            width: 0;
            overflow: hidden;
            white-space: nowrap;
        }
        #sidebar .nav > li > a .glyphicon {
            font-size: 22pt;
        }
        .content {
            padding: 20px;
            margin-left: 250px;
            transition: margin-left 0.3s;
        }
        .content.collapsed {
            margin-left: 60px;
        }
        .minimize-icon {
            cursor: pointer;
            text-align: right;
            margin-right: 10px;
            padding: 10px 20px;
        }
        .minimize-icon i {
            font-size: 20px;
        }
        @media (max-width: 1024px) {
            #sidebar {
                width: 0;
                transition: width 0.3s;
            }
            .content {
                margin-left: 0;
            }
            #sidebar.collapsed {
                width: 0;
            }
            .content.collapsed {
                margin-left: 0;
            }
        }
        li {
            font-size: 12pt;
            font-weight: bold;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- Button for mobile view -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="" style="font-weigh: bold;">Skill Forge ADMIN Panel</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$session_id'") or die(mysqli_error($conn));
                if ($row = mysqli_fetch_array($query)) {
                ?>
                    <li class="navlink">
                        <a href="" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> <?php echo $row['firstname'] . " " . $row['lastname']; ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                <?php
                } 
                ?>
            </ul>
        </div>
    </div>
</nav>
    
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-3 col-md-2" id="sidebar">
                <div class="minimize-icon">
                    <i class="fas fa-bars" id="sidebar-toggle"></i>
                </div>
                <ul class="nav nav-sidebar">
                    <li><a href="dashboard.php"><i class="icon-home"></i><span class="text">&nbsp;&nbsp;Dashboard</span></a></li>
                    <li><a href="subjects.php"><i class="icon-list-alt"></i><span class="text">&nbsp;&nbsp;Subject</span></a></li>
                    <li><a href="class.php"><i class="icon-group"></i><span class="text">&nbsp;&nbsp;Class</span></a></li>
                    <li><a href="admin_user.php"><i class="icon-user"></i><span class="text">&nbsp;&nbsp;Admin Users</span></a></li>
                    <li><a href="department.php"><i class="icon-building"></i><span class="text">&nbsp;&nbsp;Department</span></a></li>
                    <li><a href="students.php"><i class="icon-group"></i><span class="text">&nbsp;&nbsp;Students</span></a></li>
                    <li><a href="teachers.php"><i class="icon-group"></i><span class="text">&nbsp;&nbsp;Teachers</span></a></li>
                    <li><a href="downloadable.php"><i class="icon-download"></i><span class="text">&nbsp;&nbsp;Downloadable Materials</span></a></li>
                    <li><a href="assignment.php"><i class="icon-upload"></i><span class="text">&nbsp;&nbsp;Uploaded Assignments</span></a></li>
                    <li><a href="content.php"><i class="icon-file"></i><span class="text">&nbsp;&nbsp;Content</span></a></li>
                    <li><a href="user_log.php"><i class="icon-file"></i><span class="text">&nbsp;&nbsp;User Log</span></a></li>
                    <li><a href="activity_log.php"><i class="icon-file"></i><span class="text">&nbsp;&nbsp;Activity Log</span></a></li>
                    <li><a href="school_year.php"><i class="icon-calendar"></i><span class="text">&nbsp;&nbsp;School Year</span></a></li>
                    <li><a href="calendar_of_events.php"><i class="icon-calendar"></i><span class="text">&nbsp;&nbsp;Calendar of Events</span></a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-10 content">
                
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sidebar-toggle').on('click', function() {
                $('#sidebar').toggleClass('collapsed');
                $('.content').toggleClass('collapsed');
            });

            function toggleSidebar() {
                if ($(window).width() < 1024) {
                    $('#sidebar').addClass('collapsed');
                    $('.content').addClass('collapsed');
                } else {
                    $('#sidebar').removeClass('collapsed');
                    $('.content').removeClass('collapsed');
                }
            }
            
            $(window).on('resize', toggleSidebar);
            toggleSidebar(); // Initially toggle sidebar based on window width
        });
    </script>
</body>
</html>

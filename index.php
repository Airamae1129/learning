<!DOCTYPE html>
<html class="no-js">
<head>
    <title>Skill Forge</title>
    <meta name="description" content="Learning Management System">
    <meta name="keywords" content="CHMSC LMS,CHMSCLMS,CHMSC,LMS,CHMSCLMS.COMXA">
    <meta name="author" content="JOHN KEVIN LORAYNA">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="admin/images/favicon.ico" rel="icon" type="image">
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
    <link href="admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen"/>
    <link href="admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen"/>
    <link href="admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen"/>
    <link href="admin/assets/styles.css" rel="stylesheet" media="screen"/>
    <!-- calendar css -->
    <link href="admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <!-- index css -->
    <link href="admin/bootstrap/css/index.css" rel="stylesheet" media="screen"/>
    <!-- data table css -->
    <link href="admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen"/>
    <!-- notification  -->
    <link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
    <!-- wysiwug  -->
    <link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"/>
    <script src="admin/vendors/jquery-1.9.1.min.js"></script>
    <script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- Custom Styles -->
    <style>
        body#login {
            background-image: url('admin/images/index.jpg') !important;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 115vh;
            margin: 0;
            flex-direction: column; 
        }

        .container {
            margin: 0px;
            background: rgba(128, 128, 128, 0.8);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: auto;
            max-width: 800px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top:50px;
           
        }

        .form-signin {
            background: transparent;
            padding: 20px;
            border-radius: 8px;
            box-shadow: none;
            width: 100%;
            margin: 20px 0; /* Add vertical space between .form-signin and other elements */
            display: flex;
            flex-direction: column;
            gap: 20px; /* Add space between form elements */
        }

        .form-signin-heading {
            margin-bottom: 20px;
        }

        .title_index {
            margin-bottom: 20px;
        }

        .index_logo {
            width: 150px;
            display: block;
            margin: 0 auto;
            margin-top: 30px;
        }

        .title h3 {
            margin: 0;
            padding: 0;
            margin-top: 10px;
            text-align: center;
            font-weight: bolder;
        }

        .title p {
            text-align: center;
            font-weight: bolder;
            font-size: 10pt;
            color: whitesmoke;
            margin-bottom: 10px;
        }

        .motto {
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .container {
                max-width: 500px;
                padding: 0;
                margin: 20px;
            }

            .index_logo {
                margin-top: 50px;
                width: 100px;
            }

            .form-signin {
                width: auto;
                margin: 10px 10px;
                padding: 10px 10px;
                gap: 20px; /* Add space between form elements */
            }
        }

        .btn-primary {
            width: 100% !important;
            padding: 10px !important;
        }

        #footer-nav{
            display: flex;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important;
            margin-top: 20px ;
        }
        .navbar-inner {
            text-align: center;
        }

        .nav {
            display: inline-block;
        }

    </style>
</head>
<body id="login">
    <div class="container">
        <div class="title_index">
            <img class="index_logo" src="admin/images/Logo.png">
            <div class="title">
                <p class="chmsc">Eastwoods Professional College - Balanga</p>
               <h3 class="chmsc">Skill Forge</h3>
            </div>
            <div class="motto">
                <p style="">Excellence, Competence and Educational</p>
                <p>Leadership in Science and Technology</p>
            </div>
        </div>
        <form id="login_form1" class="form-signin" method="post">
            <h3 class="form-signin-heading"><i class="icon-lock"></i> Sign in</h3>
            <input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
            <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
            <button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-primary" type="submit">
                <i class="icon-signin icon-large"></i> Sign in
            </button>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#signin').tooltip('show');
                    $('#signin').tooltip('hide');
                });
            </script>
        </form>
        <script>
            jQuery(document).ready(function(){
                jQuery("#login_form1").submit(function(e){
                    e.preventDefault();
                    var formData = jQuery(this).serialize();
                    console.log(formData);
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: formData,
                        success: function(html){
                            if(html=='true')
                            {
                                $.jGrowl("Loading File Please Wait......", { sticky: true });
                                $.jGrowl("Welcome to Skill Forge", { header: 'Access Granted' });
                                var delay = 1000;
                                setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);
                            }else if (html == 'true_student'){
                                console.log(html);
                                $.jGrowl("Welcome to Skill Forge", { header: 'Access Granted' });
                                var delay = 1000;
                                setTimeout(function(){ window.location = 'student_notification.php'  }, delay);
                            }else
                            {
                                $.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
                            }
                        }
                    });
                    return false;
                });
            });
        </script>
    </div>
    <div class="row-fluid">
    <div class="span12">
        <div class="index-footer" style="text-align: center;">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <div class="nav-collapse collapse">
                            <ul class="nav" id="footer_nav" style="display: inline-block; margin: 0 auto; padding-top:20px">
                                <li class="divider-vertical"style="margin-left:220px;"></li>
                                <li class="active"><a href="index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="about.php"><i class="icon-info-sign"></i>&nbsp;About</a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="calendar_of_events.php"><i class="icon-calendar"></i>&nbsp;Calendar of Events</a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="#directories" data-toggle="modal"><i class="icon-phone"></i>&nbsp;Directories</a></li>
                                <!-- Modal -->
                                <li class="divider-vertical"></li>
                                <li><a href="#campuses" data-toggle="modal"><i class="icon-building"></i>&nbsp;Campuses</a></li>
                                <!-- Modal -->
                                <li class="divider-vertical"></li>
                                <li><a href="history.php"><i class="icon-file"></i>&nbsp;History</a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="developers.php"><i class="icon-user"></i>&nbsp;Developers</a></li>
                                <li class="divider-vertical"></li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
		<footer>
		<p>SkillForge Copyright 2024</p>
		</footer>
    </center>
</div>



   
	
	

    </div>
        <script src="admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="admin/assets/scripts.js"></script>
				<script>
				$(function() {
					// Easy pie charts
					$('.chart').easyPieChart({animate: 1000});
				});
				</script>
			<!-- data table -->
		<script src="admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="admin/assets/DT_bootstrap.js"></script>		
			<!-- jgrowl -->
		<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>   
				<script>
				$(function() {
					$('.tooltip').tooltip();	
					$('.tooltip-left').tooltip({ placement: 'left' });	
					$('.tooltip-right').tooltip({ placement: 'right' });	
					$('.tooltip-top').tooltip({ placement: 'top' });	
					$('.tooltip-bottom').tooltip({ placement: 'bottom' });
					$('.popover-left').popover({placement: 'left', trigger: 'hover'});
					$('.popover-right').popover({placement: 'right', trigger: 'hover'});
					$('.popover-top').popover({placement: 'top', trigger: 'hover'});
					$('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
					$('.notification').click(function() {
						var $id = $(this).attr('id');
						switch($id) {
							case 'notification-sticky':
								$.jGrowl("Stick this!", { sticky: true });
							break;
							case 'notification-header':
								$.jGrowl("A message with a header", { header: 'Important' });
							break;
							default:
								$.jGrowl("Hello world!");
							break;
						}
					});
				});
				</script>
			<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<link href="admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
			<link href="admin/vendors/chosen.min.css" rel="stylesheet" media="screen">
		<!--  -->
		<script src="admin/vendors/jquery.uniform.min.js"></script>
        <script src="admin/vendors/chosen.jquery.min.js"></script>
        <script src="admin/vendors/bootstrap-datepicker.js"></script>
		<!--  -->
			<script src="admin/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
			<script src="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
			<script src="admin/vendors/ckeditor/ckeditor.js"></script>
			<script src="admin/vendors/ckeditor/adapters/jquery.js"></script>
			<script type="text/javascript" src="admin/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        $(function() {
            // Ckeditor standard
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });
        </script>
		<!-- <script type="text/javascript" src="admin/assets/modernizr.custom.86080.js"></script> -->
		<script src="admin/assets/jquery.hoverdir.js"></script>
		<link rel="stylesheet" type="text/css" href="admin/assets//style.css" />
			<script type="text/javascript">
			$(function() {
				$('#da-thumbs > li').hoverdir();
			});
			</script>
			<script src="admin/vendors/fullcalendar/fullcalendar.js"></script>
			<script src="admin/vendors/fullcalendar/gcal.js"></script>
			<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<script src="admin/vendors/bootstrap-datepicker.js"></script>
						<script>
						$(function() {
							$(".datepicker").datepicker();
							$(".uniform_on").uniform();
							$(".chzn-select").chosen();
							$('#rootwizard .finish').click(function() {
								alert('Finished!, Starting over!');
								$('#rootwizard').find("a[href*='tab1']").trigger('click');
							});
						});
						</script></body>

</body>
</html>

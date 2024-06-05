  <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <span class="brand" href="#"><strong>&nbsp;&nbsp;&nbsp;Skill Forge Admin Panel</strong></span>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
						<?php $query= mysqli_query($conn,"select * from users where user_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $row['firstname']." ".$row['lastname'];  ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="profile.php"><i class="icon-lock"></i><strong>&nbsp;&nbsp;Change Password</strong></a>
                                    </li>
                                    <li class="divider"></li>
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="log">
                                            <button id="logout-button" class="nav-link btn btn-link"><i class="icon-signout"></i>&nbsp;<strong>Logout</strong></button>
                                        </li>
                                    </ul>
                                </nav>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>


    <script>
        document.getElementById('logout-button').addEventListener('click', function(event) {
        event.preventDefault(); 
        bootbox.confirm({
            message: "<strong>Are you sure you want to log out?</strong>",
            buttons: {
                confirm: {
                    label: 'Logout',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    window.location.href = 'logout.php'; 
                }
            }
        });
    });

    </script>

<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<?php require_once 'DataLayer/Messenger.php'; ?>
<?php $messenger = new Messenger(); ?>
<?php $userId = isset($_SESSION['id']) ? $_SESSION['id'] : 0; ?>
<?php $type = isset($_SESSION['user_type']) ? $_SESSION['user_type']: ''; ?>
<?php $sidebar = $type == 'teacher' ? 'teacher_message_sidebar.php' : 'student_message_sidebar.php'; ?>
<?php $navbar = $type == 'teacher' ? 'navbar_teacher.php' : 'navbar_student.php'; ?>


<body>
	<?php require_once $navbar; ?>
        <div class="container-fluid">
            <div class="row-fluid">
			    <?php require_once $sidebar; ?>
				<!-- START MESSAGESS -->
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<li><a href="#">Message</a><span class="divider">/</span></li>
								<li><a href="#"><b>Inbox</b></a><span class="divider">/</span></li>
								<li><a href="#">School Year: <?php echo $messenger->GetBreadCrumb(); ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
									<h4 id="contact-name">No Message</h4>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<div id="inbox-container" style=" position: relative; height: 40vh; overflow-y:auto;">
										<h5 style="text-align:center">No Message</h5>
									</div>
									<div style="position:relative; padding-top: 1rem;">
										<input id="recipient" type="hidden">
										<input id="recipient_type" type="hidden">
										<input id="message" type="text" style="width: 80%; position:relative; padding: 5px">
										<button id="send-message-button" type="button" style="width: 15%; position:relative; padding: 4px; top:-5px">Send</button>
									</div>	
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>

				<!-- START MESSAGESS -->
				
				<!-- START MESSAGE FORM -->
				<div class="span3" id="">
					<div class="row-fluid">
						<!-- block -->
				        <div class="block">
				            <div class="navbar navbar-inner block-header">
				                <div class="muted pull-left"><h4><i class="icon-pencil"></i> Contacts</h4></div>
				            </div>
				            <div class="block-content collapse in">
				                <div class="span12">
								    <ul class="nav nav-tabs">
										<li class="active">
											<a href="#" class="contact-toggle" data-name="teachers">Teachers</a>
										</li>
										<li>
											<a href="#" class="contact-toggle" data-name="students">Students</a>
										</li>
									</ul>
									<div id="teachers-container">
										<style>
											.teacher-contact:hover {
												background: lightgray;
											}
										</style>
										<?php $teachers = $messenger->GetTeachers(); ?>
										<?php if ($teachers->num_rows > 0): ?>
				        					<?php while($row = $teachers->fetch_assoc()): ?>
												<div style="cursor:pointer; border: 1px solid gray;padding: 0.5rem" 
													class="teacher-contact" 
													data-id="<?php echo $row['teacher_id']; ?>"
													data-name="<?php echo $row['firstname'].' '.$row['lastname']; ?>"
													data-type="teacher">
													<?php echo $row['firstname'].' '.$row['lastname']; ?>
												</div>
												
											<?php endwhile; ?>
										<?php endif; ?>
									</div>
									<div id="students-container">
										<?php $students = $messenger->GetStudents(); ?>
										<?php if ($students->num_rows > 0): ?>
				        					<?php while($row = $students->fetch_assoc()): ?>
												<div style="cursor:pointer; border: 1px solid gray;padding: 0.5rem" 
													class="teacher-contact" 
													data-id="<?php echo $row['student_id']; ?>"
													data-name="<?php echo $row['firstname'].' '.$row['lastname']; ?>"
													data-type="student">
													<?php echo $row['firstname'].' '.$row['lastname']; ?>
												</div>
												
											<?php endwhile; ?>
										<?php endif; ?>
									</div>
								</div>
				            </div>
				        </div>
					</div>
				</div>
				
				<!-- END MESSAGE FORM -->
				
				
            </div>
			<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
        <script>
            $(function () {
				setInterval(getLatestMessage, 10000);

				$('#sent-container').css('display', 'none');
				$('#students-container').css('display', 'none');

                $('.message-toggle').on('click', function () {
                    $messageType = $(this).data('name');


					$('.message-toggle').parent().removeClass('active');
					$(this).parent().addClass('active');

                    $('#inbox-container').css('display', 'none');
                    $('#sent-container').css('display', 'none');

                    if ($messageType == 'inbox') {
                        $('#inbox-container').css('display', 'block');
                    } else {
                        $('#sent-container').css('display', 'block');
                    }
                })
            });

			$('.contact-toggle').on('click', function () {
				$this = $(this);
				name = $this.data('name');

				$('.contact-toggle').parent().removeClass('active');
				$('#teachers-container').css('display', 'none');
				$('#students-container').css('display', 'none');

				$this.parent().addClass('active');

				if (name == 'teachers') {
					$('#teachers-container').css('display', 'block');
				} else {
					$('#students-container').css('display', 'block');
				}
			})

			$('.teacher-contact').on('click', function () {
				var name = $(this).data('name');
				var recipient = $(this).data('id');
				var recipient_type = $(this).data('type');
				var sender = '<?php echo isset($session_id) ? $session_id : 0; ?>';
				var sender_type = '<?php echo isset($_SESSION['user_type']) ? $_SESSION['user_type'] : ''; ?>'

				$('#recipient').val(recipient);
				$('#recipient_type').val(recipient_type);

				var queryString = `?sender=${sender}&sender_type=${sender_type}&recipient=${recipient}&recipient_type=${recipient_type}`;

				if (sender == '0') {
					$.jGrowl("Please Login To Your Account", { header: 'Unable to process request' });
					return;
				}

				$('#inbox-container').children().remove();

				$.ajax({
					type: "GET",
					url: 'api/messenger.php' + queryString,
					contentType: 'application/json',
					success: function (response) {
						document.getElementById('contact-name').innerHTML = name;
						response = JSON.stringify(response);
						response = JSON.parse(response);

						var result = JSON.parse(response);
						if (result.length) {
							
							result.forEach(function (item) {
								console.log(item.message);
								var sender = '<?php echo isset($session_id) ? $session_id : 0; ?>';
								if (item.sender == sender) {
									$('#inbox-container').append(
										`<div style="display:flex; justify-content: end;">
											<div class="alert alert-success" style="margin-bottom: 0; max-width:70%; display:inline-block">
												<p><small>${item.date_created}</small></p>
												<p>${item.message}</p>
											</div>
										</div><br />`
									)
								} else {
									$('#inbox-container').append(
										`<div style="display:flex; justify-content: start;">
											<div class="alert alert-light" style="margin-bottom: 0; max-width:70%; display:inline-block">
												<p><small>${item.date_created}</small></p>
												<p>${item.message}</p>
											</div>
										</div><br />`
									)
								}

								
							});
						} else {
							$('#inbox-container').append(
								`<h5 style="text-align:center">No Message</h5>`
							)
						}

						var scrollableDiv = document.getElementById('inbox-container');
						scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
					}
					
				});
			})

			$('#send-message-button').on('click', function () {
				var recipient = $('#recipient').val();
				var recipient_type = $('#recipient_type').val();
				var message = $('#message').val();
				var sender = '<?php echo isset($session_id) ? $session_id : 0; ?>';
				var sender_type = '<?php echo isset($_SESSION['user_type']) ? $_SESSION['user_type'] : ''; ?>'

				
				if (recipient == '') {
					$.jGrowl("Please select user to send message", { header: 'Unable to send message' });
					return;
				}

				$('#message').val('');

				var formData = new FormData();
      			formData.append('recipient', recipient);
      			formData.append('recipient_type', recipient_type);
      			formData.append('message', message);
      			formData.append('sender', sender);
      			formData.append('sender_type', sender_type);

				$.ajax({
					type: "POST",
					url: 'api/messenger.php',
					data: formData,
					processData: false,
       				contentType: false,
					success: function (response) {
						response = JSON.stringify(response);
						response = JSON.parse(response);
						response = JSON.parse(response);

						$('#inbox-container').append(
							`<div style="display:flex; justify-content: end;">
								<div class="alert alert-success" style="margin-bottom: 0; max-width:70%; display:inline-block">
									<p><small>${response.date_created}</small></p>
									<p>${response.message}</p>
								</div>
							</div><br />`
						)

						var scrollableDiv = document.getElementById('inbox-container');
						scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
					}
				})
			})

			function getLatestMessage() {
				var recipient = $('#recipient').val();
				var recipient_type = $('#recipient_type').val();
				var sender = '<?php echo isset($session_id) ? $session_id : 0; ?>';
				var sender_type = '<?php echo isset($_SESSION['user_type']) ? $_SESSION['user_type'] : ''; ?>'

				if (recipient != '') {
					var queryString = `?sender=${sender}&sender_type=${sender_type}&recipient=${recipient}&recipient_type=${recipient_type}`;

					$('#inbox-container').children().remove();

					$.ajax({
						type: "GET",
						url: 'api/messenger.php' + queryString,
						contentType: 'application/json',
						success: function (response) {
							response = JSON.stringify(response);
							response = JSON.parse(response);

							var result = JSON.parse(response);
							if (result.length) {
								
								result.forEach(function (item) {
									console.log(item.message);
									var sender = '<?php echo isset($session_id) ? $session_id : 0; ?>';
									if (item.sender == sender) {
										$('#inbox-container').append(
											`<div style="display:flex; justify-content: end;">
												<div class="alert alert-success" style="margin-bottom: 0; max-width:70%; display:inline-block">
													<p><small>${item.date_created}</small></p>
													<p>${item.message}</p>
												</div>
											</div><br />`
										)
									} else {
										$('#inbox-container').append(
											`<div style="display:flex; justify-content: start;">
												<div class="alert alert-light" style="margin-bottom: 0; max-width:70%; display:inline-block">
													<p><small>${item.date_created}</small></p>
													<p>${item.message}</p>
												</div>
											</div><br />`
										)
									}

									
								});
							} else {
								$('#inbox-container').append(
									`<h5 style="text-align:center">No Message</h5>`
								)
							}

							var scrollableDiv = document.getElementById('inbox-container');
							scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
						}
						
					});
				}
			}
        </script>
    </body>
</html>




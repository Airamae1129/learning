<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<?php require_once 'DataLayer/Messenger.php'; ?>
<?php $messenger = new Messenger(); ?>
<?php $userId = isset($_SESSION['id']) ? $_SESSION['id'] : 0; ?>

<body>
	<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
			    <?php include('student_message_sidebar.php'); ?>

			
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
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="read_message.php" method="post">
										
										<div style="margin: 1rem 0">
											<h4 id="contact-name">User name here</h4>
										</div>
									
                                        <div id="inbox-container" style="padding-top: 2rem; position: relative; height: 50vh; overflow-y:auto">
											<div class="alert alert-info"><i class="icon-info-sign"></i> No Message </div>

											
											<div class="alert alert-light" style="margin-bottom: 1rem; max-width:70%; display:inline-block">
												<p><small>Jun 3, 2024</small></p>
												<p>Message here kfdla;fkdla; k;lda kl;akf;adkf dal;k akdf a;kf ;ak f;lakf ,;ladkf l;askf ;lakf la;kf ;akf ,la;kf ,;alkf ,a;lkf a</p>
											</div>	

											<div style="display:flex; justify-content: end;">
												<div class="alert alert-success" style="margin-bottom: 1rem; max-width:70%; display:inline-block">
													<p><small>Jun 3, 2024</small></p>
													<p>Message here kfdla;fkdla; k;lda kl;akf;adkf dal;k akdf a;kf ;ak f;lakf ,;ladkf l;askf ;lakf la;kf ;akf ,la;kf ,;alkf ,a;lkf a</p>
												</div>
											</div>
</div>
										<div style="position:relative; padding-top: 1rem;">
												<textarea style="width: 96%"></textarea>
												<button>Send</button>
										</div>

								    	
								</form>		
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
<script type="text/javascript">
	$("#checkAll").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});	

	$(document).ready( function() {
		$('.remove').click( function() {
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_inbox_message.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your Sent message is Successfully Deleted", { header: 'Data Delete' });	
			}
			}); 		
			return false;
		});				
	});
</script>
			<script>
/* 			jQuery(document).ready(function(){
			jQuery("#reply").submit(function(e){
					e.preventDefault();
					var id = $('.reply').attr("id");
					var _this = $(e.target);
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "reply.php",
						data: formData,
						success: function(html){
						$.jGrowl("Message Successfully Sent", { header: 'Message Sent' });
						$('#reply'+id).modal('hide');
						}
						
					});
					return false;
				});
			}); */
			</script>
	

                </div>
				<!-- START MESSAGESS -->
				
				<!-- START MESSAGE FORM -->
				<div class="span3" id="">
					<div class="row-fluid">
						<!-- block -->
				        <div class="block">
				            <div class="navbar navbar-inner block-header">
				                <div id="" class="muted pull-left"><h4><i class="icon-pencil"></i> Contacts</h4></div>
				            </div>
				            <div class="block-content collapse in">
				                <div class="span12">
								    <ul class="nav nav-tabs">
										<li class="active">
											<a href="messenger.php">Teachers</a>
										</li>
										<li><a href="messenger.php">Students</a></li>
									</ul>
									<div id="techears-container">
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
													data-teacher-id="<?php echo $row['teacher_id']; ?>"
													data-teacher-name="<?php echo $row['firstname'].' '.$row['lastname']; ?>">
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
				<script>
					jQuery(document).ready(function(){
					jQuery("#send_message").submit(function(e){
							e.preventDefault();
							var formData = jQuery(this).serialize();
					
							console.log(formData);
					
							// $.ajax({
							// 	type: "POST",
							// 	url: "send_message_student.php",
							// 	data: formData,
							// 	success: function(html) {
							// 		$.jGrowl("Message Successfully Sended", { header: 'Message Sent' });
							// 		var delay = 2000;
							// 		setTimeout(function(){ window.location = 'student_message.php'  }, delay);  
							// 	}
							// });	
							return false;
						});
					});
				</script>
				<!-- END MESSAGE FORM -->
				
				
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>


        <script>
            $(function () {
				$('#sent-container').css('display', 'none');

                $('.message-toggle').on('click', function () {
                    $messageType = $(this).data('name');

					$('.message-toggle').parent().removeClass('active');
					$(this).parent().addClass('active');

                    $('#inbox-container').css('display', 'none');
                    $('#sent-container').css('display', 'none');
					
					console.log($messageType);

                    if ($messageType == 'inbox') {
                        $('#inbox-container').css('display', 'block');
                    } else {
                        $('#sent-container').css('display', 'block');
                    }
                })
            });

			$('.teacher-contact').on('click', function () {
				var name = $(this).data('teacher-name');
				var sender = '<?php echo isset($session_id) ? $session_id : 0; ?>';

				var data = {
					sender: sender,
					recipient: $(this).data('teacher-id'),
					type: 'get-message'
				}

				if (data.userId == '0') {
					$.jGrowl("Please Login To Your Account", { header: 'Unable to process request' });
					return;
				}

				$.ajax({
					type: "POST",
					url: 'api/messenger.php',
					contentType: 'application/json',
					data: JSON.stringify(data),
					success: function (response) {
						document.getElementById('contact-name').innerHTML = name;


						response = JSON.stringify(response);
						response = JSON.parse(response);

						console.log(response);


						response.forEach(function (item) {
							console.log(item);
						})
						// $.each(response, function(idx, obj){ 
						// 	var message = JSON.parse(obj);

						// 	console.log(message);
						// });
					}
					
				});
			})
        </script>
    </body>
</html>
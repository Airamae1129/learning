			<form id="login_form1" class="form-signin" method="post">
						<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign in</h3>
						<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
						<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
						<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
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
			<div id="button_form" class="transparentbox" >
<style>
        /* Add CSS styles for the transparent div */
        .transparentbox {
            width: 500px; /* Adjust the width as per your requirement */
            height: 220px; /* Adjust the height as per your requirement */
            background-color: rgba(0, 0, 0, 0); /* 0% opacity (fully transparent) */
        }
    </style>
			
			</div>
													
														
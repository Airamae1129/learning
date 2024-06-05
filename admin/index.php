<?php include('header.php'); ?>
<head>
  <style>
    body#login {
    background: linear-gradient(to bottom right, #2cb4e5, #aec6cf) !important;
      height: 100vh !important;
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
    }

    .container {
      max-width: 400px !important;
      background: #fff !important;
      border-radius: 10px !important;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) !important;
    }

    .form-signin-heading {
      text-align: center !important;
      margin-bottom: 20px !important;
    }

    .input-block-level {
      width: 100% !important;
      padding: 10px !important;
      margin-bottom: 10px !important;
    }

    .btn-primary {
      width: 100% !important;
      padding: 10px !important;
    }
  </style>
</head>
<body id="login">
  <div class="container">
    <form id="login_form" class="form-signin" method="post">
      <h3 class="form-signin-heading"><i class="icon-lock"></i> Hello Admin, Please Login</h3>
      <input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
      <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
      <button name="login" class="btn btn-primary" type="submit"><i class="icon-signin icon-"></i> Sign in</button>
    </form>
    <script>
      jQuery(document).ready(function(){
        jQuery("#login_form").submit(function(e){
          e.preventDefault();
          var formData = jQuery(this).serialize();
          console.log(formData);
          $.ajax({
            type: "POST",
            url: "login.php",
            data: formData,
            success: function(html){
              console.log(html);
              if(html=='true') {
                $.jGrowl("Welcome to Skill Forge", { header: 'Access Granted' });
                var delay = 2000;
                setTimeout(function(){ window.location = 'dashboard.php' }, delay);  
              } else {
                $.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
              }
            }
          });
          return false;
        });
      });
    </script>
  </div> <!-- /container -->
<?php include('script.php'); ?>
</body>
</html>

<?php
session_start();
if(isset($_SESSION["usn"]))
{
	header("Location: dashboard.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PES Boys Hostel</title>
  <!-- Bootstrap core CSS-->
  <link href="assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="assets/dashboard/css/dashboard.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form id="login_form">
            <div id="user_radio" class="form-row">
                <label class="custom-control custom-radio">
                  <input id="radio1" name="user_type" type="radio" class="custom-control-input" value="student" checked>
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Student</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="user_type" type="radio" class="custom-control-input" value="parent">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Parent</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio3" name="user_type" type="radio" class="custom-control-input" value="staff">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Staff</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio4" name="user_type" type="radio" class="custom-control-input" value="doctor">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Doctor</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio5" name="user_type" type="radio" class="custom-control-input" value="admin">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Admin</span>
                </label>
              </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" name="usn" type="text" aria-describedby="usernameHelp" placeholder="Enter username" required>
            <small id="usernameHelp" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" type="password" aria-describedby="loginHelp" name="password" placeholder="Password" required>
            <small id="loginHelp" class="form-text text-muted"></small>
          </div>
          </div>
          <a class="btn btn-primary m-3" id="submit_button">Login</a>
        </form>
        <div class="text-center">
          <a class="d-block small" href="register.php">Join Hostel</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="assets/dashboard/vendor/popper/popper.min.js"></script>
  <script src="assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/home/js/login.js"></script>
</body>

</html>

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
  <title>Join PES Boys Hostel</title>
  <!-- Bootstrap CSS-->
  <link href="assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="assets/dashboard/css/dashboard.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register for Hostel Admission</div>
      <div class="card-body">
          <p style="color:red">*All fields are mandatory</p>
        <form action="backend/register.php" method="post">
        <!-- STUDENT DETAILS-->
          <div class="form-group">
            <strong><p>Student Details</p></strong>
              <label for="student_name">Full Name</label>
              <input class="form-control" id="student_name" name="student_name" type="text" aria-describedby="nameHelp" placeholder="Enter student full name" required>
          </div>
          <div class="form-group">
            <label for="student_email">Email address</label>
            <input class="form-control" id="student_email" name="student_email" type="email" aria-describedby="emailHelp" placeholder="Enter student email" required>
          </div>
          <div class="form-group">
            <label for="student_phone">Phone number</label>
            <input class="form-control" id="student_phone" name="student_phone" type="number" max="9999999999" aria-describedby="phoneHelp" placeholder="Enter student phone number" required>
            <small id="phoneHelp" class="form-text text-muted">Enter 10 digit mobile number</small>
          </div>
          <div class="form-group">
            <label for="student_password">Password</label>
            <input class="form-control" id="student_password" name="student_password" type="password" aria-describedby="passwordHelp" placeholder="Student password">
            <small id="passwordHelp" class="form-text text-muted">To be used for login purpose</small>
          </div>
          <hr/>
          <!-- Parent DETAILS-->
          <div class="form-group">
            <strong><p aria-describedby="detailsHelp">Parent Details
                <small id="detailsHelp" class="form-text text-muted">Provide details of your Mother/Father</small>
            </p></strong>
                <label for="parent_name">Full Name</label>
                <input class="form-control" id="parent_name" name="parent_name" type="text" aria-describedby="nameHelp" placeholder="Enter parent full name" required>
            </div>
            <div class="form-group">
              <label for="parent_email">Email address</label>
              <input class="form-control" id="parent_email" name="parent_email" type="email" aria-describedby="emailHelp" placeholder="Enter parent email" required>
              <small id="emailHelp" class="form-text text-muted">Student usn to be used as username for parent login</small>
            </div>
            <div class="form-group">
              <label for="parent_phone">Phone number</label>
              <input class="form-control" id="parent_phone" name="parent_phone" type="number" max="9999999999" aria-describedby="phoneHelp" placeholder="Enter parent phone number" required>
              <small id="phoneHelp" class="form-text text-muted">Enter 10 digit mobile number</small>
            </div>
            <div class="form-group">
              <label for="parent_password">Password</label>
              <input class="form-control" id="parent_password" name="parent_password" type="password" aria-describedby="passwordHelp" placeholder="Parent password">
              <small id="passwordHelp" class="form-text text-muted">To be used for login purpose</small>
            </div>
            <hr/>
            <!-- LG DETAILS-->
          <div class="form-group">
            <strong><p aria-describedby="detailsHelp">Local Guardian Details
                <small id="detailsHelp" class="form-text text-muted">Provide details of your Local Guardian</small>
            </p></strong>
                <label for="lg_name">Full Name</label>
                <input class="form-control" id="lg_name" name="lg_name" type="text" aria-describedby="nameHelp" placeholder="Enter LG full name" required>
            </div>
            <div class="form-group">
              <label for="lg_email">Email address</label>
              <input class="form-control" id="lg_email" name="lg_email" type="email" aria-describedby="emailHelp" placeholder="Enter LG email" required>
            </div>
            <div class="form-group">
              <label for="lg_phone">Phone number</label>
              <input class="form-control" id="lg_phone" name="lg_phone" type="number" max="9999999999" aria-describedby="phoneHelp" placeholder="Enter LG phone number" required>
              <small id="phoneHelp" class="form-text text-muted">Enter 10 digit mobile number</small>
            </div>
            <hr/>
            <div class="form-group">
            <strong><p>Address Details</p></strong>
              <label for="permanent_address">Permanent Address</label>
              <textarea class="form-control" id="permanent_address" name="permanent_address" rows="3" placeholder="Enter permanent address of student" required></textarea>
            </div>
            <div class="form-group">
              <label for="local_address">Local Address</label>
              <textarea class="form-control" id="local_address" name="local_address" rows="3" placeholder="Enter local address of student (LG Address)" required></textarea>
            </div>
            <div class="form-group">
              <strong><p>Admission Details</p></strong>
              <label for="type">Student Type</label>
              <div class="form-row" id="type">
                <label class="custom-control custom-radio">
                  <input id="radio1" name="student_type" type="radio" class="custom-control-input" value="univ_fresher" checked>
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">University Fresher</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="student_type" type="radio" class="custom-control-input" value="univ_student">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">University Student</span>
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="admission">Admission Number</label>
                <input class="form-control" id="student_adm" name="usn" type="text" aria-describedby="usernameHelp" placeholder="Enter Admission Number" required>
              <label for="USN">Student USN</label>
                <input class="form-control" id="student_usn" name="usn" type="text" aria-describedby="usernameHelp" placeholder="Enter University Serial Number" required>
                <small id="usernameHelp" class="form-text text-muted">To be used as username to login</small>
            </div>
            <div class="form-group">
              <label for="type" aria-describedby="rooms">Room Preference<br>
                <small id="rooms">Click here for more information on room types</small></label>
              <div class="form-row" id="type">
                <label class="custom-control custom-radio">
                  <input id="radio3" name="room_type" type="radio" class="custom-control-input" value="it_block" checked>
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">IT Block</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio4" name="room_type" type="radio" class="custom-control-input" value="nbx_block">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">NBX Block</span>
                </label>
              </div>
              <div class="form-row" id="type">
                <label class="custom-control custom-radio">
                    <input id="radio5" name="room_type" type="radio" class="custom-control-input" value="new_block">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">New Block</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radio6" name="room_type" type="radio" class="custom-control-input" value="mess_block">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Mess Block</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radio7" name="room_type" type="radio" class="custom-control-input" value="mm_block">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">MM Block</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radio8" name="room_type" type="radio" class="custom-control-input" value="ih_block">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">IH Block</span>
                </label>  
              </div>
            </div>
            <div class="form-group">
              <label for="warden_date">Warden Appointment Date</label>
              <input type="date" id="warden_date" name="warden_date" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="bill_amount"><strong>Amount to be paid</label>
                  <p id="bill_amount">₹ 1,25,000</p>
                <p style="color: red;">DD for the above amount to be drawn in the name of "PES Boys Hostel" 
                  and should brought on the appointment date without fail.</strong></p>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" required>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Click here to indicate that you have read
                      and agree to the <a href="#">Rules and Regulations</a> of the PES Boys Hostel.
                    </span>
                </label>
            </div>
          <input type="submit" id="submit_button" class="btn btn-primary btn-block" />
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Home</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JavaScript-->
  <script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="assets/dashboard/vendor/popper/popper.min.js"></script>
  <script src="assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/dashboard/js/register.js"></script>
  <script>

  </script>
</body>

</html>

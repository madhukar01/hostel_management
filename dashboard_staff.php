<?php
session_start();
if(!isset($_SESSION["usn"]))
{
	header("Location: login.php");
	die();
}
else
{
  if($_SESSION["user_type"] != "staff" )
  {
    header("Location: dashboard.php");
    die();
  }
  else
    $usn = $_SESSION["usn"];
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
  <title>PES Boys Hostel Dashboard</title>
  <!-- Bootstrap core CSS-->
  <link href="assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="assets/dashboard/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="assets/dashboard/css/dashboard.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard_doctor.php">PES Hostel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard_staff.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#logoutmodal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Staff Dashboard</li>
      </ol>
      <div class="row" id="staff_buttons">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">Attendance</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" id="attendance_button" href="#">
              <span class="float-left">Proceed Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-exclamation"></i>
              </div>
              <div class="mr-5">Remarks</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" id="remarks_button" href="#">
              <span class="float-left">Proceed Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        </div>

      <div id="remarks_form">
        <div class="form-group">
          <label for="student_usn">Student USN</label>
          <input class="form-control" id="student_usn1" name="usn" type="text" aria-describedby="USN" placeholder="Enter student USN" required>
          <small id="usnHelp1" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="remarks">Remarks</label>
          <input class="form-control" id="remarks" name="desc" type="text" aria-describedby="remarksHelp" placeholder="Enter remarks" required>
          <small id="remarksnHelp" class="form-text text-muted">Enter remarks</small>
        </div>
        <a class="btn btn-primary" id="submit_button1" href="#">Submit</a>
      </div>

      <div id="attendance_form">
        <div class="form-group">
          <label for="student_usn">Student USN</label>
          <input class="form-control" id="student_usn2" name="usn" type="text" aria-describedby="USN" placeholder="Enter student USN" required>
          <small id="usnHelp2" class="form-text text-muted"></small>
        </div>
        <a class="btn btn-primary" id="submit_button2" href="#">Mark Attendance</a>
      </div>
      <div id="submit_success" class="alert alert-success">
        <strong>Success!</strong> Remarks/Attendance has been successfuly saved.
      </div>
      <div id="submit_failure" class="alert alert-danger">
        <strong>Failure!</strong>There was an error while saving the Remarks, Please try again !
      </div>
      <div id="submit_duplicate" class="alert alert-info">
        <strong>Failure!</strong>Attendance has already been marked for the student for the day !
      </div>
    </div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>PES Boys Hostel © 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="logoutmodalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutmodalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="backend/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="assets/dashboard/vendor/popper/popper.min.js"></script>
    <script src="assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/dashboard/js/dashboard.min.js"></script>
    <script src="assets/dashboard/js/dashboard_staff.js"></script>
  </div>
</body>

</html>

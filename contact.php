<?php
session_start();
if(!isset($_SESSION["usn"]))
{
	header("Location: login.php");
	die();
}
else
{
  if($_SESSION["user_type"] != "parent" )
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
  <link href="assets/dashboard/css/dashboard.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard_parent.php">PES Hostel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard_parent.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Attendance">
          <a class="nav-link" href="attendance.php">
            <i class="fa fa-fw fa-bed"></i>
            <span class="nav-link-text">Attendance</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Doctor Prescriptions">
          <a class="nav-link" href="doctor_prescription.php">
            <i class="fa fa-fw fa-user-md"></i>
            <span class="nav-link-text">Doctor Prescriptions</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Remarks by Staff">
          <a class="nav-link" href="staff_remarks.php">
            <i class="fa fa-fw fa-user-md"></i>
            <span class="nav-link-text">Remarks by Staff</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contact Office">
          <a class="nav-link" href="contact.php">
            <i class="fa fa-fw fa-user-md"></i>
            <span class="nav-link-text">Contact Office</span>
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
          <a href="dashboard_parent.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Contact Office</li>
      </ol>
      <div class="container" id="contact">
        <h3>PES Boys Hostel</h3><p>
        <h5>PES University West Campus</h5><p>
        <h5>100 Feet Ring Road, BSK III Stage Bengaluru, Karnataka 560085</h5><p>
        <h6>Office Phone number: 080 2672 4783</h6><p>
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
          <div class="modal-body">This will end your current session, Click logout to continue.</div>
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
  </div>
</body>

</html>

<?php
session_start();
if(!isset($_SESSION["usn"]))
{
	header("Location: login.php");
	die();
}
else
{
  if($_SESSION["user_type"] != "admin" )
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
        <li class="breadcrumb-item active">Admin Dashboard</li>
      </ol>
      <div id="admin_buttons">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3" id="add_staff">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user-circle-o"></i>
              </div>
              <div class="mr-5">Add Staff</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" id="add_staff_button" href="#">
              <span class="float-left">Proceed Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3" id="add_doctor">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user-md"></i>
              </div>
              <div class="mr-5">Add doctor</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" id="add_doctor_button" href="#">
              <span class="float-left">Proceed Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3" id="add_mess">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cutlery"></i>
              </div>
              <div class="mr-5">Add Mess</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" id="add_mess_button" href="#">
              <span class="float-left">Proceed Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        </div>
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3" id="delete_staff">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-user-circle-o"></i>
                </div>
                <div class="mr-5">Delete Staff</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" id="delete_staff_button" href="#">
                <span class="float-left">Proceed Now</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3" id="delete_doctor">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-user-md"></i>
                </div>
                <div class="mr-5">Delete doctor</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" id="delete_doctor_button" href="#">
                <span class="float-left">Proceed Now</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3" id="delete_mess">
        <div class="card text-white bg-info o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-cutlery"></i>
            </div>
            <div class="mr-5">Delete Mess</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" id="delete_mess_button" href="#">
            <span class="float-left">Proceed Now</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
          </div>
      </div>

      <div>
        <form id="add_staff_form">
        <div class="form-group">
          <label for="staff_usn1">Staff Username</label>
          <input class="form-control" id="staff_usn1" name="usn" type="text" aria-describedby="usnHelp1" placeholder="Enter staff username" required>
          <small id="usnHelp1" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="remarks">Staff Password</label>
          <input class="form-control" id="staff_password" name="password" type="password" aria-describedby="passwordsHelp" placeholder="Enter password" required>
          <small id="passwordsHelp" class="form-text text-muted">Enter remarks</small>
        </div>
        <a class="btn btn-primary" id="submit_button1" href="#">Add Staff</a>
      </form>
      </div>
      <div>
        <form id="delete_staff_form">
        <div class="form-group">
          <label for="staff_usn2">Staff Username</label>
          <input class="form-control" id="staff_usn2" name="usn" type="text" aria-describedby="usnHelp2" placeholder="Enter staff username" required>
          <small id="usnHelp2" class="form-text text-muted"></small>
        </div>
        <a class="btn btn-primary" id="submit_button2" href="#">Delete STaff</a>
      </form>
      </div>

      <div>
        <form id="add_doctor_form">
        <div class="form-group">
          <label for="staff_usn1">Doctor Username</label>
          <input class="form-control" id="doctor_usn1" name="usn" type="text" aria-describedby="usnHelp3" placeholder="Enter doctor username" required>
          <small id="usnHelp3" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="remarks">Doctor Password</label>
          <input class="form-control" id="doctor_password" name="password" type="password" aria-describedby="passwordsHelp" placeholder="Enter password" required>
          <small id="passwordsHelp" class="form-text text-muted"></small>
        </div>
        <a class="btn btn-primary" id="submit_button3" href="#">Add Doctor</a>
      </form>
      </div>
      <div>
        <form id="delete_doctor_form">
        <div class="form-group">
          <label for="staff_usn2">Doctor Username</label>
          <input class="form-control" id="doctor_usn2" name="usn" type="text" aria-describedby="usnHelp4" placeholder="Enter doctor username" required>
          <small id="usnHelp4" class="form-text text-muted"></small>
        </div>
        <a class="btn btn-primary" id="submit_button4" href="#">Delete Doctor</a>
      </form>
      </div>

      <div>
        <form id="add_mess_form">
        <div class="form-group">
          <label for="mess_name1">Mess Name</label>
          <input class="form-control" id="mess_name1" name="usn" type="text" aria-describedby="usnHelp5" placeholder="Enter mess name" required>
          <small id="usnHelp5" class="form-text text-muted"></small>
        </div>
        <a class="btn btn-primary" id="submit_button5" href="#">Add Mess</a>
      </form>
      </div>
      <div>
        <form id="delete_mess_form">
        <div class="form-group">
          <label for="mess_name2">Mess Name</label>
          <input class="form-control" id="mess_name2" name="usn" type="text" aria-describedby="usnHelp6" placeholder="Enter mess name" required>
          <small id="usnHelp6" class="form-text text-muted"></small>
        </div>
        <a class="btn btn-primary" id="submit_button6" href="#">Delete Mess</a>
      </form>
      </div>

      <div id="submit_success" class="alert alert-success">
        <strong>Success!</strong> Data has been successfuly saved.
      </div>
      <div id="submit_failure" class="alert alert-danger">
        <strong>Failure!</strong>There was an error while saving the data, Please try again !
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
    <script src="assets/dashboard/js/dashboard_admin.js"></script>
  </div>
</body>

</html>

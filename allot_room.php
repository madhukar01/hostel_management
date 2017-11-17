<?php
session_start();
if(!isset($_SESSION["usn"]))
{
	header("Location: login.php");
	die();
}
else
$usn = $_SESSION["usn"];
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
  <!-- Bootstrap CSS-->
  <link href="assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="assets/dashboard/css/dashboard.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard.php">PES Hostel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Analytics">
          <a class="nav-link" href="analytics.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Analytics</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
          <li>
            <a href="allot_room.php">Room Allotment</a>
          </li>
          <li>
            <a href="allot_food.php">Food Coupons</a>
          </li>
          <li>
            <a href="contact.html">Contact Office</a>
          </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="blank.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
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
      <!--Announcement section-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Announcements
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Announcements:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Warden Yama</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Door to hell will be open between 10AM to 7PM on 29th of this month. Visit office for more info on this.
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <!-- Notification section-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Notifications
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Notifications:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Server is up and running.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
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
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Room Allotment</li>
      </ol>
      <div id="room_allotment">
      <label for="student_type">Student Type</label>
      <div class="row" id="student_type">
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-university"></i>
              </div>
              <div class="mr-5">Fresher</div>
            </div>
            <a id="fresher_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-graduation-cap "></i>
              </div>
              <div class="mr-5">Hostelite</div>
            </div>
            <a id="hostelite_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <label aria-describedby="roomhelp">Room Type
      <small id="roomhelp" class="form-text text-muted">Will be shown as per student type</small></label>
      <div class="row" id="room_type_1">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">New Block</div>
            </div>
            <a id="new_block_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user-plus"></i>
              </div>
              <div class="mr-5">Mess Block</div>
            </div>
            <a id="mess_block_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user-plus"></i>
              </div>
              <div class="mr-5">MM Block</div>
            </div>
            <a id="mm_block_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
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
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">IH Block</div>
            </div>
            <a id="ih_block_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row" id="room_type_2">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">IT Block</div>
            </div>
            <a id="it_block_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">NBX Block</div>
            </div>
            <a id="nbx_block_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      </div>
      <div id="booking_success" class="alert alert-success">
        <strong>Success!</strong> Your room has been successfully booked.
      </div>
      <div id="booking_failure" class="alert alert-danger">
        <strong>Failure!</strong> Unfortunately we couldn't book your room since all rooms have been booked in the selected block.<br>
        Please reload this page to choose a different block.
      </div>
      <div id="room_booked" class="alert alert-info">
          <strong>Info!</strong> Dear student, you have already done your room booking for the year.<br>
          Please contact the Hostel office for any changes.
        </div>
        <div id="booking_error" class="alert alert-warning">
        <strong>Error !</strong> There was an error whike booking your room.
        <br> Please try again.
      </div>
    </div>
  </div>
    <!-- /.container-fluid-->
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
    <!-- Bootstrap JS-->
    <script src="assets/dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="assets/dashboard/vendor/popper/popper.min.js"></script>
    <script src="assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/dashboard/js/dashboard.min.js"></script>
    <script src="assets/dashboard/js/allot_room.js"></script>
  </div>
</body>

</html>


<!--
New block - A
Mess block - B
MM block - C
IH block- D

NBX - E
IT Block -F
-->
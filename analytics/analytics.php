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
  <link href="../assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/dashboard/css/dashboard.css" rel="stylesheet">
  <script src= "Chart.bundle.js"></script>	
	<script src= "Chart.min.js"></script>
  <script src="../assets/dashboard/js/analytics.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../dashboard.php">PES Hostel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../dashboard_student.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Analytics">
          <a class="nav-link" href="../analytics/analytics.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Analytics</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Counselling">
          <a class="nav-link" href="counselling_student.php">
            <i class="fa fa-fw fa-question-circle"></i>
            <span class="nav-link-text">Counselling</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
          <li>
            <a href="../allot_room.php">Room Allotment</a>
          </li>
          <li>
            <a href="../allot_food.php">Food Coupons</a>
          </li>
        </ul>
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
        <!-- Notification section-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Announcements
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Announcements:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-mail-forward"></i>Welcome to HMS</strong>
              </span>
              <div class="dropdown-message small">HMS Server is live</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="../alerts.php">View all alerts</a>
          </div>
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
          <a href="../dashboard_student.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Analytics</li>
      </ol>
      <!-- Area Chart-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart</div>
        <div class="card-body">
        <canvas id="mychart"></canvas>
	<div id="im"></div>
        </div>

        <div class="card-footer small text-muted">Updated yesterday at 8:00 PM</div>
      </div>
<?php
$myfile = fopen("dataset.csv", "r") or die("Unable to open file!");
// Output one line until end-of-file
//while(!feof($myfile)) {
  $headings = explode(",",fgets($myfile));
	$cnt = 0;	
	while(!feof($myfile)){
		$data[$cnt] = explode(",",fgets($myfile));
		$cnt++;
	}
	for ( $i = 0 ; $i < $cnt-1 ; $i++)
	{
		$usn[$i] = $data[$i][0];
		$room1[$i] = $data[$i][1];
		$grade1[$i] = $data[$i][2];
		$room2[$i] = $data[$i][3];
		$grade2[$i] = $data[$i][4];
	}
	for ( $i = 0 ; $i < $cnt-1 ; $i++)
	{	
			if($grade2[$i] >= $grade1[$i]) $change[$i] = 1;
			else $change[$i] = 0;
	}
	$improv = [];
	$reduce = [];
	$redroom =[];
	$rooom = [];
	for ( $i = 0 ; $i < $cnt-1 ; $i++)
	{	
		if($change[$i] == 1) {
			array_push($improv,$usn[$i]);
			array_push($rooom,$room2[$i]);
			//$improv[0] = $usn[$i];
			//$rooom[0] = $room2[$i]; 
	}
		else 
		{
			array_push($reduce,$usn[$i]);
			array_push($redroom,$room2[$i]);
		}
	}
$reduce1 = json_encode($reduce);
$redroom1 = json_encode($redroom);
	$improv1 = json_encode($improv);
	$rooom1 = json_encode($rooom);
$usn1 = json_encode($usn);
$grade11 = json_encode($grade1);
$grade21 = json_encode($grade2);
echo "<script> drawer($usn1,$grade11,$grade21);</script>";
echo "<script> improver($improv1,$rooom1,$reduce1,$redroom1);</script>";

//}
fclose($myfile);
?>
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
          <div class="modal-body">This will end your current session, Click logout to continue.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../backend/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap JS-->
    <script src="../assets/dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/dashboard/vendor/popper/popper.min.js"></script>
    <script src="../assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/dashboard/js/dashboard.min.js"></script>
  </div>
</body>
</html>

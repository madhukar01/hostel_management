<?php
session_start();
if(!isset($_SESSION["usn"]))
{
	header("Location: login.php");
	die();
}
else
{
  if($_SESSION["user_type"] == "student" )
  {
    header("Location: dashboard_student.php");
    header("Location: dashboard _student.php");
    die();
  }
  else if($_SESSION["user_type"] == "parent" )
  {
    header("Location: dashboard_parent.php");
    die();
  }
  else if($_SESSION["user_type"] == "staff" )
  {
    header("Location: dashboard_staff.php");
    die();
  }
  else if($_SESSION["user_type"] == "doctor" )
  {
    header("Location: dashboard_doctor.php");
    die();
  }
  else if($_SESSION["user_type"] == "admin" )
  {
    header("Location: dashboard_admin.php");
    die();
  }
}
?>
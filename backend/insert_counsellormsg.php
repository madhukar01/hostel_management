<?php
session_start();
header('Content-Type: application/json');
$servername = "localhost";
$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
extract($_POST);
$usn=$_SESSION["usn"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="INSERT INTO Counsellor_msg VALUES('$usn','$msg');";
$result = mysqli_query($conn, $sql);
if($result)
{
    echo "0";
}
else
{
    echo "1";
}

?>
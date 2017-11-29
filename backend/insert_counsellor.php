<?php
session_start();
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
$sql = "INSERT INTO Counsellor VALUES('$id','$paswd','')";
$result = mysqli_query($conn, $sql);
if($result)
{
    echo "1";
}
else
    echo "0";
?>
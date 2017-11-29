<?php
$servername = "localhost";
$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
extract($_POST);
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO Announcement VALUES('$day','$msg')";
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
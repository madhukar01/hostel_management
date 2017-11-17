<?php
//http://localhost/SC/book_room.php?food=1&usn=01fb14ecs083
session_start();
$servername = "localhost";
$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
extract($_GET);
$usn=$_SESSION["usn"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM Alloted_Room WHERE usn='$usn'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	echo "1";
}
else
{
    echo "0";
}
?>
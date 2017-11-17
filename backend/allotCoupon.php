<?php
//http://localhost/SC/book_room.php?food=1&usn=01fb14ecs083
session_start();
$servername = "localhost";
$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
extract($_POST);
$usn=$_SESSION["usn"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM Alloted_Coupon WHERE usn='$usn'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	echo "2";
}
else
{
	$sql1 = "SELECT * FROM Alloted_Coupon WHERE id=".$food;
	$sql2 = "SELECT * FROM Coupon WHERE id=".$food;
	$result1 = mysqli_query($conn, $sql1);
	$result2 = mysqli_query($conn, $sql2);
	$row1 = mysqli_fetch_assoc($result2);

	if ($row1['available'] > mysqli_num_rows($result1)) {
	    // output data of each row
	    
	  	$sql = "INSERT INTO Alloted_Coupon VALUES('".$usn."',".$food.")";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "1";
		} 
		else
		{
			echo "100";
		}

	}
	else
	{
		echo "0";	
	}
	
}	
 ?>

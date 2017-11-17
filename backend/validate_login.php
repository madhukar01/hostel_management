<?php
session_start();

$servername = "localhost";
$username = "madhuk_backend";
$pass= "backend@123";
$dbname = "madhuk_HOSTEL";
extract($_POST);
// Create connection
$conn = mysqli_connect($servername, $username, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if($user_type=='student')
{
	$sql = "SELECT * FROM Student WHERE usn='$usn'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    $row = mysqli_fetch_assoc($result);
	    if($password==$row['paswd'])
	    {
	        $_SESSION["usn"] = "$usn";
	    	echo "0"; 	
	    }
	    else
	    {
	    	echo "1";
	    }
	 
	} 
	else
	{
	    echo "2";
	}

	mysqli_close($conn);
}
else if($user_type=='parent')
{
	$sql = "SELECT * FROM Parent WHERE usn='$usn'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    $row = mysqli_fetch_assoc($result);
	    if($password==$row['paswd'])
	    {
	    	echo "0"; 	
	    }
	    else
	    {
	    	echo "1";
	    }
	 
	} 
	else
	{
	    echo "2";
	}

	mysqli_close($conn);
}
else if($user_type=='Staff')
{
	$sql = "SELECT * FROM Staff WHERE usn='$usn'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    $row = mysqli_fetch_assoc($result);
	    if($password==$row['paswd'])
	    {
	    	echo "0"; 	
	    }
	    else
	    {
	    	echo "1";
	    }
	 
	} 
	else
	{
	    echo "2";
	}

	mysqli_close($conn);
}

?> 

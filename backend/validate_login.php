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
	        $_SESSION["user_type"]="student";
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
	        $_SESSION["user_type"]="parent";
	         $_SESSION['usn']="$usn";
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
else if($user_type=='staff')
{
	$sql = "SELECT * FROM Staff WHERE id='$usn'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    $row = mysqli_fetch_assoc($result);
	    if($password==$row['paswd'])
	    {
	        $_SESSION["user_type"]="staff";
	         $_SESSION['usn']="$usn";
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
else if($user_type=='doctor')
{
	$sql = "SELECT * FROM Doctor WHERE id='$usn'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    $row = mysqli_fetch_assoc($result);
	    if($password==$row['paswd'])
	    {
	        $_SESSION["user_type"]="doctor";
	        $_SESSION['usn']="$usn";
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
else if($user_type=='admin')
{
	$sql = "SELECT * FROM Waden WHERE id='$usn'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    $row = mysqli_fetch_assoc($result);
	    if($password==$row['paswd'])
	    {
	        $_SESSION["user_type"]="admin";
	        $_SESSION['usn']="$usn";
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
else if($user_type=='counsellor')
{
	$sql = "SELECT * FROM Counsellor WHERE id='$usn'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    $row = mysqli_fetch_assoc($result);
	    if($password==$row['paswd'])
	    {
	        $_SESSION["user_type"]="counsellor";
	        $_SESSION['usn']="$usn";
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

<?php
session_start();
header('Content-Type: application/json');
$servername = "localhost";

$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
extract($_GET);

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM Counsellor_msg ";
$result = mysqli_query($conn, $sql);
$data=array();
if (mysqli_num_rows($result) > 0) 
{
	    // output data of each row
	    $row = mysqli_fetch_assoc($result);
	    
	    while($row)
        {
            $d=$row['msg'];
            $usn=$row['usn'];
            array_push($data,"$usn,$d");
            $row = mysqli_fetch_assoc($result);
           
        }
         echo json_encode($data);
}
else
{
      echo "0";
}

?>	    
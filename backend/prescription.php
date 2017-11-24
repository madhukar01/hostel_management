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

$sql = "INSERT INTO Prescription VALUES('$usn','$prescription');";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
        echo "0";   
    
}    
else 
    echo "2";

?>

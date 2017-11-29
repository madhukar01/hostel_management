<?php
$servername = "localhost";
$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
extract($_POST);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$mess=trim($name);
$sql="SELECT * FROM Coupon WHERE name='$mess'";
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
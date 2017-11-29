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
$sql = "SELECT * FROM Coupon";
$result = mysqli_query($conn, $sql);
$c=1;
$mx=0;
if(mysqli_num_rows($result)>0)
{
    
    $row = mysqli_fetch_assoc($result);
    while($row)
    {
        $c=(int)$row['id'];
        if($c>$mx)
            $mx=$c;
        $row = mysqli_fetch_assoc($result);
       
    }
}
$mx=$mx+1;
$sql = "INSERT INTO Coupon VALUES($mx,'$name',$coupon)";
$result = mysqli_query($conn, $sql);
if($result)
    echo "1";
else 
    echo "0";
?>
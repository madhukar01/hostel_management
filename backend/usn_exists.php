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
if($user_type=='student')
{
    $sql = "SELECT * FROM Student WHERE usn='$usn';";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "1";
    } 
    else
    {
        echo "0";
    }
}
else if($user_type=='doctor')
{
    $sql = "SELECT * FROM Doctor WHERE id='$usn';";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "1";
    } 
    else
    {
        echo "0";
    }
}
else if($user_type=='parent')
{
    $sql = "SELECT * FROM Parent WHERE usn='$usn';";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "1";
    } 
    else
    {
        echo "0";
    }
}
else if($user_type=='staff')
{
    $sql = "SELECT * FROM Staff WHERE id='$usn';";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "1";
    } 
    else
    {
        echo "0";
    }
}
else if($user_type=='admin')
{
    $sql = "SELECT * FROM Waden WHERE id='$usn';";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "1";
    } 
    else
    {
        echo "0";
    }
}
else if($user_type=='counsellor')
{
    $sql = "SELECT * FROM Counsellor WHERE id='$usn';";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "1";
    } 
    else
    {
        echo "0";
    }
}

mysqli_close($conn);


?> 

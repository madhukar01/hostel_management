<?php

session_start();
header('Content-Type: application/json');
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
$sql = "SELECT day,msg FROM Prescription WHERE usn='$usn'";
$result = mysqli_query($conn, $sql);
$data =array() ;


if(mysqli_num_rows($result)>0)
{
    
    $row = mysqli_fetch_assoc($result);
    while($row)
    {
        
        $mg=$row['msg'];
        $d=$row['day'];
        array_push($data,"$d".','."$mg" );
        $row = mysqli_fetch_assoc($result);
       
    }
     echo json_encode($data);
}
else
{
   echo json_encode($data);
}
?>
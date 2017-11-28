<?php
//http://localhost/SC/book_room.php?food=1&usn=01fb14ecs083
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
$sql = "SELECT day FROM Date WHERE usn='$usn'";
$result = mysqli_query($conn, $sql);
$data =array() ;


if(mysqli_num_rows($result)>0)
{
    
    $row = mysqli_fetch_assoc($result);
    while($row)
    {
        $dy=$row['day'];
        array_push($data,"$dy" );
        $row = mysqli_fetch_assoc($result);
       
    }
     echo json_encode($data);
}
else
{
   echo json_encode($data);
}
?>
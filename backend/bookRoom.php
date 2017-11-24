<?php

session_start();

$servername = "localhost";
$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
//$usn=$_SESSION["usn"];
extract($_GET);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM Student WHERE usn = '$usn1' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    $sql="SELECT * FROM Alloted_Room WHERE usn = '$usn1' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        echo "2";
        
    }
    else
    {
        echo "1";
    }
    
}
else
{
    echo "0";
}

?>

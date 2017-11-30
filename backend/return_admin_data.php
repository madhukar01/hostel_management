<?php

session_start();
header('Content-Type: application/json');
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
if($type=='staff')
{
    $sql = "SELECT * FROM Staff";
    $result = mysqli_query($conn, $sql);
    $data =array() ;
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
        while($row)
        {
            $d=$row['id'];
            array_push($data,"$d");
            $row = mysqli_fetch_assoc($result);
           
        }
         echo json_encode($data);
    }
    else
    {
       echo json_encode($data);
    }
}
else if($type=='doctor')
{
    $sql = "SELECT * FROM Doctor";
    $result = mysqli_query($conn, $sql);
    $data =array() ;
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
        while($row)
        {
            $d=$row['id'];
            array_push($data,"$d");
            $row = mysqli_fetch_assoc($result);
           
        }
         echo json_encode($data);
    }
    else
    {
       echo json_encode($data);
    }
}
else if($type=='mess')
{
    $sql = "SELECT * FROM Coupon";
    $result = mysqli_query($conn, $sql);
    $data =array() ;
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
        while($row)
        {
            $d=$row['name'];
            array_push($data,"$d");
            $row = mysqli_fetch_assoc($result);
           
        }
         echo json_encode($data);
    }
    else
    {
       echo json_encode($data);
    }
}
else if($type=='counsellor')
{
    $sql = "SELECT * FROM Counsellor";
    $result = mysqli_query($conn, $sql);
    $data =array() ;
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
        while($row)
        {
            $d=$row['id'];
            array_push($data,"$d");
            $row = mysqli_fetch_assoc($result);
           
        }
         echo json_encode($data);
    }
    else
    {
       echo json_encode($data);
    }
}

?>
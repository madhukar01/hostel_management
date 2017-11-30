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

$sql = "INSERT INTO Student VALUES('$usn','$student_name','$student_password','$student_phone','$student_email');";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Student insert unsuccessful";
    die("");
 
} 

$sql = "INSERT INTO Parent VALUES('$usn','$parent_name','$parent_password','$parent_phone','$parent_email');";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Parent insert unsuccessful";
    die("");
 
}

$sql = "INSERT INTO Guardian VALUES('$usn','$lg_name','$lg_phone','$lg_email');";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Guardian insert unsuccessful";
    die("");
}

$sql = "INSERT INTO Address VALUES('$usn','$local_address','$permanent_addres');";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Address insert unsuccessful";
    die("");
 
}

$sql = "INSERT INTO WadenDate VALUES('$usn','$warden_date');";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Warden Date insert unsuccessful";
    die("");
 
}
echo "<script>alert('Registered successfully, Please login to continue !'); window.location = '../login.php';</script>";
mysqli_close($conn);

?> 

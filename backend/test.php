<?php
$servername = "localhost";
$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE Remarks(staff_id VARCHAR(12),usn VARCHAR(12),msg VARCHAR(100),PRIMARY KEY(staff_id,usn,msg),FOREIGN KEY (staff_id)REFERENCES Staff(id), FOREIGN KEY (usn)REFERENCES Student(usn))
";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table Created Successfully";
 
} 
else
{
    echo "Unsuccessful";
}

mysqli_close($conn);
?>
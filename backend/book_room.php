<?php
//http://localhost/SC/book_room.php?block=A&usn=01fb14ecs083
session_start();

$servername = "localhost";
$username = "madhuk_backend";
$password = "backend@123";
$dbname = "madhuk_HOSTEL";
extract($_POST);
$usn=$_SESSION["usn"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM Alloted_Room WHERE usn = '$usn' ;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
	echo "2";
}

else
{
    $sql = "SELECT * FROM ROOM as x WHERE x.block='".$block." ' AND x.r_no in (SELECT y.r_no FROM Alloted_Room as y WHERE (x.block=y.block  AND x.r_no=y.r_no)  GROUP BY y.r_no,y.block HAVING count(y.r_no)<x.available);";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        #echo "id: " . $row["USN"]. " - Name: " . $row["name"]. " "  ."<br>"
    	#echo $row['r_no']." ".$row['block']."\n";
    	$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."')";
    	$result = mysqli_query($conn, $sql);
    	#echo "<br/>$result<br/>";
    	if ($result) {
    		echo "1";
    	} 
    	else
    	{
    		echo "100";
    	}
    
    	//echo ("alloted successfully (block,room)= ".$row['block']." ".$row['r_no']);
    }
    else
    {
    	$sql="SELECT * FROM ROOM WHERE block='".$block."' AND ((block,r_no) NOT IN (SELECT block,r_no FROM Alloted_Room))";
    	$result = mysqli_query($conn, $sql);
    	if (mysqli_num_rows($result) > 0) 
    	{
    		$row = mysqli_fetch_assoc($result);
    
    		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."');";
    		$result = mysqli_query($conn, $sql);
    		if ($result) {
    			echo "1";
    		} 
    		else
    		{
    			echo "100";
    		}		
    	}
    	else
    	{
    		echo "0";
    	}   
    } 
}
 ?>

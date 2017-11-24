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
    die("Connection faileSELECT count(block)*3 FROM ROOM WHERE block='A'd: " . mysqli_connect_error());
}
if ("$block"=="A")
{
    /*
   $sql1="SELECT count(block)*3 as ct FROM ROOM WHERE block='$block'";
   $sql2="SELECT count(block)as ct FROM Alloted_Room WHERE block='$block'";
   $result1 = mysqli_query($conn, $sql1);
   $result2 = mysqli_query($conn, $sql2);
   $row1=mysqli_fetch_assoc($result1);
   $row2=mysqli_fetch_assoc($result2);
   if(((int)$row1['ct'])==((int)$row2['ct']))
   {
       echo "2"; //room not available;
   }
   else
   {
   */
   
   
     if(isset($usn1) && isset($usn2))  
     {
        if(($usn!=$usn1)&&($usn!=$usn2)&&($usn1!=$usn2))
        {
        
            $sql="SELECT * FROM ROOM WHERE block='".$block."' AND ((block,r_no) NOT IN (SELECT block,r_no FROM Alloted_Room))";
        	$result = mysqli_query($conn, $sql);
        	if (mysqli_num_rows($result) > 0) 
        	{
        		$row = mysqli_fetch_assoc($result);
        
        		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."');";
        		$result1 = mysqli_query($conn, $sql);
        		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn1."');";
        		$result2 = mysqli_query($conn, $sql);
        	  	$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn2."');";
        		$result3 = mysqli_query($conn, $sql);
        		if ($result1 && $result2 && $result3) {
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
        else
        {
            echo "200";
        }
     }
     else if(isset($usn1))
     {
         $sql="SELECT * FROM ROOM WHERE block='".$block."' AND ((block,r_no) NOT IN (SELECT block,r_no FROM Alloted_Room))";
    	$result = mysqli_query($conn, $sql);
    	if (mysqli_num_rows($result) > 0) 
    	{
    		$row = mysqli_fetch_assoc($result);
    
    		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."');";
    		$result1 = mysqli_query($conn, $sql);
    		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn1."');";
    		$result2 = mysqli_query($conn, $sql);
    	  	if ($result1 && $result2) {
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
     else if(isset($usn2))
     {
         $sql="SELECT * FROM ROOM WHERE block='".$block."' AND ((block,r_no) NOT IN (SELECT block,r_no FROM Alloted_Room))";
    	$result = mysqli_query($conn, $sql);
    	if (mysqli_num_rows($result) > 0) 
    	{
    		$row = mysqli_fetch_assoc($result);
    
    		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."');";
    		$result1 = mysqli_query($conn, $sql);
    		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn2."');";
    		$result2 = mysqli_query($conn, $sql);
    	  	if ($result1 && $result2) {
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
     else
     {
         $sql = "SELECT * FROM ROOM as x WHERE x.block='".$block." ' AND x.r_no in (SELECT y.r_no FROM Alloted_Room as y WHERE (x.block=y.block  AND x.r_no=y.r_no)  GROUP BY y.r_no,y.block HAVING count(y.r_no)<x.available);";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $row = mysqli_fetch_assoc($result);
            	$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."')";
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
   

}
else if ("$block"=="B")
{
    if(isset($usn1))
    {    
        if($usn1==$usn)
        {
            echo "200";
        }
        else
        {
            $sql="SELECT * FROM ROOM WHERE block='".$block."' AND ((block,r_no) NOT IN (SELECT block,r_no FROM Alloted_Room))";
            $result = mysqli_query($conn, $sql);
      	
        	if (mysqli_num_rows($result) > 0) 
        	{
        		$row = mysqli_fetch_assoc($result);
        
        		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."');";
        		$result1 = mysqli_query($conn, $sql);
        		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn1."');";
        		$result2 = mysqli_query($conn, $sql);
        	  	if ($result1 && $result2) {
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
    else
    {
          $sql = "SELECT * FROM ROOM as x WHERE x.block='".$block." ' AND x.r_no in (SELECT y.r_no FROM Alloted_Room as y WHERE (x.block=y.block  AND x.r_no=y.r_no)  GROUP BY y.r_no,y.block HAVING count(y.r_no)<x.available);";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $row = mysqli_fetch_assoc($result);
            	$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."')";
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
   

}
else if ("$block"=="C")
{

    if(isset($usn1))
    {    
        if($usn1==$usn)
        {
            echo "200";
        }
        else
        {
             $sql="SELECT * FROM ROOM WHERE block='".$block."' AND ((block,r_no) NOT IN (SELECT block,r_no FROM Alloted_Room))";
            $result = mysqli_query($conn, $sql);
      	
        	if (mysqli_num_rows($result) > 0) 
        	{
        		$row = mysqli_fetch_assoc($result);
        
        		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."');";
        		$result1 = mysqli_query($conn, $sql);
        		$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn1."');";
        		$result2 = mysqli_query($conn, $sql);
        	  	if ($result1 && $result2) {
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
    else
    {
          $sql = "SELECT * FROM ROOM as x WHERE x.block='".$block." ' AND x.r_no in (SELECT y.r_no FROM Alloted_Room as y WHERE (x.block=y.block  AND x.r_no=y.r_no)  GROUP BY y.r_no,y.block HAVING count(y.r_no)<x.available);";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $row = mysqli_fetch_assoc($result);
            	$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."')";
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
  
}
else if ("$block"=="D")
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
if("$block"=="E")
{
  $sql = "SELECT * FROM ROOM as x WHERE x.block='".$block." ' AND x.r_no in (SELECT y.r_no FROM Alloted_Room as y WHERE (x.block=y.block  AND x.r_no=y.r_no)  GROUP BY y.r_no,y.block HAVING count(y.r_no)<x.available);";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) 
    {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        $sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."')";
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
if("$block"=="F")
{
  $sql = "SELECT * FROM ROOM as x WHERE x.block='".$block." ' AND x.r_no in (SELECT y.r_no FROM Alloted_Room as y WHERE (x.block=y.block  AND x.r_no=y.r_no)  GROUP BY y.r_no,y.block HAVING count(y.r_no)<x.available);";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
    	$sql = "INSERT INTO Alloted_Room VALUES(".$row['r_no'].",'".$row['block']."','".$usn."')";
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


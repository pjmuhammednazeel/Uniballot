<?php
session_start();
include("../Assets/Connection/Connection.php");

 
				  
			if(isset($_GET["pid"]))
			{
				   
				   
				   
				   $ins="insert into tbl_result(user_id,polling_datetime,candidate_id) values('".$_SESSION['uid']."',now(),'".$_GET['pid']."')";
				 
				 
				   if(mysql_query($ins))
				 {
					 echo "inserted";
				 }
				 else
				 {
					 echo "error";
				 }
			}
	  
	   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	
</head>
<body>


<?php

 $selQry = "SELECT * FROM tbl_user  f inner join tbl_candidate ct on f.user_id = ct.user_id
           WHERE f.user_id IN (
               SELECT c.user_id
               FROM tbl_candidate c
               INNER JOIN tbl_user u ON c.batch_id = u.batch_id
               WHERE u.user_id = " . $_SESSION['uid'] . ")";

$result = mysql_query($selQry);


?>
<div align="center">
  <table width="1000" border="1">
    <tr>
     <td width="147">SI no</td>
      <td width="146">Name</td>
      
      <td width="146">Vote</td>
        </tr>
    <?php
	   $i=0;
	   while($row = mysql_fetch_array($result))
	   {
		    $i++;
		    ?>
      
            
  
    
      <tr>
      <td> <?php echo $i ?>  </td>
        
        <td><?php echo $row["user_name"]?></td>
        
        
        <td><a href="Vote.php?pid=<?php echo $row["candidate_id"]?>">Vote</a>
       
        


        
      
      </tr>
     
      <?php
	   }
	  ?>
  </table>
</div>
</body>
</html>

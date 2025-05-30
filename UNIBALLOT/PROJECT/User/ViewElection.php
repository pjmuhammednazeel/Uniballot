
<?php
include("../Assets/Connection/Connection.php");
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <table width="200" border="1">
      <tr>
      <td>SL.No</td>
        <td>Name</td>
        <td><div align="center">Details</div></td>
         <td>Election date</td>
          <td>Election time</td>
      </tr>
      
      <?php
	   $i=0;
	  $selQry = "select * from tbl_assignelectionteacher r inner join tbl_election el on r.election_id=el.election_id inner join tbl_batch b on r.batch_id=b.batch_id inner join tbl_user u on b.batch_id = u.batch_id where u.user_id=".$_SESSION['uid'];
	   $data   =  mysql_query($selQry);
	   if($row = mysql_fetch_array($data))
	   {
		    ?>
      <tr>
        <td> <?php echo $i ?>  </td>
        <td><?php echo $row["election_name"]?></td>
        <td><?php echo $row["election_details"]?></td>
        <td><?php echo $row["election_date"]?></td>
        <td><?php echo $row["election_time"]?></td>
		<td>
		<a href="ViewElection.php?eid=<?php echo $row["assignelectionteacher_id"]?>">click here to apply for candidate</a>
		</td>

      </tr>
      <?php
				  
			if(isset($_GET["eid"]))
			{
				   
				   
				   
				   $ins="insert into tbl_candidate(user_id,election_id,batch_id,submission_date) values('".$_SESSION['uid']."','".$row['election_id']."','".$row['batch_id']."',curdate())";
				 
				 
				   if(mysql_query($ins))
				 {
					 echo "inserted";
				 }
				 else
				 {
					 echo "error";
				 }
			}
	   }
	   ?>
    </table>
</body>
</html>
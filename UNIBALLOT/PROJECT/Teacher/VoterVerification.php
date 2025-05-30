<?php
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET['aid']))
{
  $upQry= "update tbl_user set user_status = 1 where user_id = ".$_GET['aid'];
  mysql_query($upQry);

}
if(isset($_GET['rid']))
{
  $upQry= "update tbl_user set user_status = 2 where user_id = ".$_GET['rid'];
  mysql_query($upQry);

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$selQry = "select * from tbl_election e inner join tbl_assignelectionteacher a on e.election_id = a.election_id inner join tbl_user  u on a.batch_id = u.batch_id where a.teacher_id = ".$_SESSION['etid'];

$result = mysql_query($selQry);

?>
<div align="center">
  <table width="1000" border="1">
    <tr>
      <td width="147">SI no</td>
      <td width="146">Name</td>
      <td width="145">Email</td>
      <td width="103">Admission no</td>
      <td width="103">Department name</td>
      <td width="100">Batch name</td>
      <td width="99">Roll no</td>
      <td width="105">Status</td>
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
        <td><?php echo $row["user_email"]?></td>
        <td><?php echo $row["user_admissionno"]?></td>
        <td><?php echo $row["department_name"]?></td>
        <td><?php echo $row["batch_name"]?></td>
        <td><?php echo $row["user_rollno"]?></td>
        <td><a href="VoterVerification.php?aid=<?php echo $row["user_id"]?>">Accept</a><a href="VoterVerification.php?rid=<?php echo $row["user_id"]?>">Reject</a></td>


        
      
      </tr>
      <?php
	   }
	   ?>
  </table>
</div>
</body>
</html>

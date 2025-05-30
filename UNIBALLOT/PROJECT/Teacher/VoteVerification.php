<?php
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET['aid']))
{
  $upQry= "update tbl_result set polling_status = 1 where polling_id = ".$_GET['aid'];
  mysql_query($upQry);

}
if(isset($_GET['rid']))
{
  $upQry= "update tbl_result set polling_status = 2 where polling_id = ".$_GET['rid'];
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
  $selQry = "SELECT *, ud2.user_name as candidate,ud.user_name as voter,ud.user_rollno as rollnum, ud.user_admissionno as adno
FROM tbl_result AS rd
INNER JOIN tbl_user AS ud ON rd.user_id = ud.user_id
INNER JOIN tbl_candidate AS cg ON rd.candidate_id = cg.candidate_id inner join tbl_user ud2 on cg.user_id = ud2.user_id
WHERE rd.user_id IN (
  SELECT u.user_id
  FROM tbl_user AS u
  WHERE u.batch_id = (
    SELECT b.batch_id
    FROM tbl_batch AS b
    INNER JOIN tbl_assignelectionteacher AS a ON b.batch_id = a.batch_id
    WHERE a.teacher_id = ".$_SESSION['etid']."
  )
)  and rd.polling_status = 0";




$result = mysql_query($selQry);

?>
<div align="center">
  <table width="1000" border="1">
    <tr>
      <td >SI no</td>
      <td width="146">Name</td>
      <td width="146">Candidate</td>
     
      <td width="103">Admission no</td>
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
        <td><?php echo $row["voter"]?></td>
        <td><?php echo $row["candidate"]?></td>
        <td><?php echo $row["adno"]?></td>
       <td><?php echo $row["rollnum"]?></td>
       <td><a href="VoteVerification.php?aid=<?php echo $row["polling_id"]?>">Accept</a><a href="VoteVerification.php?rid=<?php echo $row["polling_id"]?>">Reject</a></td>
      


        
      
      </tr>
      <?php
	   }
	   ?>
  </table>
</div>
</body>
</html>

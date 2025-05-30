<?php
session_start();
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
 $selQry = "select * from tbl_assignelectionteacher v inner join tbl_election e on v.election_id = v.election_id inner join tbl_assignelectionteacher a on a.assignelectionteacher_id = v.assignelectionteacher_id inner join tbl_batch b on v.batch_id=b.batch_id  inner join tbl_department de on b.department_id=de.department_id where v.assignelectionteacher_id ".$_SESSION['vatid'];
$result = mysql_query($selQry);
$data = mysql_fetch_array($result);

?>
<form id="form19" name="form1" method="post" action="">
<div align="center">
  <table width="200" border="1">
    <tr>
      <td>Election Name</td>
       <td>Election Details</td>
       <td>Election Date</td>
       <td>Election Time</td>
       <td>Department</td>
        <td>Batch</td>
         <td>View Voter Verification</td>

      <tr>
	  <td><?php  echo $data['election_name']?></td>
    
    <td><?php  echo $data['election_details']?></td>
    
      <td><?php  echo $data['election_date']?></td>
      <td><?php  echo $data['election_time']?></td>
      <td><?php  echo $data['department_name']?></td>
      <td><?php  echo $data['batch_name']?></td>
      <td><a href=voterverification.php> voterverification</a></td>
      <td></td>
    </tr>
  </table>
</div>
</form>
</body>
</html>
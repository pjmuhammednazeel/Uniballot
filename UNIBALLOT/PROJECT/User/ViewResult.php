<?php
session_start();
include("../Assets/Connection/Connection.php");

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
  $selQry = "SELECT c.candidate_id, COUNT(r.polling_id) AS vote_count
   FROM tbl_candidate c
   LEFT JOIN tbl_result r ON c.candidate_id = r.candidate_id
   WHERE c.batch_id = (SELECT b.batch_id
                      FROM tbl_batch b
                      INNER JOIN tbl_user u ON b.batch_id = u.batch_id
                      WHERE u.user_id = " . $_SESSION['uid'] . ")
   GROUP BY c.candidate_id
   ORDER BY vote_count DESC
   LIMIT 1";
   $result = mysql_query($selQry);
$data = mysql_fetch_array($result);
   $userdata="select * from tbl_candidate c inner join  tbl_user  u on u.user_id=c.user_id where c.candidate_id='".$data["candidate_id"]."'";
   //echo $userdata;
   $usere=mysql_query($userdata);
   $user=mysql_fetch_array($usere);
 



 

    ?>
    <form id="form19" name="form1" method="post" action="">
<div align="center">
  <table width="200" border="1">
    <tr>
      <td>Candidate Name</td>
      <td>vote count </td>
       
      <tr>
	  <td><?php  echo $user['user_name']?></td>
      <td><?php  echo $data['vote_count']?></td>
   
      <td></td>
    </tr>
  </table>
</div>
</form>
    
</body>
</html>
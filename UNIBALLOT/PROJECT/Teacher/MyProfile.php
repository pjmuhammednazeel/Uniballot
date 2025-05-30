<?php
session_start();
include("../Assets/Connection/Connection.php");
$selQry = "select * from tbl_electionteacher where electionteacher_id=".$_SESSION['etid'];
$dataQry=mysql_query($selQry);
$rowUser=mysql_fetch_array($dataQry);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>	
<form id="form2" name="form2" method="post" action="">
<table width="200" border="1">
    <tr>
     
      <td><img src="../Assets/Files/User/<?php echo $rowUser['electionteacher_photo'] ?>" height="250px"/></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php  echo $rowUser['electionteacher_name']?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php  echo $rowUser['electionteacher_email']?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php  echo $rowUser['electionteacher_contact']?></td>
    </tr>
</table>
</form>
</body>
</html>
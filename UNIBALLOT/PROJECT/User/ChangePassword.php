<?php
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST["update"]))
{
	$selQry = "select * from tbl_user  where user_id = ".$_SESSION['uid'];
$result = mysql_query($selQry);
$data = mysql_fetch_array($result);
       $newpass=$_POST['newpass'];
	   
	   $upQry = "update tbl_user set user_password = '".$newpass."' where user_id = ".$_SESSION['uid'];
	   if($data['user_password']==$_POST['pass'])
	   {
		   if($_POST['newpass']==$_POST['newpass2'])
	   {
	   
	   if(mysql_query($upQry))
	 {
		 echo "Updated";
	 }
	 else
	 {
		 echo "error";
	 }
	   }
	   
	   }
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


?>

<form id="form1" name="form1" method="post" action="">
  [
  <table width="200" border="1">
    <tr>
      <td>Current Password</td>
      <td><label for="pass"></label>
      <input type="password" name="pass" id="pass"/> </td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="newpass"></label>
      <input type="password" name="newpass" id="newpass" /></td>
    </tr>
    <tr>
      <td>Confirm password</td>
      <td><label for="newpass"></label>
      <input type="password" name="newpass2" id="newpass2" /></td>
    </tr>
    <tr>
      <td height="23" colspan="2" align="center"><input type="submit" name="update" id="update" value="update" /></td>
    </tr>
  </table>
</form>
</body>
</html>
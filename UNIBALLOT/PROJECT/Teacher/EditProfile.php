
<?php
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
       $name=$_POST['txt_name'];
	   $email=$_POST['txt_email'];
	   $contact=$_POST['txt_contact'];
	   
	   $upQry = "update tbl_electionteacher set electionteacher_name = '".$name."', electionteacher_email = '".$email."',electionteacher_contact = '".$contact."' where electionteacher_id = ".$_SESSION['etid'];
	   
	   
	   if(mysql_query($upQry))
	 {
		 echo "Updated";
	 }
	 else
	 {
		 echo "error";
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
$selQry = "select * from tbl_electionteacher  where electionteacher_id = ".$_SESSION['etid'];
$result = mysql_query($selQry);
$data = mysql_fetch_array($result);

?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php  echo $data['electionteacher_name']?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email"  value="<?php  echo $data['electionteacher_email']?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"  value="<?php  echo $data['electionteacher_contact']?>"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="cancel" id="cancel" value="Cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
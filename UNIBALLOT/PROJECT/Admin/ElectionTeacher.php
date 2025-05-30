<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
       $name=$_POST['txt_name'];
	   $email=$_POST['txt_email'];
	   $password=$_POST['txt_password'];
	   
	   $contact=$_POST['txt_contact'];
	   
	   $proof=$_FILES['file_proof']['name'];
	   $path=$_FILES ['file_proof']['tmp_name'];
	   move_uploaded_file($path,"../Assets/Files/User/".$proof);
	   
	    $photo=$_FILES['file_photo']['name'];
	   $path=$_FILES ['file_photo']['tmp_name'];
	   move_uploaded_file($path,"../Assets/Files/User/".$photo);
	   
	   
	   
	   $ins="insert into tbl_electionteacher(electionteacher_name,electionteacher_email,electionteacher_password,electionteacher_contact,electionteacher_proof,electionteacher_photo) values('".$name."','".$email."','".$password."','".$contact."','".$proof."','".$photo."')";
	 //echo $ins;
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
<form action="" method="post" enctype="multipart/form-data" name="form8" id="form8">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td>
        <label for="txt_name"></label>
        <input type="text" name="txt_name" id="txt_name" />
    </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <label for="txt_email"></label>
        <input type="text" name="txt_email" id="txt_email" />
     </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
        <label for="txt_password"></label>
        <input type="text" name="txt_password" id="txt_password" />
   </td>
    </tr>
    <tr>
      <td>Proof</td>
      <td>
        <label for="filefield_proof"></label>
        <input type="file" name="file_proof" id="file_proof" />
     </td>
    </tr>
    <tr>
      <td>Photo</td>
      <td>
        <label for="file"></label>
        <input type="file" name="file_photo" id="file_photo" />
    </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td>
        <label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" />
     </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
          <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
    </form>
</div>

</body>
</html>
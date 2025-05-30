<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_assign"]))
{
       $name=$_POST['txt_name'];
	   $details=$_POST['txt_details'];
	   
	   $electiondate=$_POST['txt_electiondate'];
	   $electiontime=$_POST['txt_electiontime'];
	   
	   
	   $ins="insert into tbl_election(election_name,election_details,election_declareddate,election_date,election_time) values('".$name."','".$details."',curdate(),'".$electiondate."','".$electiontime."')";
	 
	 
	   if(mysql_query($ins))
	 {
		 echo "inserted";
	 }
	 else
	 {
		 echo "error";
	 }
}
if ($_GET["eid"]) {
  $did = $_GET["eid"];
  $delQry = "delete from tbl_election where election_id='$did'";
  mysql_query($delQry);
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
<form action="" method="post" enctype="multipart/form-data" name="form7" id="form">
  <table width="269" border="1">
    <tr>
      <td width="109">Name</td>
      <td width="144">
        <label for="txt_name"></label>
        <input type="text" name="txt_name" id="txt_name" />
     </td>
    </tr>
    <tr>
      <td>Details</td>
      <td>
        <label for="txt_details"></label>
        <input type="text" name="txt_details" id="txt_details" />
      </td>
    </tr>
    <tr>
      <td>Election Date</td>
      <td>
        <label for="txt_electiondate"></label>
        <input type="text" name="txt_electiondate" id="txt_electiondate" />
        </td>
    </tr>
    <tr>
      <td>Election Time</td>
      <td>
        <label for="txt_electiontime"></label>
        <input type="text" name="txt_electiontime" id="txt_electiontime" />
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        
          <input type="submit" name="btn_assign" id="btn_assign" value="assign" />
        
      </div></td>
    </tr>
  </table>
  <table width="200" border="1">
      <tr>
      <td>SL.No</td>
        <td>Name</td>
        <td><div align="center">Details</div></td>
         <td>Election date</td>
          <td>Election time</td>
        <td>Action</td>
                

      </tr>
      
      <?php
	   $i=0;
	   $selQry = "select * from tbl_election";
	   $data   =  mysql_query($selQry);
	   while($row = mysql_fetch_array($data))
	   {
		    $i++;
		    ?>
      <tr>
        <td> <?php echo $i ?>  </td>
        <td><?php echo $row["election_name"]?></td>
        <td><?php echo $row["election_details"]?></td>
        <td><?php echo $row["election_date"]?></td>
        <td><?php echo $row["election_time"]?></td>
        
        <td><a href="AssignElectionTeacher.php?eid=<?php echo $row["election_id"]?>">assign</a></td>
        
      </tr>
      <?php
	   }
	   ?>
    </table>
  </form>
</div>
</body>
</html>
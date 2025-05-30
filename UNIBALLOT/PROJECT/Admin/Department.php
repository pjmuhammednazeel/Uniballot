<?php
$dep = "";
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $dep = $_POST["department"];
  $ins = "insert into tbl_department(department_name) values('$dep')";
  mysql_query($ins);

}
if ($_GET["did"]) {
  $did = $_GET["did"];
  $delQry = "delete from tbl_department where department_id='$did'";
  mysql_query($delQry);
}
?>





<html>

<head>
  <title>DEPARTMENT</title>
</head>

<body>
  <form id="form1" name="form1" method="post" action="">
    <h1 align="center"> DEPARTMENT </h1>
    <div align="center">
      <table width="200" border="1">
        <tr>
          <td>Department
          <td><label for="txt_depart"></label>
            <input type="text" name="department" id="txt_depart" />
        </tr>
        <tr></tr>
        <tr>
          <td colspan="5" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
        </tr>
      </table>
    </div>
    <div align="center">
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
    <div align="center">
      <table width="200" border="1">
        <tr>
          <td>SL.No</td>
          <td>
            <div align="center">Department</div>
          </td>
          <td>Action</td>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_department";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
          $i++;
          ?>
          <tr>
            <td>
              <?php echo $i ?>
            </td>
            <td>
              <?php echo $row["department_name"] ?>
            </td>
            <td><a href="Department.php?did=<?php echo $row["department_id"] ?>">Delete</a></td>
          </tr>
          <?php
        }
        ?>
      </table>
    </div>
  </form>
</body>

</html>
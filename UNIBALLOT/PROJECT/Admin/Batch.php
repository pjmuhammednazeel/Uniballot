<?php
include("../Assets/Connection/Connection.php");
if (isset($_POST["submit"])) {
  $dept = $_POST["drop_dept"];
  $batch = $_POST["txt_batch"];

  $insQry = "insert into tbl_batch(batch_name,department_id) values('$batch','$dept')";
  mysql_query($insQry);

}

if ($_GET["bid"]) {
  $bid = $_GET["bid"];
  $delQry = "delete from tbl_batch where batch_id='$bid'";
  mysql_query($delQry);
}
?>

<form action="" method="post">
  <table width="200" border="1">
    <tr>
      <td>Department</td>
      <td><label for="drop_dept"></label>
        <select name="drop_dept" id="drop_dept">
          <option value="">-----Select-----</option>
          <?php
          $selQry = "select * from tbl_department";
          $data = mysql_query($selQry);
          while ($row = mysql_fetch_array($data)) {
            ?>
            <option value="<?php echo $row["department_id"] ?>">
              <?php echo $row["department_name"] ?>
            </option>
            <?php
          }

          ?>

        </select>
    </tr>
    <tr>
      <td>Batch</td>
      <td><label for="txt_batch"></label>
        <input type="text" name="txt_batch" id="txt_batch" />
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>SL NO</td>
      <td>Department</td>
      <td>Batch</td>
      <td>Action</td>
    </tr>
    <?php
    $i = 0;
    $sel = "select * from tbl_batch b inner join tbl_department d on b.department_id=d.department_id";
    $datas = mysql_query($sel);
    while ($rows = mysql_fetch_array($datas)) {
      $i++;
      ?>


      <tr>
        <td>
          <?php echo $i ?>
        </td>
        <td>
          <?php echo $rows["department_name"] ?>
        </td>
        <td>
          <?php echo $rows["batch_name"] ?>
        </td>
        <td><a href="Batch.php?bid=<?php echo $rows["batch_id"] ?>">Delete</a></td>
      </tr>
      <?php
    }
    ?>
  </table>
</form>
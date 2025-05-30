<?php
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $electionteacher = $_POST['select_electionteacher'];
  $batch = $_POST['select_batch'];


  echo $ins = "insert into tbl_assignelectionteacher(teacher_id,batch_id,election_id) values('" . $electionteacher . "','" . $batch . "','" . $_GET['eid'] . "')";
  if (mysql_query($ins)) {
    echo "inserted";
  } else {
    echo "error";
  }
}
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
</head>

<body>
  <div align="center">
    <form action="" method="post" enctype="multipart/form-data" name="form69" id="form69">
      <table width="200" border="1">
        <tr>
          <td>Election Teacher</td>
          <td>
            <label for="select_teacher"></label>
            <select name="select_electionteacher" id="select_electionteacher" onChange="getBatch(this.value)">
              <option>...select...</option>
              <?php
              $sel = "select * from tbl_electionteacher";
              //echo $sel;
              $res = mysql_query($sel);
              while ($data = mysql_fetch_array($res)) {
                ?>
                <option value="<?php echo $data["electionteacher_id"]; ?>">
                  <?php echo $data["electionteacher_name"]; ?>
                </option>
                <?php
              }
              ?>
            </select>

          </td>
        </tr>
        <tr>
          <td>Department</td>
          <td>
            <label for="select_department"></label>
            <select name="select_department" id="select_department" onChange="getBatch(this.value)">
              <option>...select...</option>
              <?php
              $sel = "select * from tbl_department";
              //echo $sel;
              $res = mysql_query($sel);
              while ($data = mysql_fetch_array($res)) {
                ?>
                <option value="<?php echo $data["department_id"]; ?>">
                  <?php echo $data["department_name"]; ?>
                </option>
                <?php
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Batch</td>
          <td>
            <label for="select_batch"></label>
            <select name="select_batch" id="select_batch">
              <option>...select...</option>

            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div align="center">

              <input type="submit" name="btn_submit" id="btn_submit" value="submit" />

            </div>
          </td>
        </tr>
      </table>
    </form>
    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
      function getBatch(did) {
        $.ajax({
          url: "../Assets/AjaxPages/AjaxBatch.php?did=" + did,
          success: function (html) {
            $("#select_batch").html(html);
          }
        });
      }
    </script>

  </div>
</body>

</html>
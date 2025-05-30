<option value="">----Select----</option>

<?php
include("../Connection/Connection.php");
        
              $department = $_GET["did"];
              $selQry = "select * from tbl_batch where department_id='$department'";
              $data = mysql_query($selQry);
              while($row = mysql_fetch_array($data))
              {
               ?>
              <option value="<?php echo $row['batch_id'] ?>">
			                 <?php echo $row['batch_name'] ?></option>
							 
							 <?php
			  }
			  ?>
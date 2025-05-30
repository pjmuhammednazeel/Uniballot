<?php
session_start();
echo $_session['uname']."is logged in";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<br />
<a href=AssignElectionTeacher.php> assignteacher</a><br />
<a href=Batch.php> Batch</a><br />
<a href=Department.php> Department</a><br />
<a href=election.php> election</a><br />
<a href=electonteacher.php> electionteacher</a><br />
</body>
</html>
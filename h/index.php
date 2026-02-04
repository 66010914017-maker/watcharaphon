<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วัชรพล เวชแพทย์(หนึ่ง)</title>
</head>

<body>
<h1>เข้าสู่ระบบหลังบ้าน - วัชรพล เวชแพทย์(หนึ่ง)</h1>

<form method="post"action="">
Username <input type="text" name="auser" autofocus required><br>
Password <input type="password"name="aped" required><br>
<button type="submit" name="Submit">LOGIN</button>
</form>

<?php
if(isset($_POST['Sudmit'])) {
	include_once("connectdb.php");
	$sql = "SELECT * FROM admin WHERE a_username='{$_POST['auser']}'AND a_password='{$_POST['auser']}'LIMIT 1";
	$rs = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($rs);
	
	echo $num ;
}
?>
</body>
</html>
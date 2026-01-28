<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วัชรพล เวชแพทย์ (หนึ่ง)</title>
</head>

<body>
<h1> วัชรพล เวชแพทย์ (หนึ่ง) - โปรแกรมสูตรคูณ </h1>

<form method="post" action="">
	แม่สูตรคูณ <input type="number" min="2" max="1000" name="a" autofocus required>
    <button type="submit" name="Submit">KO</button>
</form>
<hr>

<?php
if(isset($_POST['Submit'])) {
	$m = $_POST['a'];
for($i=1; $i<=12; $i++){
	$x = $m * $i ;
  	echo "{$m} x {$i} = {$x}<br>";
	}
}
?>

</body>
</html>
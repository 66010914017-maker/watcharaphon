<?php
		$host = "localhost";
		$user = "root";
		$pwd = "Pw@1458800032693";
		$db = "4017db";
		$conn = mysqli_connect($host, $user, $pwd, $db) or die ("เชื่อมต่อฐานข้อมูลไม่ได้");
		mysqli_query($conn, "SET NAMES utf8");
?>

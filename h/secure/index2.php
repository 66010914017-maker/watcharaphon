<?php
	include_once("check_login.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>หน้าหลักแอดมิน - วัชรพล </title>
</head>
<h1>หน้าหลักแอดมิน - วัชรพล </h1>
<?php echo "แอดมิน: ". $_SESSION['aname'];?><br>

<ul>
	<a href="products.php"><il>จัดการสินค้า</il></a>
    <a href="order.php"><il>จัดการออเดอร์</il></a>
    <a href="customers.php"><il>จัดการลูกค้า</il></a>
    <a href="logout.php"><il>ออกจากระบบ</il></a>
</ul>
<body>
</body>
</html>
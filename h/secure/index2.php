<?php
    session_start(); // ตรวจสอบว่ามี session_start() เพื่อดึงค่า $_SESSION
    include_once("check_login.php"); // ไฟล์นี้ควรทำหน้าที่เช็คว่าถ้าไม่มี Session ให้ดีดกลับไปหน้า login
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลักแอดมิน - วัชรพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #fff5f8; /* ชมพูอ่อนมาก */
            font-family: 'Sarabun', sans-serif;
        }
        .navbar-custom {
            background-color: #f06292; /* ชมพูเข้มขึ้นมาหน่อย */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .card-menu {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s;
            background: white;
            text-decoration: none;
            color: #444;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(240, 98, 146, 0.2);
            color: #f06292;
        }
        .icon-box {
            font-size: 3rem;
            color: #f06292;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-5">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <div class="d-flex align-items-center text-white">
            <i class="bi bi-person-circle me-2"></i>
            <span>แอดมิน: <?php echo $_SESSION['aname']; ?></span>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-6 fw-bold" style="color: #ad1457;">จัดการระบบหลังบ้าน</h1>
        <p class="text-muted">ยินดีต้อนรับคุณ <?php echo $_SESSION['aname']; ?> เข้าสู่ระบบ</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-3">
            <a href="products.php" class="card card-menu h-100 text-center p-4">
                <div class="icon-box mb-3"><i class="bi bi-box-seam"></i></div>
                <h5>จัดการสินค้า</h5>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="order.php" class="card card-menu h-100 text-center p-4">
                <div class="icon-box mb-3"><i class="bi bi-cart-check"></i></div>
                <h5>จัดการออเดอร์</h5>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="customers.php" class="card card-menu h-100 text-center p-4">
                <div class="icon-box mb-3"><i class="bi bi-people"></i></div>
                <h5>จัดการลูกค้า</h5>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="logout.php" class="card card-menu h-100 text-center p-4 border-danger-subtle">
                <div class="icon-box mb-3 text-danger"><i class="bi bi-box-arrow-right"></i></div>
                <h5 class="text-danger">ออกจากระบบ</h5>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
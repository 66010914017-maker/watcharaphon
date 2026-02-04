<?php
    // ตรวจสอบสถานะการล็อกอินก่อนเข้าถึงเนื้อหา
    include_once("check_login.php"); 
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
            background-color: #fce4ec; /* พื้นหลังชมพูพาสเทล */
            font-family: 'Sarabun', sans-serif;
        }
        .navbar-custom {
            background-color: #f06292; /* แถบเมนูสีชมพู */
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .menu-card {
            border: none;
            border-radius: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: #333;
            background: #ffffff;
        }
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(240, 98, 146, 0.3);
            color: #f06292;
        }
        .icon-size {
            font-size: 3.5rem;
            color: #f06292;
        }
        .logout-card:hover {
            color: #d32f2f !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-custom mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">ADMIN PANEL</a>
        <span class="navbar-text text-white">
            <i class="bi bi-person-heart me-1"></i>
            แอดมิน: <?php echo $_SESSION['aname']; // แสดงชื่อแอดมินจาก Session ?>
        </span>
    </div>
</nav>

<div class="container">
    <div class="row mb-5 text-center">
        <div class="col">
            <h1 class="display-5 fw-bold" style="color: #ad1457;">จัดการสินค้า</h1>
            <p class="text-muted">เลือกเมนูที่คุณต้องการจัดการ</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-6 col-md-3">
            <a href="products.php" class="card h-100 menu-card p-4 text-center">
                <div class="icon-size mb-3"><i class="bi bi-box-seam-fill"></i></div>
                <h5 class="fw-bold">จัดการสินค้า</h5>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="orders.php" class="card h-100 menu-card p-4 text-center">
                <div class="icon-size mb-3"><i class="bi bi-receipt-cutoff"></i></div>
                <h5 class="fw-bold">จัดการออเดอร์</h5>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="customers.php" class="card h-100 menu-card p-4 text-center">
                <div class="icon-size mb-3"><i class="bi bi-people-fill"></i></div>
                <h5 class="fw-bold">จัดการลูกค้า</h5>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="logout.php" class="card h-100 menu-card p-4 text-center logout-card">
                <div class="icon-size mb-3 text-danger"><i class="bi bi-door-open-fill"></i></div>
                <h5 class="fw-bold text-danger">ออกจากระบบ</h5>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
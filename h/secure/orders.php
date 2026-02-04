<?php
    include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - วัชรพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #fff5f8; /* พื้นหลังชมพูอ่อน */
            font-family: 'Sarabun', sans-serif;
        }
        .navbar-pink {
            background-color: #f06292; /* สีชมพูหลัก */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .sidebar {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .nav-link-pink {
            color: #444;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: 0.3s;
        }
        .nav-link-pink:hover, .nav-link-pink.active {
            background-color: #fce4ec;
            color: #f06292;
        }
        .main-content {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .table-pink thead {
            background-color: #f06292;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-pink mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">ADMIN SYSTEM</a>
        <span class="navbar-text text-white">
            <i class="bi bi-person-circle me-1"></i>
            แอดมิน: <?php echo $_SESSION['aname']; ?>
        </span>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="sidebar">
                <h5 class="text-center mb-4" style="color: #ad1457;">เมนูจัดการ</h5>
                <nav class="nav flex-column">
                    <a class="nav-link nav-link-pink" href="products.php"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a>
                    <a class="nav-link nav-link-pink active" href="order.php"><i class="bi bi-receipt me-2"></i> จัดการออเดอร์</a>
                    <a class="nav-link nav-link-pink" href="customers.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a>
                    <hr>
                    <a class="nav-link nav-link-pink text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a>
                </nav>
            </div>
        </div>

        <div class="col-md-9">
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 style="color: #ad1457;"><i class="bi bi-cart-check-fill me-2"></i>จัดการออเดอร์</h2>
                    <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-printer me-1"></i> พิมพ์รายงาน</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-pink">
                        <thead>
                            <tr>
                                <th>เลขที่ออเดอร์</th>
                                <th>ชื่อลูกค้า</th>
                                <th>วันที่สั่งซื้อ</th>
                                <th>ยอดรวม</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ORD-001</td>
                                <td>สมชาย รักดี</td>
                                <td>04/02/2026</td>
                                <td>1,250 ฿</td>
                                <td><span class="badge bg-warning text-dark">รอดำเนินการ</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-success"><i class="bi bi-check-lg"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
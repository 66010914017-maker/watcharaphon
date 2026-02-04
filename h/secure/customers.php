<?php
    include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - วัชรพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #fff5f8; /* พื้นหลังชมพูอ่อนมาก */
            font-family: 'Sarabun', sans-serif;
        }
        .navbar-pink {
            background-color: #f06292; /* แถบสีชมพูหลัก */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .sidebar-card {
            border: none;
            border-radius: 15px;
            background: white;
            box-shadow: 0 4px 15px rgba(240, 98, 146, 0.1);
        }
        .main-card {
            border: none;
            border-radius: 15px;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .nav-link-pink {
            color: #444;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: 0.3s;
        }
        .nav-link-pink:hover {
            background-color: #fce4ec;
            color: #f06292;
        }
        .nav-link-pink.active {
            background-color: #f06292;
            color: white;
        }
        .table-pink thead {
            background-color: #fce4ec;
            color: #ad1457;
        }
        .btn-pink {
            background-color: #f06292;
            color: white;
        }
        .btn-pink:hover {
            background-color: #ec407a;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-pink mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php"><i class="bi bi-person-gear me-2"></i>ADMIN SYSTEM</a>
        <div class="text-white small">
            <i class="bi bi-person-circle"></i> แอดมิน: <?php echo $_SESSION['aname']; ?>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="sidebar-card p-3">
                <h5 class="text-center mb-4 mt-2 fw-bold" style="color: #ad1457;">เมนูหลัก</h5>
                <nav class="nav flex-column">
                    <a href="products.php" class="nav-link nav-link-pink">
                        <i class="bi bi-box-seam me-2"></i> จัดการสินค้า
                    </a>
                    <a href="orders.php" class="nav-link nav-link-pink">
                        <i class="bi bi-receipt me-2"></i> จัดการออเดอร์
                    </a>
                    <a href="customers.php" class="nav-link nav-link-pink active">
                        <i class="bi bi-people me-2"></i> จัดการลูกค้า
                    </a>
                    <hr>
                    <a href="logout.php" class="nav-link nav-link-pink text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ
                    </a>
                </nav>
            </div>
        </div>

        <div class="col-md-9">
            <div class="main-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold" style="color: #ad1457;"><i class="bi bi-people-fill me-2"></i>จัดการลูกค้า</h2>
                    <button class="btn btn-pink"><i class="bi bi-person-plus-fill me-2"></i>เพิ่มลูกค้าใหม่</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-pink">
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>อีเมล</th>
                                <th>ที่อยู่</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>วัชรพล เวชแพทย์</td>
                                <td>081-234-5678</td>
                                <td>watcharaphon@example.com</td>
                                <td>กรุงเทพมหานคร</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-warning me-1"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
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
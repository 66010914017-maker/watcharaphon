<?php
session_start();
include_once("connectdb.php");

if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    // 1. ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE a_username = ? LIMIT 1");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
        
        // 2. ตรวจสอบรหัสผ่านที่เข้ารหัสด้วย password_hash
        if (password_verify($pwd, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            header("Location: index2.php");
            exit();
        } else {
            $error = "Username หรือ Password ไม่ถูกต้อง";
        }
    } else {
        $error = "Username หรือ Password ไม่ถูกต้อง";
    }
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - วัชรพล เวชแพทย์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fce4ec; /* ชมพูอ่อนมาก */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn-pink {
            background-color: #f06292;
            color: white;
            border: none;
        }
        .btn-pink:hover {
            background-color: #ec407a;
            color: white;
        }
        .form-control:focus {
            border-color: #f06292;
            box-shadow: 0 0 0 0.25 darkredrgba(240, 98, 146, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card login-card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4" style="color: #ad1457;">เข้าสู่ระบบหลังบ้าน</h3>
                    <p class="text-center text-muted small">วัชรพล เวชแพทย์ (หนึ่ง)</p>
                    
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger py-2 small text-center"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="auser" class="form-control" placeholder="ชื่อผู้ใช้งาน" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="apwd" class="form-control" placeholder="รหัสผ่าน" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" name="Submit" class="btn btn-pink py-2">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
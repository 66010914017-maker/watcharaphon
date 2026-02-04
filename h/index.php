<?php
session_start();
// ย้าย include มาไว้ด้านบนเพื่อให้จัดการ Error ได้ง่าย
$error_msg = "";

if (isset($_POST['Submit'])) {
    // 1. ตรวจสอบว่าไฟล์มีอยู่จริงไหมก่อน include
    if (file_exists("connectdb.php")) {
        include_once("connectdb.php");
        
        $user = $_POST['auser'];
        $pwd  = $_POST['apwd']; // ใช้ชื่อที่ตรงกับฟอร์ม

        // 2. ป้องกัน SQL Injection ด้วย Prepared Statement
        $stmt = $conn->prepare("SELECT * FROM admin WHERE a_username = ? AND a_password = ? LIMIT 1");
        $stmt->bind_param("ss", $user, $pwd); // 'ss' หมายถึงส่งค่า string 2 ตัว
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            header("Location: index2.php");
            exit();
        } else {
            $error_msg = "Username หรือ Password ไม่ถูกต้อง";
        }
    } else {
        $error_msg = "ไม่พบไฟล์ connectdb.php ในระบบ";
    }
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - วัชรพล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fce4ec; height: 100vh; display: flex; align-items: center; }
        .login-card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-pink { background-color: #f06292; color: white; border: none; }
        .btn-pink:hover { background-color: #ec407a; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card login-card p-4">
                <h3 class="text-center mb-4" style="color: #ad1457;">เข้าสู่ระบบหลังบ้าน</h3>
                
                <?php if($error_msg != ""): ?>
                    <div class="alert alert-danger p-2 small text-center"><?php echo $error_msg; ?></div>
                <?php endif; ?>

                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="auser" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="apwd" class="form-control" required>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" name="Submit" class="btn btn-pink py-2">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
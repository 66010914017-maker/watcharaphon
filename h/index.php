<?php
session_start();
include_once("connectdb.php"); // ย้ายมาไว้ด้านบนเพื่อจัดการ Logic ก่อนแสดงผล HTML

$error_msg = "";

if (isset($_POST['Submit'])) {
    $user = $_POST['auser'];
    $pwd  = $_POST['apwd']; // เปลี่ยนจาก aped ให้ตรงกับ HTML

    // ใช้ Prepared Statement (ป้องกัน SQL Injection)
    $stmt = $conn->prepare("SELECT * FROM admin WHERE a_username = ? LIMIT 1");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
        
        // ตรวจสอบรหัสผ่าน (ใช้ password_verify สำหรับรหัสที่ hash ไว้)
        // ถ้าใน DB คุณยังไม่ได้ hash ให้เปลี่ยนบรรทัดนี้เป็น: if($pwd == $data['a_password'])
        if (password_verify($pwd, $data['a_password']) || $pwd == $data['a_password']) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            header("Location: index2.php");
            exit();
        } else {
            $error_msg = "Username หรือ Password ไม่ถูกต้อง";
        }
    } else {
        $error_msg = "Username หรือ Password ไม่ถูกต้อง";
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
        body { background-color: #fce4ec; height: 100vh; display: flex; align-items: center; }
        .card { border: none; border-radius: 1rem; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1); }
        .btn-pink { background-color: #f06292; color: white; }
        .btn-pink:hover { background-color: #ec407a; color: white; }
        .text-pink { color: #ad1457; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-lg-4">
            <div class="card p-4">
                <div class="card-body">
                    <h2 class="text-center mb-4 text-pink">เข้าสู่ระบบหลังบ้าน</h2>
                    <p class="text-center small text-muted">วัชรพล เวชแพทย์ (หนึ่ง)</p>
                    
                    <?php if($error_msg): ?>
                        <div class="alert alert-danger py-2 small text-center"><?php echo $error_msg; ?></div>
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
                        <div class="d-grid shadow-sm">
                            <button type="submit" name="Submit" class="btn btn-pink py-2 fw-bold">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>วัชรพล เวชแพทย์ (หนึ่ง)</title>

<!-- Bootstrap 5.3 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">ฟอร์มรับข้อมูล - วัชรพล เวชแพทย์ (หนึ่ง)</h3>
                </div>

                <div class="card-body">

                    <form method="post" action="">

                        <div class="mb-3">
                            <label class="form-label">ชื่อ-สกุล *</label>
                            <input type="text" name="fullname" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">เบอร์โทร *</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ส่วนสูง *</label>
                            <div class="input-group">
                                <input type="number" name="height" class="form-control" min="100" max="200" required>
                                <span class="input-group-text">ซม.</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ที่อยู่</label>
                            <textarea name="address" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">วันเดือนปีเกิด</label>
                            <input type="date" name="birthday" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">สีที่ชอบ</label>
                            <input type="color" name="color" class="form-control form-control-color">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">สาขาวิชา</label>
                            <select name="major" class="form-select">
                                <option value="การบัญชี">การบัญชี</option>
                                <option value="การตลาด">การตลาด</option>
                                <option value="การจัดการ">การจัดการ</option>
                                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" name="Submit" class="btn btn-success">สมัครสมาชิก</button>
                            <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                            <button type="button" class="btn btn-info text-white" onClick="window.location='https://www.msu.ac.th/';">Go to MSU</button>
                            <button type="button" class="btn btn-warning" onmouseover="alert('SUI SUI!');">Hello</button>
                            <button type="button" class="btn btn-dark" onClick="window.print();">พิมพ์</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="mt-4">
                <hr>
                <?php
                if(isset($_POST['Submit'])) {
                    $fullname = $_POST['fullname'];
                    $phone = $_POST['phone'];
                    $height = $_POST['height'];
                    $address = $_POST['address'];
                    $birthday = $_POST['birthday'];
                    $color = $_POST['color'];
                    $major = $_POST['major'];

                    echo "<div class='card shadow-sm'>";
                    echo "<div class='card-header bg-secondary text-white'><h4 class='mb-0'>ผลลัพธ์ที่ส่งมา</h4></div>";
                    echo "<div class='card-body'>";
                    echo "<p><strong>ชื่อ-สกุล:</strong> $fullname</p>";
                    echo "<p><strong>เบอร์โทร:</strong> $phone</p>";
                    echo "<p><strong>ส่วนสูง:</strong> $height ซม.</p>";
                    echo "<p><strong>ที่อยู่:</strong> $address</p>";
                    echo "<p><strong>วันเดือนปีเกิด:</strong> $birthday</p>";
                    echo "<p><strong>สีที่ชอบ:</strong> <span style='display:inline-block;width:50px;height:25px;background-color:$color;'></span> $color</p>";
                    echo "<p><strong>สาขาวิชา:</strong> $major</p>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

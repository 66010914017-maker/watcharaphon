<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลใบสมัครที่ได้รับ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .result-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            width: 35%; /* กำหนดความกว้างของคอลัมน์หัวข้อ */
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="result-container">
                <h2 class="text-center mb-4 text-success">🎉 ข้อมูลใบสมัครที่ได้รับสำเร็จ</h2>
                <p class="text-center mb-4">ข้อมูลที่ถูกส่งจากฟอร์มรับสมัครงาน (แสดงผลจาก $_POST)</p>
                
                <?php
                // ตรวจสอบว่ามีการส่งข้อมูลด้วยเมธอด POST มาหรือไม่
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // ฟังก์ชันช่วยในการทำความสะอาดและตรวจสอบข้อมูล
                    function clean_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    
                    // ดึงข้อมูลและทำความสะอาด
                    $position = clean_input($_POST['position'] ?? 'ไม่ระบุ');
                    $prefix = clean_input($_POST['prefix'] ?? 'ไม่ระบุ');
                    $firstName = clean_input($_POST['firstName'] ?? 'ไม่ระบุ');
                    $lastName = clean_input($_POST['lastName'] ?? 'ไม่ระบุ');
                    $birthDate = clean_input($_POST['birthDate'] ?? 'ไม่ระบุ');
                    $tel = clean_input($_POST['tel'] ?? 'ไม่ระบุ');
                    $email = clean_input($_POST['email'] ?? 'ไม่ระบุ');
                    $address = clean_input($_POST['address'] ?? 'ไม่ระบุ');
                    $educationLevel = clean_input($_POST['educationLevel'] ?? 'ไม่ระบุ');
                    $major = clean_input($_POST['major'] ?? 'ไม่ระบุ');
                    $gpa = clean_input($_POST['gpa'] ?? 'ไม่ระบุ');
                    $skills = clean_input($_POST['skills'] ?? 'ไม่มี');
                    $workExperience = clean_input($_POST['workExperience'] ?? 'ไม่มี');
                    
                    // ข้อมูลไฟล์ (การจัดการไฟล์จริงต้องใช้ $_FILES และฟังก์ชันอัพโหลด)
                    $resumeFile = $_FILES['resumeFile']['name'] ?? 'ไม่มีไฟล์แนบ (เนื่องจากการสาธิต)'; 
                    
                    // แสดงผลข้อมูลในรูปแบบตาราง
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-bordered table-striped">';
                    echo '<tbody>';

                    echo '<tr class="table-primary"><th colspan="2" class="text-center">ข้อมูลตำแหน่งงาน</th></tr>';
                    echo '<tr><th>ตำแหน่งที่ต้องการสมัคร</th><td>' . $position . '</td></tr>';

                    echo '<tr class="table-info"><th colspan="2" class="text-center">ข้อมูลส่วนตัว</th></tr>';
                    echo '<tr><th>ชื่อ-สกุล</th><td>' . $prefix . $firstName . ' ' . $lastName . '</td></tr>';
                    echo '<tr><th>วัน/เดือน/ปีเกิด</th><td>' . $birthDate . '</td></tr>';
                    echo '<tr><th>เบอร์โทรศัพท์</th><td>' . $tel . '</td></tr>';
                    echo '<tr><th>อีเมล</th><td>' . $email . '</td></tr>';
                    echo '<tr><th>ที่อยู่ปัจจุบัน</th><td>' . nl2br($address) . '</td></tr>'; // ใช้ nl2br เพื่อให้ขึ้นบรรทัดใหม่ได้

                    echo '<tr class="table-warning"><th colspan="2" class="text-center">ประวัติการศึกษา</th></tr>';
                    echo '<tr><th>ระดับการศึกษาสูงสุด</th><td>' . $educationLevel . '</td></tr>';
                    echo '<tr><th>สาขาวิชาเอก</th><td>' . $major . '</td></tr>';
                    echo '<tr><th>เกรดเฉลี่ย (GPA)</th><td>' . $gpa . '</td></tr>';

                    echo '<tr class="table-danger"><th colspan="2" class="text-center">ความสามารถและประสบการณ์</th></tr>';
                    echo '<tr><th>ความสามารถพิเศษ / ทักษะ</th><td>' . nl2br($skills) . '</td></tr>';
                    echo '<tr><th>ประสบการณ์ทำงาน</th><td>' . nl2br($workExperience) . '</td></tr>';
                    
                    echo '<tr class="table-secondary"><th colspan="2" class="text-center">เอกสารแนบ</th></tr>';
                    echo '<tr><th>ไฟล์ Resume/CV</th><td>' . $resumeFile . '</td></tr>';

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    
                } else {
                    // กรณีเข้าถึงไฟล์นี้โดยตรงโดยไม่มีการ POST ข้อมูล
                    echo '<div class="alert alert-warning" role="alert">';
                    echo 'ไม่พบข้อมูลการส่งใบสมัคร กรุณาเข้าถึงผ่านแบบฟอร์มรับสมัครงาน.';
                    echo '</div>';
                }
                ?>
                
                <div class="text-center mt-4">
                    <a href="application_form.html" class="btn btn-secondary">กลับสู่หน้าฟอร์ม</a>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
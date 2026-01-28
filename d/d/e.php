<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มรับสมัครงาน - บริษัท นวัตกรรมก้าวหน้า จำกัด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .application-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="application-form">
                <h2 class="text-center mb-4 text-primary">แบบฟอร์มใบสมัครงาน</h2>
                <p class="text-center mb-4">บริษัท วัชรพล เวชแพทย์ จำกัด</p>
                <form action="f.php" method="POST">

                    <h4 class="mb-3 border-bottom pb-2">1. ตำแหน่งที่ต้องการสมัคร</h4>
                    <div class="mb-3">
                        <label for="position" class="form-label">เลือกตำแหน่งงาน <span class="text-danger">*</span></label>
                        <select class="form-select" id="position" name="position" required>
                            <option value="" disabled selected>--- กรุณาเลือกตำแหน่ง ---</option>
                            <option value="Software_Engineer">วิศวกรซอฟต์แวร์ (Software Engineer)</option>
                            <option value="Data_Scientist">นักวิทยาศาสตร์ข้อมูล (Data Scientist)</option>
                            <option value="Marketing_Specialist">ผู้เชี่ยวชาญด้านการตลาดดิจิทัล (Digital Marketing Specialist)</option>
                            <option value="HR_Specialist">เจ้าหน้าที่ฝ่ายบุคคล (HR Specialist)</option>
                            <option value="Project_Manager">ผู้จัดการโครงการ (Project Manager)</option>
                        </select>
                    </div>

                    <h4 class="mt-5 mb-3 border-bottom pb-2">2. ข้อมูลส่วนตัว</h4>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="prefix" class="form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                            <select class="form-select" id="prefix" name="prefix" required>
                                <option value="" disabled selected>เลือก</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="firstName" class="form-label">ชื่อ (ภาษาไทย) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="col-md-4">
                            <label for="lastName" class="form-label">นามสกุล (ภาษาไทย) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="birthDate" class="form-label">วัน/เดือน/ปีเกิด <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tel" class="form-label">เบอร์โทรศัพท์มือถือ <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="tel" name="tel" placeholder="0XXXXXXXXX" pattern="[0-9]{10}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">อีเมล <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">ที่อยู่ปัจจุบัน</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>

                    <h4 class="mt-5 mb-3 border-bottom pb-2">3. ประวัติการศึกษา</h4>
                    <div class="mb-3">
                        <label for="educationLevel" class="form-label">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                        <select class="form-select" id="educationLevel" name="educationLevel" required>
                            <option value="" disabled selected>--- กรุณาเลือกระดับการศึกษา ---</option>
                            <option value="มัธยมปลาย">มัธยมศึกษาตอนปลาย/ปวช.</option>
                            <option value="ปวส./อนุปริญญา">ปวส./อนุปริญญา</option>
                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                            <option value="ปริญญาโท">ปริญญาโท</option>
                            <option value="ปริญญาเอก">ปริญญาเอก</option>
                        </select>
                    </div>
                    
                    <div class="row mb-3">
                         <div class="col-md-6">
                            <label for="major" class="form-label">สาขาวิชาเอก</label>
                            <input type="text" class="form-control" id="major" name="major">
                        </div>
                        <div class="col-md-6">
                            <label for="gpa" class="form-label">เกรดเฉลี่ย (GPA)</label>
                            <input type="number" class="form-control" id="gpa" name="gpa" step="0.01" min="0" max="4">
                        </div>
                    </div>

                    <h4 class="mt-5 mb-3 border-bottom pb-2">4. ความสามารถและประสบการณ์</h4>
                    <div class="mb-3">
                        <label for="skills" class="form-label">ความสามารถพิเศษ / ทักษะที่เกี่ยวข้องกับตำแหน่งงาน</label>
                        <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="เช่น ภาษาอังกฤษระดับดี, Python, SEO, การใช้โปรแกรม Adobe"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="workExperience" class="form-label">ประสบการณ์ทำงานโดยสรุป (เริ่มจากงานล่าสุด)</label>
                        <textarea class="form-control" id="workExperience" name="workExperience" rows="5" placeholder="ระบุชื่อบริษัท, ตำแหน่ง, ระยะเวลา, และหน้าที่โดยย่อ"></textarea>
                    </div>
                    
                    <h4 class="mt-5 mb-3 border-bottom pb-2">5. เอกสารแนบ</h4>
                    <div class="mb-3">
                        <label for="resumeFile" class="form-label">แนบไฟล์ Resume/CV (PDF หรือ DOCX)</label>
                        <input class="form-control" type="file" id="resumeFile" name="resumeFile" accept=".pdf,.doc,.docx">
                        <div class="form-text">ขนาดไฟล์ไม่เกิน 5MB</div>
                    </div>


                    <hr class="my-4">
                    
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="dataConsent" required>
                        <label class="form-check-label" for="dataConsent">
                            ข้าพเจ้าขอรับรองว่าข้อมูลข้างต้นเป็นความจริงทุกประการ
                        </label>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="submit">ส่งใบสมัคร</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
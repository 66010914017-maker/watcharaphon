<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วัชรพล เวชแพทย์ (หนึ่ง)</title>

<style>
    /* ตกแต่งปุ่มให้ดูสวยงาม */
    button {
        padding: 12px 30px;
        font-size: 18px;
        font-weight: bold;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        margin: 10px 5px;
        transition: 0.3s; /* ให้เวลาเปลี่ยนสีดูนุ่มนวล */
    }

    /* สีปุ่ม YES (สีเขียว) */
    .btn-yes { background-color: #28a745; }
    .btn-yes:hover { background-color: #218838; }

    /* สีปุ่ม NO (สีแดง) */
    .btn-no { background-color: #dc3545; }
    .btn-no:hover { background-color: #c82333; }

    /* จัดแต่งรูปภาพ */
    #display-image {
        border: 5px solid #f3f3f3;
        border-radius: 10px;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
</head>

<body>

    <h1>งาน k 66010914017 วัชรพล เวชแพทย์ (หนึ่ง)</h1>
    
    <div>
        <img id="display-image" src="images/1.jpg" width="400" alt="Profile Image">
    </div>

    <br>

    <button type="button" class="btn-yes" onclick="changeImage('images/1.jpg')">นิสิต (รูปที่ 1)</button>
    <button type="button" class="btn-no" onclick="changeImage('images/2.jpg')">อาจารย์คนหล่อ (รูปที่ 2)</button>

    <script>
        // ฟังก์ชันสำหรับเปลี่ยนรูปภาพ
        function changeImage(imagePath) {
            document.getElementById('display-image').src = imagePath;
        }
    </script>

</body>
</html>
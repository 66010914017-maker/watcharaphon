<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วัชรพล เวชแพทย์ (หนึ่ง) - รายงานยอดขาย</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    /* --- ส่วนตกแต่งพื้นหลังและ Layout --- */
    body {
        font-family: 'Sarabun', sans-serif; /* แนะนำให้หาฟอนต์สวยๆ มาใส่ */
        /* พื้นหลังรูปมังกร (เปลี่ยน URL รูปภาพตามที่คุณต้องการ) */
        background-image: url('https://c4.wallpaperflare.com/wallpaper/766/845/758/fantasy-art-dragon-fire-breathing-wallpaper-preview.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    /* กล่องคอนเทนเนอร์สีขาวโปร่งแสง เพื่อให้อ่านข้อความได้ง่ายบนพื้นหลัง */
    .container {
        background-color: rgba(255, 255, 255, 0.92); /* สีขาวโปร่งแสง 92% */
        max-width: 1000px;
        margin: 0 auto; /* จัดกึ่งกลาง */
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    h1 { text-align: center; color: #2c3e50; }

    /* ตกแต่งตาราง */
    table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
    th { background-color: #2c3e50; color: white; }
    tr:nth-child(even) { background-color: #f2f2f2; }

    /* Layout สำหรับจัดวางกราฟ */
    .chart-container-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-around;
    }
    /* กล่องใส่กราฟแต่ละอัน */
    .chart-box {
        flex: 1 1 400px; /* ขยายได้ หดได้ พื้นฐานกว้าง 400px */
        min-width: 300px;
        padding: 15px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
</style>
</head>

<body>

<div class="container">
    <h1>วัชรพล เวชแพทย์ (หนึ่ง) รายงานสรุปยอดขายตามประเทศ</h1>

    <table border="1">
    <tr>
        <th>ประเภทสินค้า (ประเทศ)</th>
        <th>ยอดขายรวม</th>
    </tr>
    <?php
    // --- ส่วน PHP ดึงข้อมูล ---
    include_once("connectdb.php");

    // สร้าง Array เปล่าๆ ไว้รอรับข้อมูลสำหรับกราฟ
    $chartLabels = [];
    $chartData = [];

    $sql = "SELECT p_country, SUM(p_amount) AS total FROM popsupermarket GROUP BY p_country ORDER BY total DESC"; // เพิ่ม ORDER BY ให้น่าสนใจขึ้น
    $rs = mysqli_query($conn, $sql);

    while ($dataRow = mysqli_fetch_array($rs)){
        // 1. เก็บข้อมูลใส่ Array สำหรับกราฟ
        $chartLabels[] = $dataRow['p_country'];
        $chartData[] = $dataRow['total'];

        // 2. แสดงผลในตาราง HTML ตามเดิม
    ?>
    <tr>
        <td><?php echo $dataRow['p_country'];?></td>
        <td align="right"><?php echo number_format($dataRow['total'],0);?> บาท</td>
    </tr>
    <?php
    }
    mysqli_close($conn);

    // --- แปลงข้อมูล PHP Array เป็น JSON เพื่อส่งให้ JavaScript ---
    $jsonLabels = json_encode($chartLabels);
    $jsonDataPoints = json_encode($chartData);
    ?>
    </table>

    <hr>

    <div class="chart-container-row">
        <div class="chart-box">
             <h3 style="text-align:center;">กราฟแท่งเปรียบเทียบยอดขาย</h3>
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-box" style="max-width: 400px;"> <h3 style="text-align:center;">สัดส่วนยอดขาย (%)</h3>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

</div> <script>
    // 1. รับข้อมูล JSON จาก PHP มาเก็บในตัวแปร JS
    const phpLabels = <?php echo $jsonLabels; ?>;
    const phpData = <?php echo $jsonDataPoints; ?>;

    // ชุดสีสำหรับกราฟ (เพื่อให้ Pie Chart สวยงาม)
    const backgroundColors = [
        'rgba(255, 99, 132, 0.7)', // แดง
        'rgba(54, 162, 235, 0.7)', // น้ำเงิน
        'rgba(255, 206, 86, 0.7)', // เหลือง
        'rgba(75, 192, 192, 0.7)', // เขียว
        'rgba(153, 102, 255, 0.7)', // ม่วง
        'rgba(255, 159, 64, 0.7)', // ส้ม
        '#C0C0C0' // เทา (เผื่อมีข้อมูลเยอะ)
    ];
     const borderColors = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        '#A9A9A9'
    ];


    // --- สร้างกราฟแท่ง (Bar Chart) ---
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: phpLabels, // ชื่อประเทศ
            datasets: [{
                label: 'ยอดขายรวม (บาท)',
                data: phpData, // ตัวเลขยอดขาย
                backgroundColor: backgroundColors[1], // ใช้สีน้ำเงินสีเดียวสำหรับแท่ง
                borderColor: borderColors[1],
                borderWidth: 1
            }]
        },
        options: {
            scales: { y: { beginAtZero: true } },
            responsive: true
        }
    });

    // --- สร้างกราฟวงกลม (Pie Chart) ---
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: phpLabels, // ชื่อประเทศ
            datasets: [{
                data: phpData, // ตัวเลขยอดขาย
                backgroundColor: backgroundColors, // ใช้ชุดสีหลากสี
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
             plugins: {
                legend: { position: 'bottom' } // ย้ายคำอธิบายไปไว้ด้านล่าง
            }
        }
    });
</script>

</body>
</html>
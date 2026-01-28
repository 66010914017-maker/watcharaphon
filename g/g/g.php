<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายงานยอดขายรายเดือน</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    body { font-family: sans-serif; padding: 20px; text-align: center; }
    table { margin: 0 auto; border-collapse: collapse; width: 60%; }
    th, td { border: 1px solid #ccc; padding: 10px; }
    th { background-color: #f4f4f4; }
    
    /* จัด layout กราฟให้อยู่คู่กัน */
    .chart-wrapper {
        display: flex;
        justify-content: center;
        gap: 50px;
        margin-top: 30px;
        flex-wrap: wrap;
    }
    .chart-box { width: 350px; } /* กำหนดขนาดกราฟ */
</style>
</head>

<body>
<h1> วัชรพล เวชแพทย์ (หนึ่ง)สรุปยอดขายรายเดือน</h1>

<table border="1">
<tr>
    <th>เดือน</th>
    <th>ยอดขาย (บาท)</th>
</tr>
<?php
include_once("connectdb.php");

// สร้าง Array ชื่อเดือนภาษาไทยเตรียมไว้
$thaiMonths = [
    1=>"มกราคม", 2=>"กุมภาพันธ์", 3=>"มีนาคม", 4=>"เมษายน", 5=>"พฤษภาคม", 6=>"มิถุนายน", 
    7=>"กรกฎาคม", 8=>"สิงหาคม", 9=>"กันยายน", 10=>"ตุลาคม", 11=>"พฤศจิกายน", 12=>"ธันวาคม"
];

// เตรียมตัวแปรสำหรับกราฟ
$labels = [];
$dataPoints = [];

// แก้ไข SQL: ตั้งชื่อเล่น (Alias) ให้เรียกใช้ง่ายๆ
$sql = "SELECT MONTH(p_date) AS MonthNum, SUM(p_amount) AS TotalAmount 
        FROM popsupermarket 
        GROUP BY MONTH(p_date) 
        ORDER BY MonthNum"; 
$rs = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($rs)){
    // แปลงเลขเดือน (1) เป็นชื่อ (มกราคม)
    $monthName = $thaiMonths[$row['MonthNum']];
    
    // เก็บข้อมูลใส่ Array สำหรับกราฟ
    $labels[] = $monthName;
    $dataPoints[] = $row['TotalAmount'];
?>
<tr>
    <td><?php echo $monthName; ?></td>
    <td align="right"><?php echo number_format($row['TotalAmount'], 0);?></td>
</tr>
<?php 
}
mysqli_close($conn);
?>
</table>

<div class="chart-wrapper">
    <div class="chart-box">
        <h3>สัดส่วนแบบวงกลม (Pie)</h3>
        <canvas id="myPieChart"></canvas>
    </div>
    <div class="chart-box">
        <h3>สัดส่วนแบบโดนัท (Doughnut)</h3>
        <canvas id="myDoughnutChart"></canvas>
    </div>
</div>

<script>
    // รับข้อมูลจาก PHP
    const labels = <?php echo json_encode($labels); ?>;
    const datas = <?php echo json_encode($dataPoints); ?>;

    // ตั้งค่าสีสวยๆ
    const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];

    // config สำหรับกราฟทั้ง 2 แบบ (ใช้ข้อมูลชุดเดียวกัน)
    const chartConfig = {
        data: {
            labels: labels,
            datasets: [{
                data: datas,
                backgroundColor: colors,
                hoverOffset: 4
            }]
        },
        options: { responsive: true }
    };

    // สร้างกราฟ Pie
    new Chart(document.getElementById('myPieChart'), {
        type: 'pie',
        ...chartConfig
    });

    // สร้างกราฟ Doughnut
    new Chart(document.getElementById('myDoughnutChart'), {
        type: 'doughnut',
        ...chartConfig
    });
</script>

</body>
</html>
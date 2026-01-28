<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>วัชรพล เวชแพทย์ (หนึ่ง)</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
        h1 { margin-top: 20px; margin-bottom: 20px; color: #0d6efd; }
    </style>
</head>

<body>

<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">วัชรพล เวชแพทย์ (หนึ่ง)</h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table id="productTable" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>ชื่อสินค้า</th>
                            <th>ประเภทสินค้า</th>
                            <th>วันที่</th>
                            <th>ประเทศ</th>
                            <th class="text-end">จำนวนเงิน</th>
                            <th class="text-center">รูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once("connectdb.php");
                    // ควรเช็คว่าเชื่อมต่อสำเร็จไหมก่อน query
                    if(isset($conn)){
                        $sql = "SELECT * FROM popsupermarket";
                        $rs = mysqli_query($conn, $sql);
                        
                        while ($data = mysqli_fetch_array($rs)){
                    ?>
                        <tr>
                            <td><?php echo $data['p_order_id'];?></td>
                            <td><?php echo $data['p_product_name'];?></td>
                            <td><?php echo $data['p_category'];?></td>
                            <td><?php echo $data['p_date'];?></td>
                            <td><?php echo $data['p_country'];?></td>
                            <td class="text-end"><?php echo number_format($data['p_amount'], 0);?></td>
                            <td class="text-center">
                                <img src="<?php echo $data['p_product_name'];?>.jpg" width="55" class="img-thumbnail">
                            </td>
                        </tr>
                    <?php 
                        }
                        mysqli_close($conn);
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            language: {
                "lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
                "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่มีข้อมูล",
                "infoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
                "search": "ค้นหา:",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            }
        });
    });
</script>

</body>
</html>
<?php
    include 'navbar.php';
    include '../connect.php';
    $sql="SELECT * FROM product";
    $result=$con->query($sql);
?> 
<div class="container mt-5 w-75">
    <a href="add_product.php" class="btn btn-primary mb-3">+เพิ่มสินค้า</a>
    <table class="table table-striped">
        <tr class="bg-primary">
            <th class="text-white" >ลำดับที่</th>
            <th class="text-white">ชื่อสินค้า</th>
            <th class="text-white">ราคา</th>
            <th class="text-white">จำนวน</th>
            <th class="text-white">การจัดการ</th>
        </tr>
        <?php
            while($row=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['pro_id'] ?></td>
            <td><?php echo $row['pro_name'] ?></td>
            <td><?php echo $row['pro_price'] ?></td>
            <td><?php echo $row['pro_qty'] ?></td>
            <td>แก้ไข/ลบ</td>
        </tr>
        <?php } ?>
    </table>
</div>
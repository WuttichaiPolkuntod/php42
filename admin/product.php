<?php
    include 'navbar.php';
    include '../connect.php';
    $sql="SELECT * FROM product";
    $result=$con->query($sql);
?> 
<div class="container mt-5 w-75">
<div class="row">
    <div class="col-4">
                <a href="add_product.php" class="btn btn-primary mb-3">+เพิ่มสินค้า</a>
        </div>
        <div class="col-8">
            <form action="pro_uploadcsv.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-3">
                    <label for="" class="">อัพโหลดโหลดไฟล์</label>
                </div>
                <div class="col-5">
                    <input type="file" class="form-control" class="mb-3" name="csv_file">
                </div>
                <div class="col-4">
                    <input type="submit" name="addm" class="btn btn-primary mb-3" value="+เพิ่มข้อมูลที่ละหลายคน">
                </div>
            </div>
            </form>
        </div>
</div>
    <table class="table table-striped">
        <tr class="bg-primary">
            <th class="text-white" >ลำดับที่</th>
            <th class="text-white">ชื่อสินค้า</th>
            <th class="text-white">ราคา</th>
            <th class="text-white">จำนวน</th>
            <th class="text-white">รูปภาพ</th>
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
            <td>
                <img src="pro_pic/<?php echo $row['pro_pic'] ?>" width="150">
            </td>
            <td>
            <a href="edit_product.php?pro_id=<?php echo $row['pro_id']?>" class="btn bg-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="del_product.php?pro_id=<?php echo $row['pro_id']?>" class="btn bg-danger" onclick=" return confirm('ยืนยันการลบไหม')"><i class="bi bi-x-square-fill"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
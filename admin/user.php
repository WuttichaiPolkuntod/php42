<?php
    include 'navbar.php';
    include '../connect.php';
    $sql="SELECT * FROM user";
    $result=$con->query($sql);
?> 
<div class="container mt-5 w-75">
    <a href="add_user.php" class="btn btn-primary mb-3">+เพิ่มข้อมูล</a>
    <table class="table table-striped">
        <tr class="bg-primary">
            <th class="text-white" >ลำดับที่</th>
            <th class="text-white">ชื่อ - นามสกุล</th>
            <th class="text-white">username</th>
            <th class="text-white">email</th>
            <th class="text-white">การจัดการ</th>
        </tr>
        <?php
            $counter=1;
            while($row=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $counter;$counter++; ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td>
                <a href="edit_user.php?username=<?php echo $row['username']?>" class="btn bg-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="del_user.php?username=<?php echo $row['username']?>" class="btn bg-danger"><i class="bi bi-x-square-fill"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
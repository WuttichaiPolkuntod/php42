<?php
    require_once 'navbar.php';
    require_once '../connect.php';
    $pro_id=$_GET['pro_id'];
    $sql="SELECT * FROM product WHERE pro_id='$pro_id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
    @unlink('pro_pic/'.$row['pro_pic']);
    $sql="DELETE FROM product WHERE pro_id='$pro_id'";
    $result=$con->query($sql);
    if(!$result){
        echo"<script>alert('ไม่สามารถลบได้')</script>";
    }
    else{
        echo "<script>window.location.href='product.php'</script>";
    }
?>
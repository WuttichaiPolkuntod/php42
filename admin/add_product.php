<?php
    include 'navbar.php';
    include '../connect.php';
    if(isset($_POST['submit'])){
        $pro_name=$_POST['name'];
        $pro_price=$_POST['price'];
        $pro_qty=$_POST['qty'];
        $filename=$_FILES['pro_pic']['name'];
        if($pro_name==""||$pro_price==""||$pro_qty=="")
        {
            echo "<script>alert('คุณกรอกข้อมูลไม่ครบ')</script>";
        }
            else
            {
                $sql2="SELECT pro_name FROM product WHERE pro_name='$pro_name'";
                $result2=$con->query($sql2);
                $num=mysqli_num_rows($result2);
                if($num==1){
                    echo "<script>alert('มีสินค้านี้มีอยู่แล้ว')</script>";
                }
                else{
                    if(move_uploaded_file($_FILES['pro_pic']['tmp_name'],'pro_pic/'.$filename)){
                        $sql="INSERT  INTO product (pro_name,pro_price,pro_qty,pro_pic) VALUES('$pro_name','$pro_price','$pro_qty','$filename')";
                        $result=$con->query($sql);
                        if(!$result){
                            echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
                    }
                            else{
                            echo "<script>window.location.href='product.php'</script>";
                    }  
                        }
                }
            }
    }
?>

<div class="container w-50 mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">เพิ่มข้อมูล สินค้า</div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label">ชื่อสินค้า</label>
                    <div class="col-sm-10">
                        <input type="text" class="form*control" name="name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label">ราคา</label>
                    <div class="col-sm-10">
                        <input type="text" class="form*control" name="price">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label">จำนวน</label>
                    <div class="col-sm-10">
                        <input type="text" class="form*control" name="qty">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label"></label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="pro_pic">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn bg-success text-white" name="submit" value="เพิ่มข้อมูล">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    require_once 'navbar.php';
    require_once '../connect.php';
    $username=$_GET['username'];
    $sql="SELECT * FROM user WHERE username='$username'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
    if(isset($_POST['submit'])){
        $password=$_POST['password'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $sql="UPDATE user SET password='$password',name='$name',email='$email' WHERE username='$username'";
        $result=$con->query($sql);
        if(!$result){
            echo"<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
        }
        else{
            echo "<script>window.location.href='user.php'</script>";
        }
    }
?> 

<div class="container w-50 mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">แก้ไขข้อมูล user</div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label">username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form*control" name="username" readonly value="<?php echo $row['username']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label">password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form*control" name="password" value="<?php echo $row['password']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label">name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form*control" name="name" value="<?php echo $row['name']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form*control" name="email" value="<?php echo $row['email']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="label col-sm-2 com-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn bg-success text-white" name="submit" value="บันทึกข้อมูล">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $username=$_POST['Username'];
        $password=$_POST['Password'];
        $con=mysqli_connect('localhost','root','','php42') or die ("ไม่สามารถเชื่อมต่อ database ได้");
        $sql="SELECT * FROM employees WHERE Emp_id='$username'and Emp_password='$password'";
        $result=$con->query($sql);
        $num=mysqli_num_rows($result);
        if($num==0){
            echo "<script>alert('username หรือ password ไม่ถูกต้อง')</script>";
        }
        else{
            header("location:admin/index.php");
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body style="background:#ddd">
    <div class="container w-25" style="margin-top:150px;">
        <div class="card">
            <div class="card-header bg-success text-white">login</div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" name="Username">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="Password" class="form-control" name="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
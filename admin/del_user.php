<?php
    require_once 'navbar.php';
    require_once '../connect.php';
    $username=$_GET['username'];
    $sql="SELECT * FROM user WHERE username='$username'";
    $result=$con->query($sql);
    $row=mysqli_fetch_array($result);
    @unlink('user_pic/'.$row['user_pic']);
    $sql="DELETE FROM user WHERE username='$username'";
    $result=$con->query($sql);
    if(!$result){
        echo"<script>alert('ไม่สามารถลบได้')</script>";
    }
    else{
        echo "<script>window.location.href='user.php'</script>";
    }
?> 
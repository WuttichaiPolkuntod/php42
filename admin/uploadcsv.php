<?php 
    include '../connect.php';
    $filename=$_FILES['csv_file']['name'];
    if(isset($filename)){
        move_uploaded_file($_FILES['csv_file']['tmp_name'],'csv/'.$filename);
        $file_csv=fopen('csv/'.$filename,"r");
        while($row_csv=fgetcsv($file_csv,1000,",")){
        $username=$row_csv[0];
        $password=$row_csv[1];
        $name=$row_csv[2];
        $email=$row_csv[3];
        $sql="INSERT INTO user(username,password,name,email) VALUES('$username','$password','$name','$email')";
        $result=$con->query($sql);
        }
    fclose($file_csv);
    header('location:user.php');
    }
?>
<?php 
    include '../connect.php';
    $filename=$_FILES['csv_file']['name'];
    if(isset($filename)){
        move_uploaded_file($_FILES['csv_file']['tmp_name'],'csv/'.$filename);
        $file_csv=fopen('csv/'.$filename,"r");
        while($row_csv=fgetcsv($file_csv,1000,",")){
        $name=$row_csv[0];
        $price=$row_csv[1];
        $qty=$row_csv[2];
        $sql="INSERT INTO product(pro_name,pro_price,pro_qty) VALUES('$name','$price','$qty')";
        $result=$con->query($sql);
        }
    fclose($file_csv);
    header('location:product.php');
    }
?>
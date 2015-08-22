<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_report";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //$item_id = $_POST['id'];
    mysqli_autocommit($conn, FALSE);
    $item_id = filter_var($_POST['item_id'], FILTER_VALIDATE_INT);
    $item_size = filter_var($_POST['item_size'], FILTER_SANITIZE_STRING);
    $item_color = filter_var($_POST['item_color'], FILTER_SANITIZE_STRING);
    $information = filter_var($_POST['information'], FILTER_SANITIZE_STRING);
    $string1 =  filter_var($_POST['purchase_price'], FILTER_SANITIZE_STRING);
    $string2 =  filter_var($_POST['selling_price'], FILTER_SANITIZE_STRING);
    $jml2 = strlen($string2);

    for ($i=0; $i<$jml2; $i++)  
    {  
        
        $purchase_price = $string1;
        $selling_price = $string2;  
        $purchase_price = str_replace(",", "", $purchase_price);  
        $selling_price = str_replace(",", "", $selling_price);  
    }   
    $sql = "INSERT INTO tb_purchase (item_size,item_color,purchase_price,selling_price,purchase_date,information)
    VALUES ('$item_size', '$item_color', '$purchase_price', '$selling_price', now(), '$information');";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        }

    $sql = "INSERT INTO tb_sell (item_id,item_code,status)
    VALUES ('$item_id', LAST_INSERT_ID(), 'ada')";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        }

    mysqli_commit($conn);
    mysqli_close($conn);
    
    
?>




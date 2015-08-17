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
    
    $sql = "INSERT INTO tb_purchase (item_size,item_color,purchase_price,selling_price,purchase_date,information)
    VALUES ('{$_POST['item_size']}', '{$_POST['item_color']}', '{$_POST['purchase_price']}', '{$_POST['selling_price']}', now(), '{$_POST['information']}');";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        }

    $sql = "INSERT INTO tb_sell (item_id,item_code,status)
    VALUES ('{$_POST['item_id']}', LAST_INSERT_ID(), 'ada')";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        }

    mysqli_commit($conn);
    mysqli_close($conn);
    
    
?>




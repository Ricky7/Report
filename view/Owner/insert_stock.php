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

    mysqli_autocommit($conn, FALSE);
    // many to many relation query
    //$date = date('Y-m-d',  strtotime($_POST['purchase_date']));
    $sql = "INSERT INTO tb_info_item (item_name,item_type,kode)
    VALUES ('{$_POST['item_name']}', '{$_POST['item_type']}', '{$_POST['kode']}');";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        //header('location:form_input_stock.php?message=failed');
        }
    // mengambil item_id dari query sebelumnya
    $hasil = mysqli_query($conn, "SELECT MAX(item_id) AS last_id FROM tb_info_item LIMIT 1");
    if($hasil === FALSE) { 
        die(mysqli_error());
    }
    $row = mysqli_fetch_array($hasil);
    
    $lastId = $row['last_id'];
    
    
    $sql = "INSERT INTO tb_purchase (item_size,item_color,purchase_price,selling_price,purchase_date,information)
    VALUES ('{$_POST['item_size']}', '{$_POST['item_color']}', '{$_POST['purchase_price']}', '{$_POST['selling_price']}', now(), '{$_POST['information']}');";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        //header('location:form_input_stock.php?message=failed');
        }
    
    $sql = "INSERT INTO tb_sell (item_id,item_code,status)
    VALUES ('$lastId', LAST_INSERT_ID(), 'ada')";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        //header('location:form_input_stock.php?message=failed');
        }

    mysqli_commit($conn);
    mysqli_close($conn);
    //header('location:form_input_stock.php?message=success');
    
?>




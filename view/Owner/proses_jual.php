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
    $date = 'now()';
    $item_id = $_POST['item_id'];

    $string2 =  filter_var($_POST['sold_price'], FILTER_SANITIZE_STRING);
    $information = filter_var($_POST['information'], FILTER_SANITIZE_STRING);
    $jml2 = strlen($string2);

    for ($i=0; $i<$jml2; $i++)  
    {  
        $sold_price = $string2;  
        $sold_price = str_replace(",", "", $sold_price);  
    }   
    $sql = "UPDATE tb_sell SET sold_price=' $sold_price', sold_date=$date, sold_by='{$_POST['sold_by']}', status='{$_POST['status']}' WHERE item_code='{$_POST['item_code']}'";
    $result = mysqli_query($conn, $sql);
    if ($result !== TRUE) {
        mysqli_rollback($conn); //kalau ada error di query ini, akan di rollback
        }

    mysqli_commit($conn);
    mysqli_close($conn);
    header("location:info_barang.php?id=$item_id");
    
?>




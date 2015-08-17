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
    $sql = "INSERT INTO warna (warna)
    VALUES ('{$_POST['item_color']}');";
    $result = mysqli_query($conn, $sql) or mysqli_rollback($conn);
    
    mysqli_commit($conn);
    //mysqli_close($conn);
    $sql_in= mysqli_query($conn, "SELECT warna,id FROM warna order by id desc");
    $r=mysqli_fetch_array($sql_in);
    
    ?>
    Warna <b><?php echo $r['warna']; ?></b> sudah disimpan<br>
    <?php

    //include "../../inc/koneksi.php";

    //tangkap data dari form
    //$item_color = $_POST['item_color'];
    
    //simpan data ke database
    //$query = mysql_query("insert into warna values('', '$item_color')") or die(mysql_error());
?>
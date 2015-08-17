<?php
    //include('koneksi.php');
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

    if(isset($_POST['cari_keyword']))
    {
        $cari_keyword = $conn->real_escape_string($_POST['cari_keyword']);
        $sql="SELECT item_id,item_name FROM tb_info_item WHERE item_name LIKE '%$cari_keyword%'";
        $result=mysqli_query($conn, $sql);
        if($result === FALSE) { 
                die(mysql_error()); 
            }
        while($row=mysqli_fetch_array($result))
        {
            $item_id=$row['item_id'];
            $item_name=$row['item_name'];
            $b_item_name='<b>'.$cari_keyword.'</b>';
            $final_itemName=str_ireplace($cari_keyword, $b_item_name, $item_name);
            ?>
                <div class="show" align="left">
                
                <span class="nama_produk"><a href="info_barang.php?id=<?php echo $item_id; ?>" style="display:block"><?php echo $final_itemName; ?></a></span>
                
                </div>
            <?php
        }
        /*if($result === false) {
            trigger_error('Error: ' . $conn->error, E_USER_ERROR);
        }else{
            $rows_returned = $result->num_rows;
        }
 
         $bold_cari_keyword = '<strong>'.$cari_keyword.'</strong>';
         if($rows_returned > 0){
            while($row = $result->fetch_assoc()) 
            { 
                echo '<div class="show" align="left"><span class="nama_produk">'.str_ireplace($cari_keyword,$bold_cari_keyword,$row['item_name']).'</span></div>'; 
            }
        }else{
            echo '<div class="show" align="left">No matching records.</div>'; 
        }*/


    } 
?>
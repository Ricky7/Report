<?php
	include "../../inc/mysqli_conn.php";
	if(isset($_POST['from']))
	{
		$from = $_POST['from'];
		$to = $_POST['to'];
		$query = "SELECT item_name, item_type, item_size, item_color, sold_price FROM tb_sell inner join tb_purchase inner join tb_info_item WHERE tb_sell.item_id=tb_info_item.item_id AND tb_sell.item_code=tb_purchase.item_code AND tb_sell.sold_date BETWEEN ? AND ?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("ss", $from, $to);
		$stmt->execute();
		$stmt->store_result();
        $stmt->bind_result($item_name, $item_type, $item_size, $item_color, $sold_price);
        $count = $stmt->num_rows;

        $query2 = "SELECT SUM(sold_price) AS Total FROM tb_sell WHERE sold_date BETWEEN ? AND ?";
        $ttl = $mysqli->prepare($query2);
        $ttl->bind_param("ss", $from, $to);
        $ttl->execute();
        $ttl->bind_result($Total);
        $ttl->fetch();
        $ttl->close(); //harus ditutup LOL

        $query3 = "SELECT SUM(purchase_price) AS Modal FROM tb_sell INNER JOIN tb_purchase WHERE tb_sell.item_code=tb_purchase.item_code AND tb_sell.sold_date BETWEEN ? AND ?";
        $mdl = $mysqli->prepare($query3);
        $mdl->bind_param("ss", $from, $to);
        $mdl->execute();
        $mdl->bind_result($Modal);
        $mdl->fetch();

        if($count > 0)
		{
			$jumlah_desimal = "0";
			$pemisah_desimal = ",";
			$pemisah_ribuan = ".";
			$untung = $Total - $Modal;
			?>
			Jumlah Penjualan : <?php echo $count ?> Item<br>
			Total Pemasukan : <?php echo "Rp ".number_format($Total,$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?><br>
			Modal Pembelian : <?php echo "Rp ".number_format($Modal,$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?><br>
			Keuntungan : <?php echo "Rp ".number_format($untung,$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?>
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>Nama Produk</th>
						<th>Jenis</th>
						<th>Ukuran</th>
						<th>Warna</th>
						<th>Harga Jual</th>
					</tr>
				</thead>
				<tbody>
			<?php
			while ($stmt->fetch()) {
	            ?>
	            
					<tr>
						<td><?php echo $item_name ?></td>
						<td><?php echo $item_type ?></td>
						<td><?php echo $item_size ?></td>
						<td><?php echo $item_color ?></td>
						<td><?php echo "Rp ".number_format($sold_price,$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
					</tr>
				
	            <?php
	        }
	        ?>
	        	</tbody>
			</table>
	        <?php
		}else{
			echo "<li>No Results</li>";
		}
        
        $stmt->close();
		
	}
?>
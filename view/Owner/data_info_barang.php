
<script type="text/javascript">
$(function() {
$(".hapus").click(function() {
	var id = $(this).attr("id");
	var dataString = 'id='+ id ;
	var parent = $(this).parent();
	if (confirm('Are you sure you want to delete this?')) {
		$.ajax({
			type: "POST",
			url: "delete_stockBarang.php",
			data: dataString,
			cache: false,

			success: function(html)
			{
				//alert("berhasil dihapus");
			}
		});
	}
	return false;
	});
});
</script>
<div class="row table-responsive">
	<table class="table table-hover table-responsive" align="center">
		<thead>
			<tr>
				<th>Kode</th>
				<th>Ukuran</th>
				<th>Warna</th>
				<th>Harga Beli</th>
				<th>Harga Jual</th>
				<th>Keterangan</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include "../../inc/koneksi.php";
				$item_id = $_GET['id'];
				$query = mysql_query("select * from tb_purchase inner join tb_sell on tb_purchase.item_code=tb_sell.item_code where tb_sell.item_id=$item_id AND tb_sell.status='ada'");

				//$no = 1;
				if($query === FALSE) { 
				    die(mysql_error()); 
				}
				while ($data = mysql_fetch_array($query)) {
					$jumlah_desimal = "0";
					$pemisah_desimal = ",";
					$pemisah_ribuan = ".";
			?>
			<tr>
				<td><?php echo $data['item_code']; ?></td>
				<td><?php echo $data['item_size'] ?></td>
				<td><?php echo $data['item_color'] ?></td>
				<td><?php echo "Rp ".number_format($data['purchase_price'],$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
				<td><?php echo "Rp ".number_format($data['selling_price'],$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
				<td>
					<?php 
					if ($data['information'] == ''){
						echo "<i>Tidak Ada Keterangan</i>";
						}
						else{
							echo $data['information'];
						}
					?>
				</td>
				<td><a class='btn btn-info btn-xs' href="edit_dataStock.php?id=<?php echo $data['item_code'] ?>" ><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" id="<?php echo $data['item_code'] ?>" class="hapus btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a> <a class='btn btn-success btn-xs' href="jual_barang.php?slug=<?php echo $data['item_code'] ?>" ><span class="glyphicon glyphicon-edit"></span> Sell</a></td>
			</tr>
			<?php
				//$no++;
			}
			?>
		</tbody>
	</table>
</div>

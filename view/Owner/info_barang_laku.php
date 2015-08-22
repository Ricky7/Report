<?php
	include "owner_layout.php";
?>
<style>
#div1{
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
	margin-right: 10px;
}
</style>
<div class="container" style="margin-top:70px;border:1px solid #8AC007">
	<div class="row">
		<div class="col-xs-12" id="div1" align="center">
			<span style="font-size:20px;">Informasi Barang <font color="red" size="4px"><i>SOLD OUT!</i></font></span>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" id="div1" align="center">
		<?php
		 	include "../../inc/koneksi.php";
			$id = $_GET['id'];

			$query = mysql_query("select * from tb_info_item where item_id='$id'") or die(mysql_error());

			$data = mysql_fetch_array($query);
			$image = $data['image'];

			if ($image == ''){
				echo '<img src="../../public/images/default-placeholder.png" width="160" height="220" class="img-responsive"/>';
			}
			else
			{
				echo '<img src="uploadedImages/'.$image.'" width="160" height="220" class="img-responsive"/>';
			}
		?>
			<br><a class='btn btn-info btn-xs' href="#" ><span class="glyphicon glyphicon-edit"></span> Edit</a> <a class='btn btn-success btn-xs' href="info_barang.php?id=<?php echo $data['item_id'] ?>" ><span class="glyphicon glyphicon-ok"></span> Available</a>
		
		</div>
		
	</div>
	<div class="row">
		<div id="status" align="center"></div>
		<div class="col-xs-12" id="div1" align="center">
			<label>Nama Barang : </label> <span ><?php echo $data['item_name']; ?></span><br>
			<label>Merk Produk : </label> ----<br>
			<label>Jenis Produk : </label> <?php echo $data['item_type']; ?><br>
			<label>Bahan Produk : </label> ----<br>
			<label>Kode : </label> <?php echo "<b><font color='red'>".strtoupper($data['kode'])."</font></b>" ?><br>
		</div>
	</div>
</div>

<div id="dataInfoBarang" class="container" style="border:1px solid #8AC007; margin-top:20px;">
	<div class="row table-responsive">
		<table class="table table-hover table-responsive" align="center">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Ukuran</th>
					<th>Warna</th>
					<th>Harga Beli</th>
					<th>Harga Laku</th>
					<th>Tanggal Laku</th>
					<th>Keterangan</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include "../../inc/koneksi.php";
					$item_id = $_GET['id'];
					$query = mysql_query("select * from tb_purchase inner join tb_sell on tb_purchase.item_code=tb_sell.item_code where tb_sell.item_id=$item_id AND tb_sell.status='sold'");

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
					<td><?php echo "Rp ".number_format($data['sold_price'],$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
					<td><?php echo $data['sold_date'] ?></td>
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
					<td><font color="red" size="3px"><i>SOLD OUT!</i></font></td>
				</tr>
				<?php
					//$no++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>
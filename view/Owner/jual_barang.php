<?php
	include "owner_layout.php";
	include "../../inc/koneksi.php";
	$slug = $_GET['slug'];

	$query = mysql_query("select * from tb_sell inner join tb_purchase inner join tb_info_item where tb_sell.item_id=tb_info_item.item_id AND tb_sell.item_code=tb_purchase.item_code AND tb_sell.item_code='$slug'") or die(mysql_error());

	$data = mysql_fetch_array($query);
	$jumlah_desimal = "0";
	$pemisah_desimal = ",";
	$pemisah_ribuan = ".";
?>
<div class="container" style="margin-top:70px;margin-bottom:20px;border:1px solid #8AC007;">
	<div class="row">
		<div align="center"style="margin-bottom:10px"><font size="5px" color="Blue">Jual Item</font></div>
	</div>
	<div class="row">
		<div align="center">
			<img src="../../public/images/default-placeholder.png" width="160" height="250" class="img-responsive"/><br>
			<label>Nama Item :</label> <?php echo $data['item_name'] ?><br>
			<label>Merk Item :</label> <?php echo $data['item_brand'] ?><br>
			<label>Jenis Item :</label> <?php echo $data['item_type'] ?><br>
			<label>Bahan :</label> <?php echo $data['material'] ?><br>
			<label>Buatan :</label> <?php echo $data['made_in'] ?><br>
			<label>Kode Item :</label> <?php echo "<b><font color='red'>".$data['item_code']."</font></b>" ?><br>
			<label>Ukuran :</label> <?php echo $data['item_size'] ?><br>
			<label>Warna :</label> <?php echo $data['item_color'] ?><br>
			<label>Harga Beli :</label> <?php echo "Rp ".number_format($data['purchase_price'],$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?><br>
			<label>Keterangan :</label> <?php if ($data['information'] == ''){echo "<i>Tidak Ada Keterangan</i>";}else{echo $data['information'];} ?><br>
			<label>Tanggal Input :</label> <?php echo $data['purchase_date'] ?><br>
		</div>
	</div>
	<div class="row">
		<div align="center" class="col-md-4 col-md-offset-4">
			<label>Harga Jual :</label> <?php echo "Rp ".number_format($data['selling_price'],$jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?><br>
			<form method="POST" action="proses_jual.php">
				<input type="hidden" name="item_id" value="<?php echo $data['item_id'] ?>">
				<input type="hidden" name="item_code" value="<?php echo $data['item_code'] ?>">
				<input type="hidden" name="status" value="sold">
				<input type="hidden" name="sold_by" value="<?php echo $_SESSION['username']; ?>">
				<input type="text" name="sold_price" required="required" class="form-control">
				<div style="margin-top:5px;margin-bottom:5px;"><input type="submit" value="submit" class="submit btn btn-primary"><div>
			</form>
		</div>
	</div>
</div>

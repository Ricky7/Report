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
			<span style="font-size:20px;">Informasi Barang <font color="green" size="4px"><i>AVAILABLE!</i></font></span>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" id="div1" align="center">
		<?php
			$id = $_GET['id'];

			$query = mysql_query("select * from tb_info_item where item_id='$id'") or die(mysql_error());

			$data = mysql_fetch_array($query);
			$image = $data['image'];

			if ($image == ''){
				echo '<img src="../../public/images/default-placeholder.png" width="160" height="220" class="im1 img-responsive"/>';
			}
			else
			{
				echo '<img src="uploadedImages/'.$image.'" width="160" height="220" class="im1 img-responsive"/>';
			}
		?>
			<br><a class='btn btn-info btn-xs' href="edit_infoBarang.php?id=<?php echo htmlspecialchars($data['item_id']); ?>" ><span class="glyphicon glyphicon-edit"></span> Edit</a> <a class='btn btn-warning btn-xs' href="info_barang_laku.php?id=<?php echo $data['item_id'] ?>" ><span class="glyphicon glyphicon-share"></span> Sold Out</a>
		
		</div>
		
	</div>
	<div class="row">
		<div class="col-xs-12" id="div1" align="center">
			<form method="POST" action="upload_image.php" enctype="multipart/form-data">
				<div id="editImg" style="display:none;margin-bottom:30px;" align="center">
					<input type="hidden" id="item_id" name="item_id" value="<?php echo $data['item_id']; ?>">
					<br><font size='0.5px'>Upload maks 100Kb :</font><input type="file" class='btn btn-info btn-xs' name="image" id="image" accept=".png, .jpg, .gif" required>
					<input type="submit" class='submit btn btn-xs' id="submit" value="submit">
				</div>
			</form>
			<button class='btn btn-success btn-xs'><span class="glyphicon glyphicon-edit"></span> Edit Image</button>
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
<script type="text/javascript">
$(document).ready(function(){
    $("button").click(function(){
        $("#editImg").toggle(1000);
    });
});
</script>

<script type="text/javascript">
    $(document).on('click','a.fts',function() {
	  	var url = $(this).attr('href');
	    $('#formTambahStock').html('<h4>Loading...</h4>').load(url);
	    return false;
	  
	});
</script>
<script type="text/javascript">
// script autoload
var auto_refresh = setInterval(
function ()
{
	$("#loader").hide();
	$('#dataInfoBarang').load('data_info_barang.php?id=<?php echo $data['item_id'] ?>').fadeIn("slow");
}, 3000); // refresh every 5 seconds

</script>
<div id="loader" align="center"><img src="../../public/images/ajax-loader.gif" /></div>
<div id="dataInfoBarang" class="container" style="border:1px solid #8AC007; margin-top:20px;"></div>



<div id="formTambahStock" style="margin-top:5px;margin-bottom:5px;"><div align="center"><a href="form_tambah_stock.php?id=<?php echo $data['item_id'] ?>" class="fts btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Tambah</a></div></div>
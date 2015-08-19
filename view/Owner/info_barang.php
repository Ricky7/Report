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

<br><br><br><br>
<div class="container" style="border:1px solid #8AC007">
	<div class="row">
		<div class="col-xs-12" id="div1" align="center">
			<span style="font-size:20px;">Informasi Barang</span>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" id="div1" align="center">
		<?php
			$id = $_GET['id'];

			$query = mysql_query("select * from tb_info_item where item_id='$id'") or die(mysql_error());

			$data = mysql_fetch_array($query);
		?>
			<img src="../../public/images/default-placeholder.png" width="160" height="250" class="img-responsive"/>
		
		</div>
		
	</div>
	<div class="row">
		<div class="col-xs-12" id="div1" align="center">
			<label>Nama Barang : </label> <?php echo $data['item_name']; ?><br>
			<label>Merk Produk : </label> <?php echo $data['item_brand']; ?><br>
			<label>Jenis Produk : </label> <?php echo $data['item_type']; ?><br>
			<label>Bahan Produk : </label> <?php echo $data['material']; ?><br>
			<label>Buatan : </label> <?php echo $data['made_in']; ?><br>
		
		</div>
	</div>
</div>

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



<div id="formTambahStock" class="container" style="margin-top:5px;margin-bottom:5px;"><a href="form_tambah_stock.php?id=<?php echo $data['item_id'] ?>" class="fts"><center><input type="button" value="Tambah" class="btn" /></center></a></div>
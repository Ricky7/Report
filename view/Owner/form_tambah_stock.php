<script type="application/javascript">
$(document).on('click','.submit',function() {
// $(function() {
// 	$(".submit").click(function() {
	var item_id = $("#item_id").val();
	var item_size = $("#item_size").val();
	var item_color = $("#item_color").val();
	var purchase_price = $("#purchase_price").val();
	var selling_price = $("#selling_price").val();
	var information = $("#information").val();
	var dataString = 'item_id=' + item_id + '&item_size=' + item_size + '&item_color=' + item_color + '&purchase_price=' + purchase_price + '&selling_price=' + selling_price + '&information=' + information;

	
	if(item_size=='' || item_color=='' || purchase_price=='' || selling_price=='')
	{
		alert("Masih Ada Form yang Kosong, Cek Sekali lagi");
	}
	else
	{
		$.ajax({
			type: "POST",
			url: "insert_tambah_stock.php",
			data: dataString,
			cache: false,
			success: function(html){
				$('.success').fadeIn(200).show();
				document.getElementById('item_size').value='';
				document.getElementById('item_color').value='';
				document.getElementById('purchase_price').value='';
				document.getElementById('selling_price').value='';
				document.getElementById('information').value='';
			}
		});
	}
	return false;
	//});
});
</script>
<?php
	include "../../inc/koneksi.php";
	$id = $_GET['id'];

	$query = mysql_query("select * from tb_info_item where item_id='$id'") or die(mysql_error());

	$data = mysql_fetch_array($query);
?>
<div class="container" style="margin-top:20px;margin-bottom:20px;">
	<div class="row">
		<div align="center"><span style="font-size:20px;">form tambah stock</span></div>
		<div align="center"><span class="success" style="display:none" align="center">Input Successfully</span></div>
	</div>
	<div class="row">
		<form method="POST">
		<div class="form-group">
	        <div class="row">
	            <div class="col-xs-4 selectContainer">
	            	<label class="control-label">Ukuran</label>
	            	<input type="hidden" name="item_id" id="item_id" value="<?php echo $data['item_id']; ?>">
	            	<select class="form-control" name="item_size" id="item_size" required="required">
	                    <option value="">Choose</option>
	                <?php
						$query = mysql_query("select * from tb_sizes");
						$no = 1;
						while ($data = mysql_fetch_array($query)) {
					?>
				  		<option value="<?php echo $data['size'] ?>"><?php echo $data['size'] ?></option>
				  	<?php 
						$no++;
					}
					?>	        
	                </select>
	            </div>
	            <div class="col-xs-4 selectContainer">
	            	<label class="control-label">Warna</label>
	                <select class="form-control" name="item_color" id="item_color" required="required">
						<option value="">Choose</option>
					<?php
						$query = mysql_query("select * from warna");
						$no = 1;
						while ($data = mysql_fetch_array($query)) {
					?>
				  		<option value="<?php echo $data['warna'] ?>"><?php echo $data['warna'] ?></option>
				  	<?php 
						$no++;
					}
					?>	    
				  	</select>
	            </div>
	            <div class="col-xs-4 selectContainer">
	            	<label class="control-label">Harga Beli</label>
		                <input type="text" class="form-control" name="purchase_price" id="purchase_price" required="required" placeholder="cth : 1000000"/>
	            </div>
	        </div>
		</div>
		<div class="form-group">
	        <div class="row">
	            <div class="col-xs-4 selectContainer">
	            	<label class="control-label">Harga Jual</label>
		                <input type="text" class="form-control" name="selling_price" id="selling_price" required="required" placeholder="cth : 1000000"/>
	            </div>
	            <div class="col-xs-8 selectContainer">
	            	<label class="control-label">Keterangan</label>
		            <textarea class="form-control" name="information" id="information"></textarea>
	            </div>
	        </div>
	    </div>
	    <div class="form-group">
	        <div class="row">
	            <div class="col-xs-12" align="center">
				<input type="submit" id="submit" class="submit btn btn-xs btn-primary" value="submit"></button>
				<a href="info_barang.php?id=<?php echo $id ?>"><input type="button" value="Close" class="btn btn-xs" /></a>
				</div>
	        </div>
	    </div>
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $(window).unload(function(){
    	
        alert("Goodbye!");
    });
});
</script>

<script type="text/javascript" src="../../public/javascripts/jquery.maskMoney.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('#purchase_price').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$('#selling_price').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		
	});
</script>

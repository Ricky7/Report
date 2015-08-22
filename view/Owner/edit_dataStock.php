<?php
	include "owner_layout.php";
	$id = $_GET['id'];

	$query = mysql_query("select * from tb_sell inner join tb_purchase where tb_sell.item_code=tb_purchase.item_code and tb_sell.item_code='$id'") or die(mysql_error());

	$dataStock = mysql_fetch_array($query);

	$item_id = $dataStock['item_id'];
	$query2 = mysql_query("select * from tb_info_item where item_id=$item_id") or die(mysql_error());
	$infoStock = mysql_fetch_array($query2);

?>

<div class="container" style="margin-top:70px;margin-bottom:20px;">
	<div class="row">
		<div align="center"><span style="font-size:20px;">Form edit</span></div>
		<div style="margin-bottom:10px;"><font size="3px">Nama Barang : <?php echo $infoStock['item_name'] ?></font></div>
	</div>
	<div class="row">
		<form method="POST" action="edit_dataStockProses.php">
		<div class="form-group">
	        <div class="row">
	            <div class="col-xs-4 selectContainer">
	            	<label class="control-label">Ukuran</label>
	            	<input type="hidden" name="item_code" id="item_code" value="<?php echo $dataStock['item_code']; ?>">
	            	<input type="hidden" name="item_id" id="item_id" value="<?php echo $infoStock['item_id']; ?>">
	            	<select class="form-control" name="item_size" id="item_size" required="required">
	                    <option value="<?php echo $dataStock['item_size'] ?>"><?php echo $dataStock['item_size'] ?> - Default Size</option>
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
						<option value="<?php echo $dataStock['item_color'] ?>"><?php echo $dataStock['item_color'] ?> - Default Color</option>
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
		                <input type="text" class="form-control" name="purchase_price" id="purchase_price" required="required" value="<?php echo $dataStock['purchase_price'] ?>"/>
	            </div>
	        </div>
		</div>
		<div class="form-group">
	        <div class="row">
	            <div class="col-xs-4 selectContainer">
	            	<label class="control-label">Harga Jual</label>
		                <input type="text" class="form-control" name="selling_price" id="selling_price" required="required" value="<?php echo $dataStock['selling_price'] ?>"/>
	            </div>
	            <div class="col-xs-8 selectContainer">
	            	<label class="control-label">Keterangan</label>
		            <textarea class="form-control" name="information" id="information"><?php echo $dataStock['information'] ?></textarea>
	            </div>
	        </div>
	    </div>
	    <div class="form-group">
	        <div class="row">
	            <div class="col-xs-12" align="center">
					<input type="submit" id="submit" class="submit btn btn-primary" value="submit"></button>
				</div>
	        </div>
	    </div>
		</form>
	</div>
</div>

<script type="text/javascript" src="../../public/javascripts/jquery.maskMoney.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('#purchase_price').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$('#selling_price').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		
	});
</script>
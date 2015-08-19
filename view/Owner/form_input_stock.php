<?php
	
	include "../../inc/koneksi.php";
	include "owner_layout.php";
?>
<style type="text/css">
/* Adjust feedback icon position */
#movieForm .form-control-feedback {
	    right: 15px;
	}
#movieForm .selectContainer .form-control-feedback {
	    right: 25px;
	}
</style>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" >
$(function() {
	$(".submit").click(function() {
	var item_name = $("#item_name").val();
	var item_brand = $("#item_brand").val();
	var item_type = $("#item_type").val();
	var material = $("#material").val();
	var made_in = $("#made_in").val();
	var item_size = $("#item_size").val();
	var item_color = $("#item_color").val();
	var purchase_price = $("#purchase_price").val();
	var selling_price = $("#selling_price").val();
	var information = $("#information").val();
	var dataString = 'item_name='+ item_name + '&item_brand=' + item_brand + '&item_type=' + item_type + '&material=' + material + '&made_in=' + made_in + '&item_size=' + item_size + '&item_color=' + item_color + '&purchase_price=' + purchase_price + '&selling_price=' + selling_price + '&information=' + information;

	
	if(item_name=='' || item_brand=='' || item_type=='' || material=='' || made_in=='' || item_size=='' || item_color=='' || purchase_price=='' || selling_price=='')
	{
		alert("Ada form yang Kosong...");
	}
	else
	{
		$.ajax({
			type: "POST",
			url: "insert_stock.php",
			data: dataString,
			cache: false,
			success: function(html){
				$('.success').fadeIn(200).show();
				document.getElementById('item_name').value='';
				document.getElementById('item_brand').value='';
				document.getElementById('item_type').value='';
				document.getElementById('material').value='';
				document.getElementById('made_in').value='';
				document.getElementById('item_size').value='';
				document.getElementById('item_color').value='';
				document.getElementById('purchase_price').value='';
				document.getElementById('selling_price').value='';
				document.getElementById('information').value='';
			}
		});
	}
	return false;
	});
});
</script>
<div class="container">
	<div class="row">
		<br><br><br><br>
	</div>
	<div class="row">
		<?php
			if (!empty($_GET['message']) && $_GET['message'] == 'success') {
				echo '<h3 align="center"><font color="Green"><i>SUCCESS!</i></font></h3>';
			}
			else if (!empty($_GET['message']) && $_GET['message'] == 'failed') {
				echo '<h3 align="center"><font color="Red"><i>FAILED!</i></font></h3>';
			}
		?>
		<span class="success" style="display:none" align="center">Successfully</span>
		<form method="POST">
			<div class="form-group">
		        <div class="row">
		            <div class="col-xs-8">
		                <label class="control-label">Nama Produk</label>
		                <input type="text" class="form-control" name="item_name" id="item_name"/>
		            </div>

		            <div class="col-xs-4 selectContainer">
		                <label class="control-label">Merk</label>
		                <select class="form-control" name="item_brand" id="item_brand" required="required">
		                    <option value="">Choose</option>
		                <?php
							$query = mysql_query("select * from tb_brand");
							$no = 1;
							while ($data = mysql_fetch_array($query)) {
						?>
					  		<option value="<?php echo $data['merk'] ?>"><?php echo $data['merk'] ?></option>
					  	<?php 
							$no++;
						}
						?>	     
		                </select>
		            </div>

		            
		        </div>
		    </div>

		    <div class="form-group">
		        <div class="row">
		        	<div class="col-xs-4 selectContainer">
		                <label class="control-label">Jenis</label>
		                <select class="form-control" name="item_type" id="item_type" required="required">
		                    <option value="">Choose</option>
		                <?php
							$query = mysql_query("select * from tb_types");
							$no = 1;
							while ($data = mysql_fetch_array($query)) {
						?>
					  		<option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
					  	<?php 
							$no++;
						}
						?>	 
		                </select>
		            </div>

		            <div class="col-xs-4 selectContainer">
		                <label class="control-label">Bahan</label>
		                <select class="form-control" name="material" id="material" required="required">
		                    <option value="">Choose</option>
		                <?php
							$query = mysql_query("select * from tb_material");
							$no = 1;
							while ($data = mysql_fetch_array($query)) {
						?>
						  	<option value="<?php echo $data['bahan'] ?>"><?php echo $data['bahan'] ?></option>
						<?php 
							$no++;
						}
						?>	 
		                </select>
		            </div>

		            <div class="col-xs-4 selectContainer">
		                <label class="control-label">Buatan</label>
		                <select class="form-control" name="made_in" id="made_in" required="required">
		                    <option value="">Choose</option>
		                <?php
							$query = mysql_query("select * from tb_madein");
							$no = 1;
							while ($data = mysql_fetch_array($query)) {
						?>
					  		<option value="<?php echo $data['from'] ?>"><?php echo $data['from'] ?></option>
					  	<?php 
							$no++;
						}
						?>	    
		                </select>
		            </div>

		            
		        </div>
		    </div>

			<div class="form-group">
		        <div class="row">
		            <div class="col-xs-6 selectContainer">
		                <label class="control-label">Ukuran</label>
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

		            <div class="col-xs-6 selectContainer">
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

		            
		        </div>
		    </div>

		    <div class="form-group">
		        <div class="row">
		            <div class="col-xs-4">
		                <label class="control-label">Harga Beli</label>
		                <input type="text" class="form-control" name="purchase_price" id="purchase_price" required="required" placeholder="cth : 1000000"/>
		            </div>

		            <div class="col-xs-4">
		                <label class="control-label">Harga Jual</label>
		                <input type="text" class="form-control" name="selling_price" id="selling_price" required="required" placeholder="cth : 1000000"/>
		            </div>

		            <div class="col-xs-4">
		                <label class="control-label">Tanggal Beli</label>
		                <input type="text" class="form-control" name="purchase_date" id="datepicker" required="required" disabled/>
		            </div>
		        </div>
		    </div>
			
			<div class="form-group">
		        <div class="row">
		            <div class="col-xs-12">
		                <label class="control-label">Keterangan</label>
		                <textarea class="form-control" name="information" id="information"></textarea>
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
<div>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!-- <script src="../../public/javascripts/jquery-1.10.2.js"></script> -->





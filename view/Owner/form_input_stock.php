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

<style type="text/css">
.green
{
	background-color:#CEFFCE;
}
.red
{
	background-color:#FFD9D9;
}
</style>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->

<script src="../../public/javascripts/jqueryAva.js" type="text/javascript"></script>
<!-- cek kode -->
<script type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "../../public/images/loader.gif";

$(document).ready(function(){
	document.getElementById("submit").disabled = true;
	$("#kode").change(function() { 

		var kd = $("#kode").val();

		if(kd.length >= 3)
		{

			$("#info2").html('<img align="absmiddle" src="../../public/images/loader.gif" /> Checking availability...');

			$.ajax({ 
			type: "POST", 
			url: "cek_kode.php", 
			data: "kode="+ kd, 
				success: function(msg){ 
					
					$("#info2").ajaxComplete(function(event, request, settings){ 
						
							if(msg == 'OK')
							{ 
								document.getElementById("submit").disabled = false;
								// disable tombol enter
								$('#form1').keypress(function(event){
								    if (event.keyCode == 10 || event.keyCode == 13) 
								        event.preventDefault();
								});
								$("#kode").removeClass('red'); // textbox background
								$("#kode").addClass("green");
								$(this).html(' <img align="absmiddle" src="../../public/images/accepted.png" />');
							} 
							else 
							{ 	
								document.getElementById("submit").disabled = true;
								$("#kode").removeClass('green'); 
								$("#kode").addClass("red");
								$(this).html(' <img align="absmiddle" src="../../public/images/rejected.png" />');
							}
							
					});
					
				}
			});
		}
		else
		{
			$("#info1").html('The kode should have at least 3 characters.');
			$("#kode").removeClass('green'); // if necessary
			$("#kode").addClass("red");
		}
	});
});

//-->

</script>
<!-- ajax submit -->
<script type="text/javascript">
/*$(function() {
	$(".submit").click(function() {
	var kode = $("#kode").val();
	var item_name = $("#item_name").val();
	var item_type = $("#item_type").val();
	var image = $("#image").val();
	var dataString = 'kode='+ kode  + '&item_name='+ item_name  + '&item_type=' + item_type + '&image=' + image;

	
	if(kode=='' || item_name=='' || item_type=='')
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
				document.getElementById('kode').value='';
				document.getElementById('item_name').value='';
				document.getElementById('item_type').value='';
			}
		});
	}
	return false;
	});
});*/
</script>

<div class="container" style="margin-top:70px;">
	<div class="row">
		<span class="success" style="display:none" align="center">Successfully</span>
		<form method="POST" id="form1" action="insert_stock.php" enctype="multipart/form-data">
			<div class="form-group">
		        <div class="row">
		        	<div class="col-xs-4 selectContainer">
		                <label class="control-label">Kode <span id="info2"></span></label>
		                <input type="text" class="form-control" name="kode" id="kode" required="required">
		                <div id="info1"></div>
		            </div>
		            <div class="col-xs-8">
		                <label class="control-label">Nama Produk</label>
		                <input type="text" class="form-control" name="item_name" id="item_name" required="required"/>
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
		                <label class="control-label">Gambar (Maks 100Kb)</label>
		                <input type="file" name="image" id="image" accept=".png, .jpg, .gif" class="form-control" required>
		            </div>

		        </div>
		    </div>

			<div class="form-group">
		        <div class="row">
		            <div class="col-xs-12" align="center">
					<input type="submit" id="submit" class="submit btn btn-primary" value="submit">
					</div>
		        </div>
		    </div>
		</form>
	</div>
<div>

<script type="text/javascript" src="../../public/javascripts/validasiAngka.js"></script>

<!-- <script src="../../public/javascripts/jquery-1.10.2.js"></script> -->





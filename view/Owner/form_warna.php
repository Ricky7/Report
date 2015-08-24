<?php
	
	include "../../inc/koneksi.php";
	include "owner_layout.php";
?>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script src="../../public/javascripts/jqueryAva.js" type="text/javascript"></script>
<script type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "../../public/images/loader.gif";

$(document).ready(function(){
	document.getElementById("submit").disabled = true;
	$("#item_color").change(function() { 

		var itc = $("#item_color").val();

		if(itc.length >= 3)
		{

			$("#status").html('<img align="absmiddle" src="../../public/images/loader.gif" /> Checking availability...');

			$.ajax({ 
			type: "POST", 
			url: "cek_warna.php", 
			data: "item_color="+ itc, 
				success: function(msg){ 
					
					$("#status").ajaxComplete(function(event, request, settings){ 
						
							if(msg == 'OK')
							{ 
								document.getElementById("submit").disabled = false;
								// disable tombol enter
								$('#myForm').keypress(function(event){
								    if (event.keyCode == 10 || event.keyCode == 13) 
								        event.preventDefault();
								});
								$("#item_color").removeClass('red'); // textbox background
								$("#item_color").addClass("green");
								$(this).html(' <img align="absmiddle" src="../../public/images/accepted.png" /> Available ');
							} 
							else 
							{ 	
								document.getElementById("submit").disabled = true;
								$("#item_color").removeClass('green'); 
								$("#item_color").addClass("red");
								$(this).html(msg);
							}
							
					});
					
				}
			});
		}
		else
		{
			$("#status").html('The item_color should have at least 3 characters.');
			$("#item_color").removeClass('green'); // if necessary
			$("#item_color").addClass("red");
		}
	});
});

//-->

</script>

<script type="text/javascript">
// script autoload
var auto_refresh = setInterval(
function ()
{
	$("#loader").hide();
	$('#loadDataWarna').load('data_warna.php').fadeIn("slow");
}, 5000); // refresh every 5 seconds

</script>
<script type="text/javascript">
// script ajax
$(function() {
	$(".submit").click(function() {
		var item_color = $("#item_color").val();
				     
		var dataString = 'item_color='+ item_color;
		
		if(item_color=='')
		{
			alert("Kosong");
		}
		else
		{
		$("#flash").show();
		$("#flash").fadeIn(400).html('Loading Comment...');
		$.ajax({
			type: "POST",
		    url: "insert_warna.php",
		    data: dataString,
		    cache: false,
		    success: function(html){
		    $("#display").after(html);
			document.getElementById('item_color').value='';
			document.getElementById('item_color').focus();
			$("#flash").hide();
			}
		});
	}
	return false;
	});
});
</script>
<br><br><br>
<div class="container">
	<div class="form-group">
        <div class="row">
        	<div class="col-xs-6 selectContainer">
                <label class="control-label">Tambah Warna</label>
				<form method="POST" id="myForm">
					<input type="text" class="form-control" name="item_color" id="item_color" required="required"/>
					<div id="status" style="margin-bottom:5px;"></div>
					<input type="submit" name="submit" value="submit" class="submit btn btn-primary" id="submit">
				</form>
			</div>

			<div class="col-xs-6 selectContainer">
				<div id="flash"></div>
				<div id="display"></div>
				<div id="loadDataWarna"></div>
				<div id="loader" align="center" style="margin-top:50px;"><img src="../../public/images/ajax-loader.gif" /></div>
			</div>
		</div>
	</div>
</div>

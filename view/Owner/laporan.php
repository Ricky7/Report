<?php
	include "owner_layout.php";
?>
<style>
	*{margin:0;padding:0;}
ol.update
{
list-style:none;
font-size:1.1em; 
margin-top:20px 
}
ol.update li
{
height:70px;
border-bottom:#dedede dashed 1px; 
text-align:left;
}
ol.update li:first-child
{ 
border-top:#dedede dashed 1px; 
height:70px; 
text-align:left
}
</style>
<script type="text/javascript">
$(function() 
	{
	$(".submit").click(function() 
		{
			var from = $("#from").val();
			var to = $("#to").val();
			var fromto = 'dari tanggal ' + from + ' hingga ' + to; 
			var dataString = 'from=' + from + '&to=' + to;

			if(from==''||to=='')
			{
				$(".emp").show();
			}
			else
			{
				$.ajax({
				type: "POST",
				url: "cari_laporan.php",
				data: dataString,
				cache: false,
				beforeSend: function(html) 
				{
					document.getElementById("insert_search").innerHTML = ''; 
					$("#flash").show();
					$("#searchword").show();
					$(".searchword").html(fromto);
					$("#flash").html('<img src="../../public/images/ajax-loader.gif" /> Loading Results...');
				},

				success: function(html){
					$("#insert_search").show();
					$("#insert_search").append(html);
					$("#flash").hide();
					$(".emp").hide();
				}

			});

		}
		return false;
	});
});
</script>
<div class="container" style="margin-top:70px;">
	<div class="row">
		<div class="col-xs-12" style="margin-bottom:10px;">
			<form method="POST">
				<label for="from">From</label>
				<input type="date" id="from" name="from">
				<label for="to">to</label>
				<input type="date" id="to" name="to">
				<input type="submit" class="submit btn-xs" value="Cari">
	 			<span class="emp" style="display:none">Isi tanggal terlebih dahulu...</span>
 			</form>
		</div>
	</div>
	<div class="row">
		<div id="searchword">
		Hasil Pencarian <span class="searchword"></span></div>
		<div id="flash"></div>
		<div id="insert_search" style="margin-top:30px;"></div>
	<div>


</div>

<!DOCTYPE html>
<html>
<head>
	<title>Owner Page</title>

	<link rel="stylesheet" type="text/css" href="public/stylesheets/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/stylesheets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/stylesheets/style.css">
	<style type="text/css">
	 #cari_keyword_id
	 {
	 width:300px;
	 border:solid 1px #CDCDCD;
	 padding:10px;
	 font-size:14px;
	 }
	 #result
	 {
	 position:absolute;
	 width:320px;
	 display:none;
	 margin-top:-1px;
	 border-top:0px;
	 overflow:hidden;
	 border:1px #CDCDCD solid;
	 background-color: white;
	 }
	 .show
	 {
	 font-family:tahoma;
	 padding:10px; 
	 border-bottom:1px #CDCDCD dashed;
	 font-size:15px; 
	 }
	 .show:hover
	 {
	 background:#364956;
	 color:#FFF;
	 cursor:pointer;
	 }
	</style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#results" ).load( "view_stock.php"); //load initial records
		
		//executes code below when user click on pagination links
		$("#results").on( "click", ".pagination1 a", function (e){
			e.preventDefault();
			$(".loading-div").show(); //show loading element
			var page = $(this).attr("data-page"); //get page number from link
			$("#results").load("view_stock.php",{"page":page}, function(){ //get content from PHP page
				$(".loading-div").hide(); //once done, hide loading element
			});
			
		});
	});
	</script>	
	<style>
	body,td,th {
		font-family: Georgia, "Times New Roman", Times, serif;
		color: #333;
	}
	.contents{
		margin: 20px;
		padding: 20px;
		list-style: none;
		background: #F9F9F9;
		border: 1px solid #ddd;
		border-radius: 5px;
	}
	.contents li{
	    margin-bottom: 10px;
	}
	.loading-div{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.56);
		z-index: 999;
		display:none;
	}
	.loading-div img {
		margin-top: 20%;
		margin-left: 50%;
	}

	/* Pagination style */
	.pagination1{margin:0;padding:0;}
	.pagination1 li{
		display: inline;
		padding: 6px 10px 6px 10px;
		border: 1px solid #ddd;
		margin-right: -1px;
		font: 15px/20px Arial, Helvetica, sans-serif;
		background: #FFFFFF;
		box-shadow: inset 1px 1px 5px #F4F4F4;
	}
	.pagination1 li a{
	    text-decoration:none;
	    color: rgb(89, 141, 235);
	}
	.pagination1 li.first {
	    border-radius: 5px 0px 0px 5px;
	}
	.pagination1 li.last {
	    border-radius: 0px 5px 5px 0px;
	}
	.pagination1 li:hover{
		background: #CFF;
	}
	.pagination1 li.active{
		background: #F0F0F0;
		color: #333;
	}
	</style>
	<script type="text/javascript">
	/*// script autoload
	var auto_refresh = setInterval(
	function ()
	{
		$("#loader").hide();
		$('#viewStock').load('view_stock.php').fadeIn("slow");
	}, 3000); // refresh every 5 seconds
*/
	</script>
</head>
<body>
	<?php 
		include "owner_layout.php";
	?>
	<br><br><br>
	<div class="container">
		<div class='web' style="margin-bottom:30px;">
			<input type="text" class="cari_keyword form-control" id="cari_keyword_id" name="cari_keyword" placeholder="Cari Produk" />
	        <div id="result"></div>
	    </div>
	</div>
	
	<div class="loading-div"><img src="../../public/images/ajax-loader.gif" ></div>
	<div id="results"></div>
	
	
	
    <script type="text/javascript">
	$(function(){
		$(".cari_keyword").keyup(function() 
		{ 
		    var cari_keyword_value = $(this).val();
		    var dataString = 'cari_keyword='+ cari_keyword_value;
		    if(cari_keyword_value!='')
		    {
		        $.ajax({
		            type: "POST",
		            url: "cari_produk.php",
		            data: dataString,
		            cache: false,
		            success: function(html)
		                {
		                    $("#result").html(html).show();
		                }
		        });
		    }
		    return false;    
		});
		
		$("#result").live("click",function(e){
			var $clicked = $(e.target);
		    var $name = $clicked.find('.nama_produk').html(); 
		    var decoded = $("<div/>").html($name).text();
		    $('#cari_keyword_id').val(decoded);
		});
		
		$(document).live("click", function(e) { 
		    var $clicked = $(e.target);
		    if (! $clicked.hasClass("cari_keyword")){
		        $("#result").fadeOut(); 
		    }
		});
		 
		$('#cari_keyword_id').click(function(){
		    $("#result").fadeIn();
		});
	});
	</script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.8.0.min.js"></script>

	<script type="text/javascript" src="public/javascripts/bootstrap.js"></script>
	<script type="text/javascript" src="public/javascripts/bootstrap.min.js"></script>
</body>
</html>
<?php
    include "../../inc/session.php";
    include "../../inc/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/owner_layout.css">
   
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    /*<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->*/
    <script type="text/javascript">
    //$.noConflict();
	$(document).ready(function() {
	//$.ajaxSetup({ cache: false });
	  $('a.lnk').click(function() {
	  	var url = $(this).attr('href');
	    $('#content').html('<h4>Loading...</h4>').load(url);
	    return false;
	  });
	});
	</script>
    
</head>
<body>
<nav class="navbar navbar-findcond navbar-fixed-top">
    <div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="owner_index.php">Branda</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> Bildirimler <span class="badge">0</span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><i class="fa fa-fw fa-tag"></i> <span class="badge">Music</span> sayfası <span class="badge">Video</span> sayfasında etiketlendi</a></li>
						<li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Music</span> sayfasında iletiniz beğenildi</a></li>
						<li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Video</span> sayfasında iletiniz beğenildi</a></li>
						<li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Game</span> sayfasında iletiniz beğenildi</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="form_input_stock.php" class="lnk">Input Stock</a></li>
						<li><a href="form_warna.php" class="lnk">warna</a></li>
						<li class="divider"></li>
						<li><a href="#">Ayarlar</a></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</li>
				<li class="active"><a href="#"><?php echo $_SESSION['username']; ?> <span class="sr-only">(current)</span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Geri bildirim</a></li>
						<li><a href="#">Yardım</a></li>
						<li class="divider"></li>
						<li><a href="#">Ayarlar</a></li>
						<li><a href="../Default/logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div id="content"></id>
	
	<script type="text/javascript" src="../../public/javascripts/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../public/javascripts/bootstrap.min.js"></script>
   
</body>
</html>
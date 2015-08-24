<?php
    include "../../inc/session.php";
    include "../../inc/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Owner Page</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../public/stylesheets/owner_layout.css">
           
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
			<a class="navbar-brand" href="owner_index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="form_input_stock.php">Input Stock</a></li>
						<li><a href="form_warna.php">Input Warna</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
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

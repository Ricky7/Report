<?php
	include "owner_layout.php";
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link type="text/css" rel="stylesheet" href="../../public/stylesheets/responsive-tabs.css" />
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
<div class="container" style="margin-top:70px;">
	<div class="row">
		<div class="col-xs-12" style="margin-bottom:30px;" align="center"><font size="5px">Produk Terlaris</font></div>
	</div>
	<div class="row">
		<div id="tabs">
		  <ul>
		    <li><a href="#tabs-1">Keseluruhan</a></li>
		    <li><a href="#tabs-2">9 Bulan Terakhir</a></li>
		    <li><a href="#tabs-3">3 Bulan Terakhir</a></li>
		    <li><a href="#tabs-4">1 Bulan Terakhir</a></li>
		  </ul>
			  <div id="tabs-1">
			    <table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Total Penjualan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include "../../inc/mysqli_conn.php";
							$sql = "SELECT item_name, kode, COUNT(item_code) AS Total FROM tb_sell INNER JOIN tb_info_item ON tb_sell.item_id=tb_info_item.item_id AND tb_sell.status='sold' GROUP BY tb_sell.item_id ORDER BY COUNT(item_code) DESC LIMIT 30";
							//$sql = "SELECT item_name, kode, COUNT(item_code) AS Total FROM tb_sell INNER JOIN tb_info_item ON tb_sell.item_id=tb_info_item.item_id AND tb_sell.status='sold' WHERE tb_sell.sold_date < DATE_ADD(NOW(), INTERVAL -4 DAY) GROUP BY tb_sell.item_id ORDER BY COUNT(item_code) DESC";
							$result = $mysqli->query($sql);
							//$result = array();
							$numRows = $result->num_rows;
							if ($numRows > 0) {
							    // output data of each row
							    $no = 1;
							    while($row = $result->fetch_assoc()) {
							        ?>
							        	<tr>
							        		<td><?php echo $no; ?></td>
							        		<td><?php echo strtoupper($row['kode']); ?></td>
							        		<td><?php echo $row['item_name']; ?></td>
							        		<td><?php echo $row['Total']; ?></td>
							        	</tr>
							        <?php
							    $no++;
							    }
							} else {
							    echo "0 results";
							}
							//$mysqli->close();
						?>
					</tbody>
				</table>
			  </div>
			  <div id="tabs-2">
			  	<table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Total Penjualan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							
							//$sql = "SELECT item_name, kode, COUNT(item_code) AS Total FROM tb_sell INNER JOIN tb_info_item ON tb_sell.item_id=tb_info_item.item_id AND tb_sell.status='sold' GROUP BY tb_sell.item_id ORDER BY COUNT(item_code) DESC";
							$sql2 = "SELECT item_name, kode, COUNT(item_code) AS Total FROM tb_sell INNER JOIN tb_info_item ON tb_sell.item_id=tb_info_item.item_id AND tb_sell.status='sold' WHERE tb_sell.sold_date < DATE_ADD(NOW(), INTERVAL -9 MONTH) GROUP BY tb_sell.item_id ORDER BY COUNT(item_code) DESC LIMIT 30";
							$result2 = $mysqli->query($sql2);
							//$result = array();
							$numRows2 = $result2->num_rows;
							if ($numRows2 > 0) {
							    // output data of each row
							    $no = 1;
							    while($row2 = $result2->fetch_assoc()) {
							        ?>
							        	<tr>
							        		<td><?php echo $no; ?></td>
							        		<td><?php echo strtoupper($row2['kode']); ?></td>
							        		<td><?php echo $row2['item_name']; ?></td>
							        		<td><?php echo $row2['Total']; ?></td>
							        	</tr>
							        <?php
							    $no++;
							    }
							} else {
							    echo "0 results";
							}
							//$mysqli->close();
						?>
					</tbody>
				</table>
			  </div>
			  <div id="tabs-3">
			  	<table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Total Penjualan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							
							//$sql = "SELECT item_name, kode, COUNT(item_code) AS Total FROM tb_sell INNER JOIN tb_info_item ON tb_sell.item_id=tb_info_item.item_id AND tb_sell.status='sold' GROUP BY tb_sell.item_id ORDER BY COUNT(item_code) DESC";
							$sql3 = "SELECT item_name, kode, COUNT(item_code) AS Total FROM tb_sell INNER JOIN tb_info_item ON tb_sell.item_id=tb_info_item.item_id AND tb_sell.status='sold' WHERE tb_sell.sold_date < DATE_ADD(NOW(), INTERVAL -3 MONTH) GROUP BY tb_sell.item_id ORDER BY COUNT(item_code) DESC LIMIT 30";
							$result3 = $mysqli->query($sql3);
							//$result = array();
							$numRows3 = $result3->num_rows;
							if ($numRows3 > 0) {
							    // output data of each row
							    $no = 1;
							    while($row3 = $result3->fetch_assoc()) {
							        ?>
							        	<tr>
							        		<td><?php echo $no; ?></td>
							        		<td><?php echo strtoupper($row3['kode']); ?></td>
							        		<td><?php echo $row3['item_name']; ?></td>
							        		<td><?php echo $row3['Total']; ?></td>
							        	</tr>
							        <?php
							    $no++;
							    }
							} else {
							    echo "0 results";
							}
							//$mysqli->close();
						?>
					</tbody>
				</table>
			  </div>
			  <div id="tabs-4">
			  	<table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th>Rank</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Total Penjualan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							
							//$sql = "SELECT item_name, kode, COUNT(item_code) AS Total FROM tb_sell INNER JOIN tb_info_item ON tb_sell.item_id=tb_info_item.item_id AND tb_sell.status='sold' GROUP BY tb_sell.item_id ORDER BY COUNT(item_code) DESC";
							$sql4 = "SELECT item_name, kode, COUNT(item_code) AS Total FROM tb_sell INNER JOIN tb_info_item ON tb_sell.item_id=tb_info_item.item_id AND tb_sell.status='sold' WHERE tb_sell.sold_date < DATE_ADD(NOW(), INTERVAL -1 MONTH) GROUP BY tb_sell.item_id ORDER BY COUNT(item_code) DESC LIMIT 30";
							$result4 = $mysqli->query($sql4);
							//$result = array();
							$numRows4 = $result4->num_rows;
							if ($numRows4 > 0) {
							    // output data of each row
							    $no = 1;
							    while($row4 = $result4->fetch_assoc()) {
							        ?>
							        	<tr>
							        		<td><?php echo $no; ?></td>
							        		<td><?php echo strtoupper($row4['kode']); ?></td>
							        		<td><?php echo $row4['item_name']; ?></td>
							        		<td><?php echo $row4['Total']; ?></td>
							        	</tr>
							        <?php
							    $no++;
							    }
							} else {
							    echo "0 results";
							}
							$mysqli->close();
						?>
					</tbody>
				</table>
			  </div>
		</div>
	</div>
</div>

<script src="../../public/javascripts/jquery.responsiveTabs.js"></script>
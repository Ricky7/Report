<table class="table table-hover table-responsive" align="center">
	<thead>
		<tr>
			<th>No</th>
			<th>Warna</th>
		</tr>
	</thead>
	<tbody>
		<?php
			include "../../inc/koneksi.php";
			$query = mysql_query("select * from warna");

			$no = 1;
			if($query === FALSE) { 
			    die(mysql_error()); 
			}
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['warna'] ?></td>
		</tr>
		<?php
			$no++;
		}
		?>
	</tbody>
</table>

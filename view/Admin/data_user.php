<?php
	
	include "admin_layout.php";
?>

<div class="row">
	<div class="col-md-3"></div>
    <div class="col-md-8">
     	<h2 align="center">Data User</h2>
     	<a href="add_user.php">+ Add</a>
     	<table class="table table-responsive table-bordered pull-center">
     		<thead>
     			<tr>
     				<th>No</th>
     				<th>Name</th>
     				<th>Username</th>
     				<th>Password</th>
     				<th>Role</th>
     				<th>Option</th>
     			</tr>
     		</thead>
     		<tbody>
     			<?php
					$query = mysql_query("select * from users");

					$no = 1;
					while ($data = mysql_fetch_array($query)) {
				?>
				
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['name'] ?></td>
					<td><?php echo $data['username'] ?></td>
					<td><?php echo $data['password'] ?></td>
					<td>
					<?php 

						if ($data['role'] == 'adm'){
							echo "Admin"; }
					
						else if ($data['role'] == 'own'){
							echo "Owner";}
					
						else if ($data['role'] == 'mbr'){
							echo "Member";}
					?>

					</td>
					<td><a href="delete_datauser.php?id=<?php echo $data['id'] ?>">Del</a></td>

				</tr>

				<?php
					$no++;
				}
				?>
     		</tbody>
     	</table>
        
    </div>
</div>     
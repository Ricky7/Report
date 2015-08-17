<?php 
	include "admin_layout.php";
 ?>
<div class="row">
	<div class="col-md-3"></div>
    <div class="col-md-9">
     	<h2 align="center">ADD USER</h2>
     	<table class="table table-responsive">
     		<tbody>
	        <form method="post" action="insert_datauser.php">
	        	<tr>
	        		<td>Username</td>
	        		<td>:</td>
	        		<td><input type="text" name="username" required="required"/><td>
	        	</tr>
	        	<tr>
	        		<td>Password</td>
	        		<td>:</td>
	        		<td><input type="password" name="password" required="required"/><td>
	        	</tr>
	        	<tr>
	        		<td>Name</td>
	        		<td>:</td>
	        		<td><input type="text" name="name" required="required"/><td>
	        	</tr>
	        	<tr>
	        		<td>Role</td>
	        		<td>:</td>
	        		<td>
	        			<select name="role">
	        			<?php
	        				$query = mysql_query("select * from roles");
	        				$no = 1;
							while ($data = mysql_fetch_array($query)) {
						?>
							<option value="<?php echo $data['role_id'] ?>"><?php echo $data['role_name'] ?></option>
	        			
	        			<?php 
	        				$no++;
	        			}
	        			?>
	        			</select>
	        		<td>
	        	</tr>
	        	<tr>
	        		<td></td>
	        		<td></td>
	        		<td><button type="submit" class="btn btn-default btn-primary">Submit</button></td>
	        	</tr>
	        </form>
	        <tbody>
    	</table>
    </div>
</div>    
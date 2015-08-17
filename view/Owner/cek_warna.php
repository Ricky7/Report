<?php
// This is a code to check the username from a mysql database table

if(isSet($_POST['item_color']))
{
	$item_color = $_POST['item_color'];

	include("../../inc/koneksi.php");

	$sql_check = mysql_query("SELECT warna FROM {$prefix}warna WHERE warna='$item_color'");

	if(mysql_num_rows($sql_check))
	{
		echo '<span style="color: red;">The warna <b>'.$item_color.'</b> is already in use.</span>';
	}
	else
	{
		echo 'OK';
	}
}
?>
<?php
// This is a code to check the username from a mysql database table

if(isSet($_POST['kode']))
{
	$kode = $_POST['kode'];

	include("../../inc/koneksi.php");

	$sql_check = mysql_query("SELECT kode FROM {$prefix}tb_info_item WHERE kode='$kode'");
	if($sql_check === FALSE) { 
	    die(mysql_error()); 
	}

	if(mysql_num_rows($sql_check))
	{
		echo '<span style="color: red;">The kode <b>'.$kode.'</b> is already in use.</span>';
	}
	else
	{
		echo 'OK';
	}
}
?>
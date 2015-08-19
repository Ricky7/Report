<?php
	include "../../inc/koneksi.php";
	//include "owner_layout.php"
	$id = $_POST['id'];
	$id = mysql_escape_String($id);

	$query = mysql_query("delete tb_purchase, tb_sell from tb_purchase inner join tb_sell where tb_purchase.item_code=tb_sell.item_code and tb_purchase.item_code='$id'") or die(mysql_error());

?>

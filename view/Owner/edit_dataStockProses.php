<?php
	include "../../inc/koneksi.php";
	$item_id = $_POST['item_id'];
	$query = mysql_query("update tb_purchase set item_size='{$_POST['item_size']}', item_color='{$_POST['item_color']}', purchase_price='{$_POST['purchase_price']}', selling_price='{$_POST['selling_price']}', information='{$_POST['information']}' where item_code='{$_POST['item_code']}'") or die(mysql_error());

	if ($query) {
	    header("location:info_barang.php?id=$item_id");
	}
?>
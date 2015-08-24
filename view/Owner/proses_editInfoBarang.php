<?php
	include "../../inc/mysqli_conn.php";

	$item_id = filter_var($_POST['item_id'], FILTER_VALIDATE_INT);
	$item_name = filter_var($_POST['item_name'], FILTER_SANITIZE_STRING);
    $item_type = filter_var($_POST['item_type'], FILTER_SANITIZE_STRING);
    
    $stmt = $mysqli->prepare("UPDATE tb_info_item SET item_name = ?, item_type = ? WHERE item_id = ?");
    $stmt->bind_param('ssi', $item_name, $item_type, $item_id);
    $stmt->execute();
    //$stmt->close();
    if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	else{
		header("location:info_barang.php?id=$item_id");
	}
?>
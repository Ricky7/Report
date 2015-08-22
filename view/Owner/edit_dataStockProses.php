<?php
	include "../../inc/mysqli_conn.php";
	$item_id = filter_var($_POST['item_id'], FILTER_VALIDATE_INT);
	$item_code = filter_var($_POST['item_code'], FILTER_VALIDATE_INT);
	$item_size = filter_var($_POST['item_size'], FILTER_SANITIZE_STRING);
    $item_color = filter_var($_POST['item_color'], FILTER_SANITIZE_STRING);
    $string1 =  filter_var($_POST['purchase_price'], FILTER_SANITIZE_STRING);
    $string2 =  filter_var($_POST['selling_price'], FILTER_SANITIZE_STRING);
    $information = filter_var($_POST['information'], FILTER_SANITIZE_STRING);
    $jml2 = strlen($string2);

    for ($i=0; $i<$jml2; $i++)  
    {  
        
        $purchase_price = $string1;
        $selling_price = $string2;  
        $purchase_price = str_replace(",", "", $purchase_price);  
        $selling_price = str_replace(",", "", $selling_price);  
    }   

    $stmt = $mysqli->prepare("UPDATE tb_purchase SET item_size = ?, item_color = ?, purchase_price = ?, selling_price = ?, information = ? WHERE item_code = ?");
    $stmt->bind_param('ssiisi', $item_size, $item_color, $purchase_price, $selling_price, $information, $item_code);
    $stmt->execute();
    //$stmt->close();

	if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	else{
		header("location:info_barang.php?id=$item_id");
	}
?>
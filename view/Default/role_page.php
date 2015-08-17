<?php
session_start();
$role = $_SESSION['role'];

if ($role=="adm") {
	header("location:/Kasir/View/Admin/admin_index.php");
}
else if ($role=="own") {
	header("location:/Kasir/View/Owner/owner_index.php");
}
else if ($role=="mbr") {
	header("location:/Kasir/View/Member/member_index.php");
}

?>
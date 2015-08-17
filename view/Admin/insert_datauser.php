<?php
//panggil file config.php untuk menghubung ke server
include "../../inc/koneksi.php";

//tangkap data dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$role = $_POST['role'];


//simpan data ke database
$query = mysql_query("insert into users values('', '$username', '$password', '$role', '$name')") or die(mysql_error());

if ($query) {
    header('location:data_user.php');
}
?>
 <?php
include "../../inc/koneksi.php";

$id = $_GET['id'];

$query = mysql_query("delete from users where id='$id'") or die(mysql_error());

if ($query) {
    header('location:data_user.php');
}
?>
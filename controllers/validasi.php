<?php
	error_reporting(0);
	include "../inc/koneksi.php";
	function anti_injection($data){
	  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	  return $filter;
	}
	$username	= anti_injection($_POST[username]);
	$pass		= anti_injection (md5($_POST[password]));
	if (!ctype_alnum($username) OR !ctype_alnum($pass)){
		?>
			<script>
				alert('Maaf, Karakter selain angka dan huruf tidak diperbolehkan :)');
				window.location.href='index.html';
			</script>
		<?php
	}else{
		$login	=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass'");
		$ketemu	=mysql_num_rows($login);
		if ($ketemu > 0){
			session_start();
		  	$dt = mysql_fetch_array($login);
			$_SESSION[username]     = $dt[username];
			$_SESSION[password]     = $dt[password];
			$_SESSION[nama]  		= $dt[name];
			$_SESSION[role]  		= $dt[role];
			
			header('location:/Kasir/View/Default/role_page.php');
		}else{
			?>
			    <script>
					alert('Maaf, Username atau password salah.');
					window.location.href='../index.html';
				</script>
		    <?php
		}
	}
?>

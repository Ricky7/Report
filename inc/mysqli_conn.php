<?php
	define('DB_SERVER', "localhost");
    define('DB_USER', "root");
    define('DB_PASSWORD', "");
    define('DB_DATABASE', "db_report");

    $mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

    if (!$mysqli) {
        trigger_error('mysqli Connection failed! ' . htmlspecialchars(mysqli_connect_error()), E_USER_ERROR);
    }
?>
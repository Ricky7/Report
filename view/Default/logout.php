<?php
  session_start();
  session_destroy();
  header('location:/Kasir/index.html');
?>
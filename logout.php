<?php
session_start();
session_destroy();
echo "<script> document.location='index.php';alert('anda berhasil keluar');</script>";
?>
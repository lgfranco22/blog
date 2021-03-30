<?php
session_start();
unset($_SESSION['id_usuario']);
unset($_SESSION['id_master']);
header("Location: index.php");
?>
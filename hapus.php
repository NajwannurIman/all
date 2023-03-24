<?php
require "functions.php";

$id = $_GET['id'];
hapus($id);
header('Location:order.php');
?>
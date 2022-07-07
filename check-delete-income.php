<?
require "connect.php";
$id = $_GET['id'];
$result = $mysql->query("DELETE FROM income WHERE id = '$id'");
header('Location: ../data.php?number=1');
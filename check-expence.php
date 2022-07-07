<?
	require "connect.php";
	$name = filter_var(trim($_POST['expence-name']));
	$quantity = filter_var(trim($_POST['expence-quantity']));
	$price = filter_var(trim($_POST['expence-price']));
	$date = filter_var(trim($_POST['expence-date']));
	$add = $mysql->query("INSERT INTO expence (name, quantity, price, date) VALUES ('$name', '$quantity', '$price', '$date')");
	header('Location:../index.php');

	



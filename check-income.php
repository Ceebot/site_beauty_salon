<?
	require "connect.php";
	$name = filter_var(trim($_POST['income-name']));
	$quantity = filter_var(trim($_POST['income-quantity']));
	$price = filter_var(trim($_POST['income-price']));
	$date = filter_var(trim($_POST['income-date']));
	$add = $mysql->query("INSERT INTO income (name, quantity, price, date) VALUES ('$name', '$quantity', '$price', '$date')");
	header('Location:../index.php');

	



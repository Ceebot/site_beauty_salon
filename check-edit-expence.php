<?
require "connect.php";
$id = $_GET['id'];
$name = filter_var(trim($_POST['name']));
$quantity = filter_var(trim($_POST['quantity']));
$price = filter_var(trim($_POST['price']));
$date = filter_var(trim($_POST['date']));

$edit = $mysql->query("UPDATE expence SET name = '$name', quantity = '$quantity', price = '$price', date = '$date' WHERE id = '$id'");
?>
<script>
  location.href = '../data.php?number=1';
</script>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
  <title>Салон красоты</title>
</head>

<body>
  <?
  require "connect.php";
  $id = $_GET['id'];
  $result = $mysql->query("SELECT * FROM expence WHERE id = '$id'");
  $res = mysqli_fetch_assoc($result);
  ?>
  <div class="confirm">
    <h2>Редактировать строку</h2>
    <form action="../php/check-edit-expence.php?id=<? echo $res['id'];?>" method="post">
      <div class="div-item">
        <label class="label-edit" for="income-name">Название: </label>
        <input type="text" id="income-name" class="div-item-input" name="name" value="<? echo $res['name']?>">
      </div>
      <div class="div-item">
        <label class="label-edit" for="income-quantity">Количество: </label>
        <input type="text" id="income-quantity" class="div-item-input" name="quantity" value="<? echo $res['quantity']?>">
      </div>
      <div class="div-item">
        <label class="label-edit" for="income-price">Цена: </label>
        <input type="text" id="income-price" class="div-item-input" name="price" value="<? echo $res['price']?>">
      </div>
      <div class="div-item">
        <label class="label-edit" for="income-date">Дата: </label>
        <input id="income-date" class="div-item-input" name="date" type="date" value="<? echo $res['date']?>">
      </div>
      <button type="submit" class="btn-period">Редактировать</button>
    </form>
    <div class="div-btn-confirm">
      <button class="btn-period" onclick="window.location.href='../data.php?number=1'">Отменить</button>
    </div>
    <?
    ?>
  </div>

  <img class="img-background" src="../img/wave.png" alt="Задний фон">
</body>

</html>
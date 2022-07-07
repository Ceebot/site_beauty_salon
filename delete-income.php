<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
  <title>Салон красоты</title>
</head>

<body>
  <? $id = $_GET['id']; ?>
  <div class="confirm">
    <img src="../img/warning.png" alt="Предупреждающий знак" class="img-warning">
    <h2>Подтвердить удаление?</h2>
    <div class="div-btn-confirm">
      <button class="btn-period" onclick="window.location.href='../data.php?number=1'">Отменить</button>
      <button class="btn-period" onclick="window.location.href='../php/check-delete-income.php?id=<? echo $id?>'">Удалить</button>
    </div>
    <?
    ?>
  </div>
  <img class="img-background" src="../img/wave.png" alt="Задний фон">
</body>

</html>
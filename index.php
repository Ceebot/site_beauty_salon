<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Салон красоты</title>
</head>

<body>
  <header class="header">
    <div class="container">
      <ul class="header-ul">
        <li class="header-li"><a class="header-a blue" href="index.php">Учет прибыли</a></li>
        <li class="header-li"><a class="header-a" href="data.php?number=1">Данные</a></li>
      </ul>
    </div>
  </header>

  <main class="container">
    <div class="main">
      <div class="income">
        <h2 class="item-h2">Доход</h2>
        <form action="php/check-income.php" method="post">
          <div class="div-item">
            <label class="label-edit" for="income-name">Название: </label>
            <input type="text" id="income-name" class="div-item-input" name="income-name" autocomplete="off">
          </div>
          <div class="div-item">
            <label class="label-edit" for="income-quantity">Количество: </label>
            <input type="text" id="income-quantity" class="div-item-input" name="income-quantity" autocomplete="off">
          </div>
          <div class="div-item">
            <label class="label-edit" for="income-price">Цена: </label>
            <input type="text" id="income-price" class="div-item-input" name="income-price" autocomplete="off">
          </div>  
          <div class="div-item">
            <label class="label-edit" for="income-date">Дата: </label>
            <input id="income-date" class="div-item-input" name="income-date" type="date">
          </div>
        <button type="submit" class="item-btn">Сохранить</button>
        </form>
      </div>
      <div class="expence">
        <h2 class="item-h2">Расход</h2>
        <form action="php/check-expence.php" method="post">
        <div class="div-item">
          <label class="label-edit" for="expence-name">Название: </label>
          <input type="text" id="expence-name" class="div-item-input" name="expence-name" autocomplete="off">
        </div>  
        <div class="div-item">
          <label class="label-edit" for="expence-quantity">Количество: </label>
          <input type="text" id="expence-quantity" class="div-item-input" name="expence-quantity" autocomplete="off">
        </div>  
        <div class="div-item">
          <label class="label-edit" for="expence-price">Цена: </label>
          <input type="text" id="expence-price" class="div-item-input" name="expence-price" autocomplete="off">
        </div>  
        <div class="div-item">
          <label class="label-edit" for="expence-date">Дата: </label>
          <input id="expence-date" type="date" class="div-item-input" name="expence-date">
        </div>    
          <button type="submit" class="item-btn">Сохранить</button>
        </form>
      </div>
    </div>
  </main>
</body>
</html>
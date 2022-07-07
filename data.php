<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
  <title>Салон красоты</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>

<body>
  <header class="header">
    <div class="container">
      <ul class="header-ul">
        <li class="header-li"><a class="header-a" href="index.php">Учет прибыли</a></li>
        <li class="header-li"><a class="header-a blue" href="data.php?number=1">Данные</a></li>
      </ul>
    </div>
  </header>

  <section class="section-select-period">
    <div class="container">
      <h2 class="item-h2">Выберите период подсчета доходов:</h2>
      <div class="div-select-period">
        <button class="btn-period" id="btn-all" onclick="window.location.href='data.php?number=1'">Все время</button>
        <button class="btn-period" id="btn-month" onclick="window.location.href='data.php?number=2'">Последний месяц</button>
        <button class="btn-period" id="btn-day" onclick="window.location.href='data.php?number=3'">Последний день</button>
        <form action="data.php?number=4" method="post">
          <label for="select-preiod" class="label-select-period">Выбрать период c: </label>
          <input id="select-preiod" type="date" class="div-item-input" name="begin-date">
          <label for="select-preiod" class="label-select-period"> по: </label>
          <input id="select-preiod" type="date" class="div-item-input" name="end-date">
          <button id="btn-period" class="btn-period">Выбрать</button>
        </form>
      </div>
    </div>
  </section>

  <?
  require "php/connect.php";
  $result_income = $mysql->query("SELECT * FROM income ORDER BY date DESC");
  $result_expence = $mysql->query("SELECT * FROM expence ORDER BY date DESC");
  $number = $_GET['number'];

  if ($number == 1) {
    $words_result = "за все время";
    $result_income_s = $mysql->query("SELECT * FROM income");
    $result_expence_s = $mysql->query("SELECT * FROM expence");
    $result_income = $mysql->query("SELECT * FROM income ORDER BY date DESC");
    $result_expence = $mysql->query("SELECT * FROM expence ORDER BY date DESC");
  ?>
    <script>
      let all = document.getElementById("btn-all").classList.toggle("white")
    </script>
  <?
  }
  if ($number == 2) {
    $words_result = "за последний месяц";
    $result_income_s = $mysql->query("SELECT * FROM income WHERE date> NOW() - INTERVAL 1 MONTH");
    $result_expence_s = $mysql->query("SELECT * FROM expence WHERE date> NOW() - INTERVAL 1 MONTH");
    $result_income = $mysql->query("SELECT * FROM income WHERE date> NOW() - INTERVAL 1 MONTH ORDER BY date DESC");
    $result_expence = $mysql->query("SELECT * FROM expence WHERE date> NOW() - INTERVAL 1 MONTH ORDER BY date DESC");
  ?>
    <script>
      let month = document.getElementById("btn-month").classList.toggle("white")
    </script>
  <?
  }
  if ($number == 3) {
   
    $words_result = "за последний день";
    $result_income_s = $mysql->query("SELECT * FROM income WHERE date> NOW() - INTERVAL 1 DAY");
    $result_expence_s = $mysql->query("SELECT * FROM expence WHERE date> NOW() - INTERVAL 1 DAY");
    $result_income = $mysql->query("SELECT * FROM income WHERE date> NOW() - INTERVAL 1 DAY ORDER BY date DESC");
    $result_expence = $mysql->query("SELECT * FROM expence WHERE date> NOW() - INTERVAL 1 DAY ORDER BY date DESC");
  ?>
    <script>
      let day = document.getElementById("btn-day").classList.toggle("white")
    </script>
  <?
  }
  if ($number == 4) {
    $begin_date = filter_var(trim($_POST['begin-date']));
    $end_date = filter_var(trim($_POST['end-date']));
    $words_result = "в период с '$begin_date' по '$end_date'";
    $result_income_s = $mysql->query("SELECT * FROM income WHERE date BETWEEN '$begin_date' AND '$end_date'");
    $result_expence_s = $mysql->query("SELECT * FROM expence WHERE date BETWEEN '$begin_date' AND '$end_date'");
    $result_income = $mysql->query("SELECT * FROM income WHERE date BETWEEN '$begin_date' AND '$end_date' ORDER BY date DESC");
    $result_expence = $mysql->query("SELECT * FROM expence WHERE date BETWEEN '$begin_date' AND '$end_date' ORDER BY date DESC");
  ?>
    <script>
      let period = document.getElementById("btn-period").classList.toggle("white")
    </script>
  <?
  }
  ?>

  <main class="main-data">
    <div class="container">
      <ul class="data-ul">
        <li class="data-li">
          <div class="div-table-income">
            <table id="table-income-all" cellpadding="5" cellspacing="5" class="table-income">
              <thead>
                <caption>
                  <h2>Таблица доходов</h2>
                </caption>
                <tr>
                  <th colspan="1">
                    <strong class="th-name">Название</strong>
                  </th>
                  <th colspan="1">
                    <strong>Количество</strong>
                  </th>
                  <th colspan="1">
                    <strong>Цена</strong>
                  </th>
                  <th colspan="1">
                    <strong>Дата</strong>
                  </th>
                </tr>
              </thead>
              <tbody>
                <? while ($product = mysqli_fetch_assoc($result_income)) { ?>
                  <tr>
                    <td>
                      <button class="btn-tools" onclick="DeleteIncome(<?= $product['id']; ?>)"><img class="img-tools-garbage" src="img/delete.png" alt="Удаление строки"></button>
                      <button class="btn-tools" onclick="EditIncome(<?= $product['id']; ?>)"><img class="img-tools-notepad" src="img/edit.png" alt="Изменение строки"></button>
                      <? echo $product['name']; ?>
                    </td>
                    <td>
                      <? echo $product['quantity']; ?>
                    <td>
                      <? echo $product['price']; ?> &#8381
                    </td>
                    <td>
                      <? echo $product['date']; ?>
                  </tr>
                <? }

                $res_summ = 0;

                while ($result_income_summ = mysqli_fetch_assoc($result_income_s)) {
                  $res_summ_inc += $result_income_summ['price'] * $result_income_summ['quantity'];
                }
                ?>
                <tr>
                  <td class="blue">Сумма доходов: <? echo $res_summ_inc; ?> &#8381</td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
        <li class="data-li">
          <div class="div-table-expence">
            <table cellpadding="5" cellspacing="5" class="table-expence">
              <thead>
                <caption>
                  <h2>Таблица расходов</h2>
                </caption>
                <tr>
                  <th colspan="1">
                    <strong class="th-name">Название</strong>
                  </th>
                  <th colspan="1">
                    <strong>Количество</strong>
                  </th>
                  <th colspan="1">
                    <strong>Цена</strong>
                  </th>
                  <th colspan="1">
                    <strong>Дата</strong>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <? while ($product = mysqli_fetch_assoc($result_expence)) { ?>
                    <td>
                    <button class="btn-tools" onclick="DeleteExpence(<?= $product['id']; ?>)"><img class="img-tools-garbage" src="img/delete.png" alt="Удаление строки"></button>
                      <button class="btn-tools" onclick="EditExpence(<?= $product['id']; ?>)"><img class="img-tools-notepad" src="img/edit.png" alt="Изменение строки"></button>
                      <? echo $product['name']; ?>
                    </td>
                    <td>
                      <? echo $product['quantity']; ?>
                    <td>
                      <? echo $product['price']; ?> &#8381
                    </td>
                    <td>
                      <? echo $product['date']; ?>
                </tr>
              <? }
                  $res_summ = 0;
                  while ($result_expence_summ = mysqli_fetch_assoc($result_expence_s)) {
                    $res_summ_ex += $result_expence_summ['price'] * $result_expence_summ['quantity'];
                  }
              ?>
              <tr>
                <td class="blue">Сумма расходов: <? echo $res_summ_ex; ?> &#8381</td>
              </tr>
              </tbody>

            </table>
          </div>
        </li>
    </div>
    </ul>
  </main>
  <section class="conclusion">
    <div class="consulation-div">
      <h2 class="item-h2">Статистика</h2>
      <span class="span-result">Результат
        <? echo $words_result, " - ";
        $all_summ = $res_summ_inc - $res_summ_ex;
        if ($all_summ >= 0) {
        ?> Доход <? echo $all_summ;
                } else {
                  $all_summ = $all_summ * -1; ?> Убыток <? echo $all_summ;
                                                        } ?>
        &#8381</span>
    </div>
    
  </section>

  <script>
    function DeleteIncome(id) {
      jQuery.ajax({
        type: "GET",
        url: "php/delete-income.php",
        data: 'id=' + id,
        cache: false,
        success: function(response) {
          document.write(response);
        }
      });
    }
    function EditIncome(id) {
      jQuery.ajax({
        type: "GET",
        url: "php/edit-income.php",
        data: 'id=' + id,
        cache: false,
        success: function(response) {
          document.write(response);
        }
      });
    }
    function DeleteExpence(id) {
      jQuery.ajax({
        type: "GET",
        url: "php/delete-expence.php",
        data: 'id=' + id,
        cache: false,
        success: function(response) {
          document.write(response);
        }
      });
    }
    function EditExpence(id) {
      jQuery.ajax({
        type: "GET",
        url: "php/edit-expence.php",
        data: 'id=' + id,
        cache: false,
        success: function(response) {
          document.write(response);
        }
      });
    }
  </script>

</body>
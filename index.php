<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/animation.css">

    <title>Лабораторная работа №1</title>
</head>
<body>
<header>
    <img src="img/itmo-logo.png" alt="ИТМО" style="width: 200px; height: 75px;">
    <h1>Шевчук Дмитрий</h1>
    <h2>P3231</h2>
    <h2>Вариант 3118</h2>
</header>
<div class="main-app-div">
    <div class="main-app-div__element">
        <canvas class="graph" width="400" height="400"></canvas>
    </div>
    <div class="main-app-div__element">
        <form action="php/main.php" method="post" id="form" class="main-form">
            <div class="x-button-press">

                <p class="variable-name">Значение X:
                    <span id="x-value" class="x-value-not-chosen">
                        Выберите X
                    </span>
                </p>
                <input type="hidden" name="x" id="x-hidden-value">

                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="-5">
                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="-4">
                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="-3">
                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="-2">
                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="-1">
                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="0">
                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="1">
                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="2">
                <input type="button" class="x-button" onclick="setXvalueToHiddenInput(this.value)" value="3">

            </div>
            <div class="y-text-input">
                <p class="variable-name">Значение Y:</p>
                <label>
                    <input type="text" name="y" id="y-value" placeholder="(-5 ... 5)">
                </label>
            </div>
            <div class="r-checkbox-pick">
                <p class="variable-name">Значение R:</p>
                <div class="checkbox-picker">
                    <input type="checkbox" name="r" id="checkbox1" value="1"
                           onclick="setCheckedOnlyOneCheckbox(this.id)">
                    <span>1</span>
                </div>
                <div class="checkbox-picker">
                    <input type="checkbox" name="r" id="checkbox2" value="2"
                           onclick="setCheckedOnlyOneCheckbox(this.id)">
                    <span>2</span>
                </div>
                <div class="checkbox-picker">
                    <input type="checkbox" name="r" id="checkbox3" value="3"
                           onclick="setCheckedOnlyOneCheckbox(this.id)">
                    <span>3</span>
                </div>
                <div class="checkbox-picker">
                    <input type="checkbox" name="r" id="checkbox4" value="4"
                           onclick="setCheckedOnlyOneCheckbox(this.id)">
                    <span>4</span>
                </div>
                <div class="checkbox-picker">
                    <input type="checkbox" name="r" id="checkbox5" value="5"
                           onclick="setCheckedOnlyOneCheckbox(this.id)">
                    <span>5</span>
                </div>
            </div>
            <div class="main-form-action-buttons">
                <button id="check-button" type="submit" disabled>Проверить</button>
                <button type="reset" onclick="clearHiddenXField()">Очистить поля</button>
            </div>
        </form>

    </div>
</div>

<div class="table-div">
    <h2 style="text-align: center">Таблица результатов</h2>
    <table class="styled-table">
        <thead>
        <tr>
            <th>№</th>
            <th>X</th>
            <th>Y</th>
            <th>R</th>
            <th>Результат</th>
            <th>Текущее время</th>
            <th>Время выполнения</th>
        </tr>
        </thead>
        <tbody>
            <?php include 'php/table_creator.php'; ?>
        </tbody>
    </table>

    <form action="php/reset_session.php" class="clear-history-form">
        <button type="submit">Очистить историю</button>
    </form>

</div>
<script src="js/script.js"></script>
<script src="js/canvas.js"></script>
<script src="js/validation.js"></script>
</body>
</html>
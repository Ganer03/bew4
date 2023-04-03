<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Задание 3</title>
    <link rel="stylesheet" href="style.css">
     <style>
/* Сообщения об ошибках и поля с ошибками выводим с красным бордюром. */
.error {
  border: 2px solid red;
}
    </style>
</head>
<body>
<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>
<div class="formss">
<form action="index.php" method="POST">
    <label><input name="fio" value="Введите ФИО"/></label>
    <label><input name="email" value="Введите почту"/></label>
    <label><select name="year">
    <?php
    for ($i = 1922; $i <= 2022; $i++) {
        printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?></select></label>
    Пол:<br/>
    <label>
        <input type="radio" checked="checked" name="pol" value="M"/>
        M
    </label>
    <label class="pot">
        <input type="radio" name="pol" value="W"/>
        W
    </label>
    Кол-во конечностей:<br/>
    <label>
        <input type="radio" checked="checked" name="limbs" value="1"/>
        1
    </label>
    <label>
        <input type="radio" name="limbs" value="2"/>
        2
    </label>
    <label>
        <input type="radio" name="limbs" value="3"/>
        3
    </label>
    <label>
        <input type="radio" name="limbs" value="4"/>
        4
    </label>
    <label>
        <input type="radio" name="limbs" value="5"/>
        5
    </label><br/>
    <label>
        Сверхспособности:<br/>
        <select name="super[]" multiple="multiple">
            <option value='1'>бессмертие</option>
            <option value='2' selected="selected">прохождение сквозь стены</option>
            <option value='3' selected="selected">левитация</option>
        </select>
    </label><br/>
    <label>
        Биография:<br/>
        <textarea name="biography">Расскажите о себе</textarea>
    </label><br/>
    <label>
        <input type="checkbox" checked="checked" name="check-1"/>
        с контрактом ознакомлен (а)
    </label><br/>
    <input type="submit" value="Отправить"/>
</form>
</div>
</body>
</html>

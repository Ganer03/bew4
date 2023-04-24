<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Задание 4</title>
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
        <label>ФИО:<br/><input name="fio" <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>"/></label>
        <label>Почта:<br/><input name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>"/></label>
        <label>Год рождения:<br/>
            <?php
            if ($errors['year'])
                printf('<select name="year" class="error">');
            else{
                printf('<select name="year">');
            }
            ?>
            <?php
            if ($errors['year']){
                for ($i = 1922; $i <= 2022; $i++) {
                    printf('<option value="%d">%d год</option>', $i, $i);
                }
            }
            for ($i = 1922; $i < int($values['year']); $i++) {
                printf('<option value="%d">%d год</option>', $i, $i);
            }
            printf('<option value="%d" selected="selected">%d год</option>', $i, $i);
            for ($i = int($values['year'])+1; $i <=2022; $i++) {
                printf('<option value="%d">%d год</option>', $i, $i);
            }
            ?>
            </select>
        </label>
        Пол:<br/>
        <?php
        if($values['pol'] == 'W'){
            printf('<label class="pot"><input type="radio" name="pol" value="M">M</label>');
            printf('<label class="pot"><input type="radio" name="pol" value="W" checked="checked">W</label>');
          }
          else
              if($values['pol'] == 'M'){
            printf('<label class="pot"><input type="radio" name="pol" value="M" checked="checked">M</label>');
            printf('<label class="pot"><input type="radio" name="pol" value="W">W</label>');
        }
        else{
            printf('<label class="pot"><input type="radio" class="error" name="pol" value="M">M</label>');
            printf('<label class="pot"><input type="radio" class="error" name="pol" value="W">W</label>');
        }
        ?>
        Кол-во конечностей:<br/>
        <?php
        for ($i = 1; $i < int($values['radio']); $i++)
            printf('<label><input type="radio" name="limbs" value="%d"/>%d</label>', $i, $i);
        ?>
        <label><input type='radio' name='limbs' checked="checked" value='<?php print int($values['radio'])?>'><?php print int($values['radio'])?></label>
        <?php
        for ($i = int($values['radio'])+1; $i < 5; $i++)
            printf('<label><input type="radio" name="limbs" value="%d"/>%d</label>', $i, $i);
        ?>
        <label>
            Сверхспособности:<br/>
            <?php
            if($errors['limbs'])
                printf('<select name="super[]" multiple="multiple" class="error">
                <option value='1'>бессмертие</option>
                <option value='2' selected="selected">прохождение сквозь стены</option>
                <option value='3' selected="selected">левитация</option>
            </select>');
            foreach($errors['limbs'] as $limb)
            <select name="super[]" multiple="multiple">
                <option value='1'>бессмертие</option>
                <option value='2' selected="selected">прохождение сквозь стены</option>
                <option value='3' selected="selected">левитация</option>
            </select>
        </label><br/>
        <label>
            Биография:<br/>
            <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"';} ?> value="<?php print $values['biography']; ?>"></textarea>
        </label><br/>
        <label>
            <input type="checkbox" <?php if ($errors['biography']) {print 'class="error"';} else {print 'checked="checked"';}?> name="check-1"/>
            с контрактом ознакомлен (а)
        </label><br/>
        <input type="submit" value="Отправить"/>
    </form>
</div>
</body>
</html>

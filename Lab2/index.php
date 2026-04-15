<?php

$x = -5;
$encounting = 30;
$step = 0.5;
$type = 'D';

$all_f_values = [];
$sum_f = 0;
$count_f = 0;

if ($type == 'A') $layout_type = 'Простая верстка (текст)';
elseif ($type == 'B') $layout_type = 'Маркированный список';
elseif ($type == 'C') $layout_type = 'Нумерованный список';
elseif ($type == 'D') $layout_type = 'Табличная верстка';
elseif ($type == 'E') $layout_type = 'Блочная верстка (горизонтально)';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Зайцева Валерия Николаевна, группа 241-353 | Лабораторная работа №2 - Циклические алгоритмы. Условия в алгоритмах. Табулирование функций.</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <img src="logo.svg" alt="Логотип университета" class="logo">
            <p>Зайцева Валерия Николаевна | Группа 241-353 | Лабораторная работа №2 | Вариант 5</p>
        </header>

        <main>
            <h2>Табулирование функции</h2>
            <p>Начальное значение x: <?= $x ?>, шаг: <?= $step ?>, количество итераций: <?= $encounting ?></p>

<?php

if ($type == 'B') echo '<ul>';
if ($type == 'C') echo '<ol>';
if ($type == 'D') {
    echo '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse;">';
    echo '<tr><th>№</th><th>x</th><th>f(x)</th></tr>';
}
if ($type == 'E') echo '<div class="block-container">';

for ($i = 0; $i < $encounting; $i++, $x += $step) {
    
    if ($x <= 10) {
        $f = 3 * $x + 9;
    }
    else
    if ($x < 20) {
        if ($x * $x - 121 == 0) {
            $f = 'error';
        } else {
            $f = ($x + 3) / ($x * $x - 121);
        }
    }
    else {
        $f = 4 * $x * $x - 11;
    }
    
    if (is_numeric($f)) {
        $f = round($f, 3);
    }
    
    if (is_numeric($f)) {
        $all_f_values[] = $f;
        $sum_f += $f;
        $count_f++;
    }
    
    if ($type == 'A') {
        echo 'f(' . $x . ')=' . $f . '<br>';
    }
    elseif ($type == 'B') {
        echo '<li>f(' . $x . ')=' . $f . '</li>';
    }
    elseif ($type == 'C') {
        echo '<li>f(' . $x . ')=' . $f . '</li>';
    }
    elseif ($type == 'D') {
        echo '<tr>';
        echo '<td>' . ($i + 1) . '</td>';
        echo '<td>' . $x . '</td>';
        echo '<td>' . $f . '</td>';
        echo '</tr>';
    }
    elseif ($type == 'E') {
        echo '<div class="inline-block">f(' . $x . ')=' . $f . '</div>';
    }
}

if ($type == 'B') echo '</ul>';
if ($type == 'C') echo '</ol>';
if ($type == 'D') echo '</table>';
if ($type == 'E') echo '</div>';

if ($count_f > 0) {
    $max_f = max($all_f_values);
    $min_f = min($all_f_values);
    $avg_f = $sum_f / $count_f;
    
    echo '<div class="stats">';
    echo '<h3>Статистика значений функции</h3>';
    echo '<p>Максимальное значение: ' . $max_f . '</p>';
    echo '<p>Минимальное значение: ' . $min_f . '</p>';
    echo '<p>Сумма значений: ' . round($sum_f, 3) . '</p>';
    echo '<p>Среднее арифметическое: ' . round($avg_f, 3) . '</p>';
    echo '</div>';
}
?>

        </main>

        <footer>
            <p>Тип верстки: <?= $layout_type ?></p>
        </footer>
    </div>
</body>
</html>
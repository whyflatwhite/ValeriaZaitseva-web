<?php
    if(!isset($_GET['store'])) {
        $_GET['store'] = '';
    }
    if(!isset($_GET['count'])) {
        $_GET['count'] = 0;
    }

    if(isset($_GET['key']))
    {
        if($_GET['key'] == 'reset') {
            $_GET['store'] = '';
        }
        else {
            $_GET['store'] .= $_GET['key'];
        }
        $_GET['count']++;
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Зайцева Валерия Николаевна, группа 241-353 | Лабораторная работа №3</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="wrapper">
    <header>
        <img src="logo.svg" alt="Логотип университета" class="logo">
        <p>Зайцева Валерия Николаевна | Группа 241-353 | Лабораторная работа №3</p>
    </header>
    <main>
        <h2>Виртуальная клавиатура</h2>
        <div class="calculator">
            <div class="result">
                <?php echo $_GET['store'] === '' ? '&nbsp;' : htmlspecialchars($_GET['store']); ?>
            </div>
            <div class="buttons">
                <?php for($i = 1; $i <= 9; $i++): ?>
                    <a href="?key=<?php echo $i; ?>&store=<?php echo urlencode($_GET['store']); ?>&count=<?php echo $_GET['count']; ?>" class="btn"><?php echo $i; ?></a>
                <?php endfor; ?>
                <a href="?key=0&store=<?php echo urlencode($_GET['store']); ?>&count=<?php echo $_GET['count']; ?>" class="btn">0</a>
                <a href="?key=reset&store=&count=<?php echo $_GET['count']; ?>" class="btn btn-reset">СБРОС</a>
            </div>
        </div>
    </main>
    <footer>
        <p>Всего нажатий: <?php echo $_GET['count']; ?></p>
    </footer>
</div>
</body>
</html>
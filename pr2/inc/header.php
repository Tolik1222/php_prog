<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №2</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: <?php echo isset($_SESSION['bg_color']) ? $_SESSION['bg_color'] : '#ffffff'; ?>;
        }
        nav { background: #f0f0f0; padding: 10px; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>
    <header>
        <h1>Скелет сайту</h1>
        <?php
        if (isset($_COOKIE['user_name']) && isset($_COOKIE['user_gender'])) {
            $name = $_COOKIE['user_name'];
            $gender = $_COOKIE['user_gender'];
            $title = ($gender === 'male') ? 'Пане' : 'Пані';
            echo "<p>Вітаємо Вас, $title $name!</p>";
        }
        ?>
    </header>
    <nav>
        <a href="index.php?page=main">Головна</a>
        <a href="index.php?page=form">Форма</a>
        <a href="index.php?page=params">Перегляд параметрів</a>
        <a href="index.php?page=settings">Налаштування</a>
    </nav>
    <main>
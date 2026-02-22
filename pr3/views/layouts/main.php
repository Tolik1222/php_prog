<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №3</title>
    <style>
    body { 
        font-family: Arial, sans-serif; 
        background-color: <?= $session['bg_color'] ?? '#ffffff' ?>; 
    }
    nav { background: #f0f0f0; padding: 10px; }
    nav a { margin-right: 15px; }
</style>

<header>
    <h1>Скелет сайту на PHP (MVC)</h1>
    <?php if (isset($cookie['user_name']) && isset($cookie['user_gender'])): ?>
        <?php 
        $name = htmlspecialchars($cookie['user_name']);
        $title = ($cookie['user_gender'] === 'male') ? 'Пане' : 'Пані';
        echo "<p>Вітаємо Вас, $title $name!</p>";
        ?>
    <?php endif; ?>
</header>
    <nav>
        <a href="index.php?route=index/index">Головна</a>
        <a href="index.php?route=regform/index">Форма</a>
        <a href="index.php?route=params/index">Перегляд параметрів</a>
        <a href="index.php?route=settings/index">Налаштування</a>
    </nav>
    <main>
        <?php 
        $viewFile = 'views/' . $controllerName . '/' . $viewName . '.php';
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            echo "<h1 style='color:red'>Файл вью не знайдено: $viewFile</h1>";
        }
        ?>
    </main>
    <footer>
        <p>© 2026 Антон. Лабораторна робота №3.</p>
    </footer>
</body>
</html>
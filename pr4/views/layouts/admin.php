<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Адмін-панель CMS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        header { background: #2c3e50; color: white; padding: 15px; text-align: center; }
        nav { background: #34495e; padding: 10px; }
        nav a { color: white; margin-right: 20px; text-decoration: none; font-weight: bold; }
        nav a:hover { color: #18bc9c; }
        main { padding: 20px; max-width: 1200px; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #ecf0f1; }
        .error { color: #e74c3c; font-weight: bold; }
        .success { color: #2ecc71; font-weight: bold; }
        form { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        label { display: block; margin: 15px 0 5px; font-weight: bold; }
        input, textarea, select { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 20px; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #2980b9; }
        a.btn { padding: 8px 12px; background: #3498db; color: white; text-decoration: none; border-radius: 4px; }
        a.btn.delete { background: #e74c3c; }
        a.btn.edit { background: #f39c12; }
    </style>
</head>
<body>
<header>
    <h1>Адмін-панель CMS</h1>
    <?php if (isset($_SESSION['admin_id'])): ?>
        <p>Вітаємо, <?= htmlspecialchars($_SESSION['admin_login'] ?? 'Адмін') ?> | 
           <a href="index.php?route=index/logout" style="color:white;">Вийти</a></p>
    <?php endif; ?>
</header>

    <nav>
        <a href="index.php?route=users/index">Користувачі</a>
        <a href="index.php?route=news/index">Новини</a>
        <a href="index.php?route=pages/index">Сторінки</a>
        <a href="index.php?route=brands/index">Бренди</a>
        <a href="index.php?route=products/index">Товари</a>
    </nav>

    <main>
        <?php 
        $viewFile = 'views/' . $controllerName . '/' . $viewName . '.php';
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            echo "<p class='error'>Помилка: файл вью не знайдено — $viewFile</p>";
        }
        ?>
    </main>
</body>
</html>
<h2>Вхід до адмін-панелі</h2>

<?php if (isset($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<form method="post">
    <label>Логін</label>
    <input type="text" name="login" required autofocus>

    <label>Пароль</label>
    <input type="password" name="password" required>

    <button type="submit">Увійти</button>
</form>
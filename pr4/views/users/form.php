<h2><?= isset($item) ? 'Редагувати користувача' : 'Додати користувача' ?></h2>

<?php if (isset($errors)): ?>
    <ul class="error">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <label>Логін</label>
    <input type="text" name="login" value="<?= isset($item) ? htmlspecialchars($item['login']) : '' ?>" required>

    <label>Пароль <?= isset($item) ? '(залиште порожнім, якщо не змінюєте)' : '' ?></label>
    <input type="password" name="password" <?= isset($item) ? '' : 'required' ?>>

    <label>Пароль (повторно)</label>
    <input type="password" name="password2" <?= isset($item) ? '' : 'required' ?>>

    <button type="submit">Зберегти</button>
</form>
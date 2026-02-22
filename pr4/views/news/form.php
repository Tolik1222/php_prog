<h2><?= isset($item) ? 'Редагувати новину' : 'Додати новину' ?></h2>

<?php if (isset($errors)): ?>
    <ul class="error">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <label>Заголовок</label>
    <input type="text" name="title" value="<?= isset($item) ? htmlspecialchars($item['title']) : '' ?>" required>

    <label>Текст новини</label>
    <textarea name="content" rows="12" required><?= isset($item) ? htmlspecialchars($item['content']) : '' ?></textarea>

    <button type="submit">Зберегти</button>
</form>
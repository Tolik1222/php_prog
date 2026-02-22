<h2><?= isset($item) ? 'Редагувати бренд' : 'Додати бренд' ?></h2>

<?php if (isset($errors)): ?>
    <ul class="error">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <label>Назва бренду</label>
    <input type="text" name="name" value="<?= isset($item) ? htmlspecialchars($item['name']) : '' ?>" required>

    <label>Опис</label>
    <textarea name="description"><?= isset($item) ? htmlspecialchars($item['description']) : '' ?></textarea>

    <button type="submit">Зберегти</button>
</form>
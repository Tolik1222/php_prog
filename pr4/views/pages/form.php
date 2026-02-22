<h2><?= isset($item) ? 'Редагувати сторінку' : 'Додати сторінку' ?></h2>

<?php if (isset($errors)): ?>
    <ul class="error">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <label>Title (заголовок)</label>
    <input type="text" name="title" value="<?= isset($item) ? htmlspecialchars($item['title']) : '' ?>" required>

    <label>Keywords (ключові слова)</label>
    <input type="text" name="keywords" value="<?= isset($item) ? htmlspecialchars($item['keywords']) : '' ?>">

    <label>Description (опис)</label>
    <input type="text" name="description" value="<?= isset($item) ? htmlspecialchars($item['description']) : '' ?>">

    <label>H1 (головний заголовок)</label>
    <input type="text" name="h1" value="<?= isset($item) ? htmlspecialchars($item['h1']) : '' ?>">

    <label>Вміст сторінки</label>
    <textarea name="content" rows="15" required><?= isset($item) ? htmlspecialchars($item['content']) : '' ?></textarea>

    <button type="submit">Зберегти</button>
</form>
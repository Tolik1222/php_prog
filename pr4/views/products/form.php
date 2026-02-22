<h2><?= isset($item) ? 'Редагувати товар' : 'Додати товар' ?></h2>

<?php if (isset($errors)): ?>
    <ul class="error">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <label>Назва товару</label>
    <input type="text" name="name" value="<?= isset($item) ? htmlspecialchars($item['name']) : '' ?>" required>

    <label>Бренд</label>
    <select name="brand_id">
        <option value="">— Оберіть бренд —</option>
        <?php foreach ($brands as $brand): ?>
            <option value="<?= $brand['id'] ?>" <?= (isset($item) && $item['brand_id'] == $brand['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($brand['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Ціна (грн)</label>
    <input type="number" step="0.01" name="price" value="<?= isset($item) ? $item['price'] : '' ?>" required>

    <label>Опис</label>
    <textarea name="description"><?= isset($item) ? htmlspecialchars($item['description']) : '' ?></textarea>

    <button type="submit">Зберегти</button>
</form>
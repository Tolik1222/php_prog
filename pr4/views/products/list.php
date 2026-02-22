<h2>Товари</h2>

<a href="index.php?route=products/add" class="btn">+ Додати товар</a>

<table>
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Бренд</th>
        <th>Ціна</th>
        <th>Дата</th>
        <th>Дії</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= htmlspecialchars($item['brand_name'] ?? '—') ?></td>
            <td><?= number_format($item['price'], 2) ?> грн</td>
            <td><?= $item['created_at'] ?></td>
            <td>
                <a href="index.php?route=products/edit&id=<?= $item['id'] ?>" class="btn edit">Редагувати</a>
                <a href="index.php?route=products/delete&id=<?= $item['id'] ?>" class="btn delete" onclick="return confirm('Видалити товар?')">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
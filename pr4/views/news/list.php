<h2>Новини</h2>

<a href="index.php?route=news/add" class="btn">+ Додати новину</a>

<table>
    <tr>
        <th>ID</th>
        <th>Заголовок</th>
        <th>Дата</th>
        <th>Дії</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['title']) ?></td>
            <td><?= $item['created_at'] ?></td>
            <td>
                <a href="index.php?route=news/edit&id=<?= $item['id'] ?>" class="btn edit">Редагувати</a>
                <a href="index.php?route=news/delete&id=<?= $item['id'] ?>" class="btn delete" onclick="return confirm('Видалити новину?')">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
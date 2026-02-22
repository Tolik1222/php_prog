<h2>Сторінки</h2>

<a href="index.php?route=pages/add" class="btn">+ Додати сторінку</a>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Дата</th>
        <th>Дії</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['title']) ?></td>
            <td><?= $item['created_at'] ?></td>
            <td>
                <a href="index.php?route=pages/edit&id=<?= $item['id'] ?>" class="btn edit">Редагувати</a>
                <a href="index.php?route=pages/delete&id=<?= $item['id'] ?>" class="btn delete" onclick="return confirm('Видалити сторінку?')">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<h2>Бренди</h2>

<a href="index.php?route=brands/add" class="btn">+ Додати бренд</a>

<table>
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Опис</th>
        <th>Дата</th>
        <th>Дії</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= htmlspecialchars($item['description'] ?? '') ?></td>
            <td><?= $item['created_at'] ?></td>
            <td>
                <a href="index.php?route=brands/edit&id=<?= $item['id'] ?>" class="btn edit">Редагувати</a>
                <a href="index.php?route=brands/delete&id=<?= $item['id'] ?>" class="btn delete" onclick="return confirm('Видалити бренд?')">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
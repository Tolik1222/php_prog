<h2>Користувачі</h2>

<a href="index.php?route=users/add" class="btn">+ Додати користувача</a>

<table>
    <tr>
        <th>ID</th>
        <th>Логін</th>
        <th>Дата створення</th>
        <th>Дії</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['login']) ?></td>
            <td><?= $item['created_at'] ?></td>
            <td>
                <a href="index.php?route=users/edit&id=<?= $item['id'] ?>" class="btn edit">Редагувати</a>
                <a href="index.php?route=users/delete&id=<?= $item['id'] ?>" class="btn delete" onclick="return confirm('Видалити користувача?')">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<!DOCTYPE html>
<html>
<head>
    <title>Новини</title>
</head>
<body>
    <h1>Список новин (MVC)</h1>

    <?php if (!empty($news)): ?>
        <?php foreach ($news as $item): ?>
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <h2><?php echo $item['title']; ?></h2>
                <p><?php echo $item['text']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>На жаль, новин не знайдено.</p>
    <?php endif; ?>

</body>
</html>
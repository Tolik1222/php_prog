<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$items = [];

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    $apiKey = '55284c15a8401de047efcd4c2d74bfc3ab9f8342'; 

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://google.serper.dev/search");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_POST, TRUE);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        "q" => $search,
        "gl" => "ua", 
        "hl" => "uk"  
    ]));

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "X-API-KEY: $apiKey",
        "Content-Type: application/json"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['organic'])) {
        $items = $data['organic'];
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Пошуковик (Serper API)</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 0 20px; background-color: #f8f9fa; }
        h2 { color: #202124; text-align: center; }
        form { display: flex; justify-content: center; gap: 10px; margin-bottom: 30px; }
        input[type="text"] { width: 70%; padding: 10px; border: 1px dotted #ccc; border-radius: 24px; outline: none; }
        button { padding: 10px 20px; background: #8bc34a; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .result-item { background: white; padding: 15px; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .result-item a { color: #1a0dab; text-decoration: none; font-size: 18px; font-weight: bold; }
        .result-item a:hover { text-decoration: underline; }
        .snippet { color: #4d5156; font-size: 14px; margin-top: 8px; }
    </style>
</head>
<body>
    <h2>Мій пошуковий сервіс</h2>
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Що шукаємо?" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" required>
        <button type="submit">Пошук</button>
    </form>

    <div id="results">
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <div class="result-item">
                    <a href="<?= $item['link'] ?>" target="_blank">
                        <?= htmlspecialchars($item['title']) ?>
                    </a>
                    <div class="snippet"><?= htmlspecialchars($item['snippet'] ?? '') ?></div>
                </div>
            <?php endforeach; ?>
        <?php elseif (isset($_GET['search'])): ?>
            <p style="text-align: center; color: #777;">Нічого не знайдено за вашим запитом.</p>
        <?php endif; ?>
    </div>
</body>
</html>
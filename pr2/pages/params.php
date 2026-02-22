<?php
function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$errors = [];
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? trim((string)$_POST['login']) : '';
    $password1 = isset($_POST['password1']) ? (string)$_POST['password1'] : '';
    $password2 = isset($_POST['password2']) ? (string)$_POST['password2'] : '';
    $about = isset($_POST['about']) ? trim((string)$_POST['about']) : '';

    if (strpos($login, ' ') !== false) {
        $errors[] = 'Логін не повинен складатися з кількох слів (без пробілів).';
    }
    if (strlen($login) <= 4) {
        $errors[] = 'Логін повинен бути більше 4 символів.';
    }
    if ($password1 !== $password2) {
        $errors[] = 'Паролі не збігаються.';
    }
    if (strlen($password1) <= 4) {
        $errors[] = 'Пароль повинен бути більше 4 символів.';
    }
    if ($about === '') {
        $errors[] = 'Поле "Про себе" не повинно бути порожнім.';
    }

    if (empty($errors)) {
        $successMessage = 'Форма пройшла перевірку успішно!';
    }
}
?>

<h2>Перегляд серверних змінних</h2>

<?php if (!empty($errors)): ?>
    <div style="color: red;">
        <h3>Помилки</h3>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php elseif (!empty($successMessage)): ?>
    <div style="color: green;">
        <p><?php echo e($successMessage); ?></p>
    </div>
<?php endif; ?>

<h3>$_SERVER</h3>
<ul>
<?php
foreach ($_SERVER as $key => $value) {
    $displayValue = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : $value;
    echo '<li><strong>' . e($key) . ':</strong> ' . e($displayValue) . '</li>';
}
?>
</ul>

<h3>$_GET</h3>
<ul>
<?php
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $displayValue = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : $value;
        echo '<li><strong>' . e($key) . ':</strong> ' . e($displayValue) . '</li>';
    }
} else {
    echo '<li>Немає GET-параметрів</li>';
}
?>
</ul>

<h3>$_POST</h3>
<ul>
<?php
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if ($key === 'password1' || $key === 'password2') {
            $displayValue = '***';
        } else {
            $displayValue = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : $value;
        }
        echo '<li><strong>' . e($key) . ':</strong> ' . e($displayValue) . '</li>';
    }
} else {
    echo '<li>Немає POST-параметрів</li>';
}
?>
</ul>
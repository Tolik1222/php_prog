<?php
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login = trim($_POST['login']);
    $p1 = $_POST['password1'] ?? '';
    $p2 = $_POST['password2'] ?? '';

    if (strpos($login, ' ') !== false) {
        $errors[] = "Логін не може містити пробіли (має бути одним словом).";
    }
    if (strlen($login) < 4 || strlen($p1) < 4) {
        $errors[] = "Логін та пароль мають бути довше 4 символів.";
    }
    if ($p1 !== $p2) {
        $errors[] = "Паролі не збігаються.";
    }

    if (empty($errors)) {
        $success = "Форма успішно пройшла валідацію!";
    }
}
?>

<h2>Результати обробки та параметри</h2>

<?php if (!empty($errors)): ?>
    <div style="color: red;">
        <ul><?php foreach ($errors as $err) { echo "<li>$err</li>"; } ?></ul>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <p style="color: green;"><?php echo $success; ?></p>
<?php endif; ?>

<h3>$_POST дані:</h3>
<ul>
<?php foreach ($_POST as $key => $val) { ?>
    <li><strong><?php echo e($key); ?>:</strong> 
    <?php echo (strpos($key, 'pass') !== false) ? '***' : e($val); ?></li>
<?php } ?>
</ul>

<h3>$_SERVER змінні:</h3>
<div style="font-size: 0.8em; height: 200px; overflow: auto; border: 1px solid #ccc;">
    <ul>
    <?php foreach ($_SERVER as $k => $v) { echo "<li><strong>$k:</strong> $v</li>"; } ?>
    </ul>
</div>
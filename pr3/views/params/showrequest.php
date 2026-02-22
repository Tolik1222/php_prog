<h2>Перегляд серверних змінних</h2>

<?php if (isset($_SESSION['form_success'])): ?>
    <div style="color: green;">
        <p><?= $_SESSION['form_success'] ?></p>
    </div>
    <?php unset($_SESSION['form_success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['form_data'])): ?>
    <h3>Дані з останньої відправленої форми</h3>
    <ul>
        <?php foreach ($_SESSION['form_data'] as $key => $value): ?>
            <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?></li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION['form_data']); ?>
<?php endif; ?>

<h3>$_SERVER</h3>
<ul>
<?php foreach ($serverVars as $key => $value): ?>
    <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars(is_array($value) ? json_encode($value) : $value) ?></li>
<?php endforeach; ?>
</ul>

<h3>$_GET</h3>
<ul>
<?php if (!empty($getVars)): foreach ($getVars as $key => $value): ?>
    <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars(is_array($value) ? json_encode($value) : $value) ?></li>
<?php endforeach; else: ?>
    <li>Немає GET-параметрів</li>
<?php endif; ?>
</ul>

<h3>$_POST</h3>
<ul>
<?php if (!empty($postVars)): foreach ($postVars as $key => $value): ?>
    <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars(($key === 'password1' || $key === 'password2') ? '***' : (is_array($value) ? json_encode($value) : $value)) ?></li>
<?php endforeach; else: ?>
    <li>Немає POST-параметрів</li>
<?php endif; ?>
</ul>

<?php if (empty($postVars) && !empty($_SESSION['last_post'])): ?>
    <h3>Останній POST (збережений у сесії)</h3>
    <ul>
        <?php foreach ($_SESSION['last_post'] as $key => $value): ?>
            <li>
                <strong><?= htmlspecialchars((string)$key) ?>:</strong>
                <?= htmlspecialchars((($key === 'password1' || $key === 'password2') ? '***' : (is_array($value) ? json_encode($value) : (string)$value))) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
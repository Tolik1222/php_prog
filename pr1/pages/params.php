<h2>Перегляд серверних змінних</h2>

<h3>$_SERVER</h3>
<ul>
<?php
foreach ($_SERVER as $key => $value) {
    echo "<li><strong>$key:</strong> $value</li>";
}
?>
</ul>

<h3>$_GET</h3>
<ul>
<?php
foreach ($_GET as $key => $value) {
    echo "<li><strong>$key:</strong> $value</li>";
}
if (empty($_GET)) {
    echo "<li>Немає GET-параметрів</li>";
}
?>
</ul>

<h3>$_POST</h3>
<ul>
<?php
foreach ($_POST as $key => $value) {
    echo "<li><strong>$key:</strong> $value</li>";
}
if (empty($_POST)) {
    echo "<li>Немає POST-параметрів</li>";
}
?>
</ul>
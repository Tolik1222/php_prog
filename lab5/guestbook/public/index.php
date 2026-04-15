<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\NewsController;

$controller = new NewsController();
$controller->index();
<?php
define('WEBROOT', str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'Config/core.php');

require(ROOT . 'Classes/router.php');
require(ROOT . 'Classes/request.php');
require(ROOT . 'Classes/dispatcher.php');
require(ROOT . 'Classes/admin.php');
require(ROOT . 'Classes/pagination.php');
require(ROOT . 'Classes/resize.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>
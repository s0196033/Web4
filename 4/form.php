<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=UTF-8');

// Очистка cookies только при явном указании
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['clear'])) {
    foreach ($_COOKIE as $name => $value) {
        if (strpos($name, 'form_') === 0 || strpos($name, 'error_') === 0) {
            setcookie($name, '', time() - 3600, '/');
        }
    }
    // Редирект без параметров
    header('Location: index.php'); 
    exit();
}

// Обработка POST-запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Подключаем логику валидации и БД
    require_once 'index.php'; 
    exit();
}

// Редирект на index.php, если это не POST и не очистка
header('Location: index.php');
exit();
?>

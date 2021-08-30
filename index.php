<?php

namespace Core;

error_reporting(E_ALL);  //  отлавливает ошибки
ini_set('display_errors', 'on'); // настройка конфигурации

require_once $_SERVER['DOCUMENT_ROOT'].'/project/config/connection.php'; // подключаем файл с когстантами БД

spl_autoload_register(); // автозагрузка классов, соглашение по умолчанию

session_start();

$routes = require $_SERVER['DOCUMENT_ROOT'].'/project/config/routes.php'; // в переменной записан массив из файла

$track = (new Router)->getTrack($routes, $_SERVER['REQUEST_URI']); // в переменной записан объект класса Track

$page = (new Dispatcher)->getPage($track); // создаем страницу с нужными параметрами

echo (new View)->render($page); // выводим нужную страницу на экран





?>
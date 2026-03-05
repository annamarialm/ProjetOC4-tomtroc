<?php

session_start();

require_once __DIR__ . '/../src/Model/Database.php';
require_once __DIR__ . '/../src/Controller/HomeController.php';
require_once __DIR__ . '/../src/Controller/AuthController.php';
require_once __DIR__ . '/../src/Controller/AccountController.php';
require_once __DIR__ . '/../src/Controller/BookController.php';



$route = $_GET['route'] ?? 'home';

switch ($route) {

    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'account':
        $controller = new AccountController();
        $controller->index();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'create-book':
        $controller = new BookController();
        $controller->create();
        break;

    default:
        echo "404 - Page not found";
}

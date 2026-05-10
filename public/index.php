<?php

require '../bootstrap.php';

require ROOT . '/app/controllers/TaskController.php';

$controller = new TaskController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'add':
        $controller->add();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'toggle':
        $controller->toggle();
        break;

    case 'add_category':
        $controller->addCategory();
        break;
    case 'search':
        $controller->search();
    break;

    default:
        $controller->index();
        break;
}
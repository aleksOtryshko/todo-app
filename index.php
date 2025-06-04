<?php

require_once 'Model/Task.php';
require_once 'Repository/TaskRepositoryInterface.php';
require_once 'Repository/JsonTaskRepository.php';
require_once 'Service/TaskService.php';
require_once 'Controller/TaskController.php';

$repo = new JsonTaskRepository("tasks.json");
$service = new TaskService($repo);
$controller = new TaskController($service);

function menu(): void
{
    echo "\n📋 Меню:\n";
    echo "1. Добавить задачу\n";
    echo "2. Показать список\n";
    echo "3. Удалить завершенные задачи\n";
    echo "4. Отметить задачу как выполненную\n";
    echo "0. Выйти\n";
}

while (true) {
    menu();
    $input = readline("Выберите пункт: ");

    if (!in_array($input, ['0', '1', '2', '3', '4'], true)) {
        echo "❗ Введите 0, 1, 2 или 3\n";
        continue;
    }

    switch ($input) {
        case '1':
            $title = readline("Введите название задачи: ");
            try {
                $controller->createTask($title);
            } catch (Exception $e) {
                echo "❌ Ошибка: {$e->getMessage()}\n";
            }
            break;

        case '2':
            $controller->showAll();
            break;

        case '3':
            $controller->clearCompleted();
	    break;

        case '4':
            $controller->showAll();
            $num = (int) readline("Введите номер задачи для завершения: ");
            try {
                $controller->completeTask($num - 1);
            } catch (Exception $e) {
            echo "❌ Ошибка: " . $e->getMessage() . "\n";
            }
        break;

        case '0':
            echo "👋 Выход...\n";
            exit;
    }
}

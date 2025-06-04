<?php

class TaskController
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function createTask(string $title): void
    {
        $task = $this->service->create($title);
        echo " Задача '{$task->title}' добавлена\n";
    }

    public function completeTask(int $index): void
    {
        $this->service->completeTask($index);
        echo " Задача №" . ($index + 1) . " помечена как выполненная\n";
    }

    public function showAll(): void
    {
        $tasks = $this->service->list();
        echo "\n Задачи:\n";
        foreach ($tasks as $i => $task) {
            $status = $task->completed ? '✔' : '✗';
            echo ($i + 1) . ". {$task->title} [$status]\n";
        }
    }

    public function clearCompleted(): void
    {
        $this->service->clearCompleted();
        echo " Завершенные задачи удалены\n";
    }


}

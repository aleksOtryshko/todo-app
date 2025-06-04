<?php

class TaskService
{
    private TaskRepositoryInterface $repo;

    public function __construct(TaskRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function create(string $title): Task
    {
        if (strlen(trim($title)) < 3) {
            throw new InvalidArgumentException("Заголовок слишком короткий.");
        }

        $task = new Task($title);
        $this->repo->add($task);
        $this->repo->save();
        return $task;
    }

    public function list(): array
    {
        return $this->repo->all();
    }

    public function clearCompleted(): void
    {
        $this->repo->removeCompleted();
    }

    public function completeTask(int $index): void
    {
        $tasks = $this->repo->all();

        if (!isset($tasks[$index])) {
            throw new OutOfBoundsException("Задача с таким номером не найдена.");
        }

        $tasks[$index]->markAsCompleted();
        $this->repo->overwriteAll($tasks);
    } 
}

<?php

class JsonTaskRepository implements TaskRepositoryInterface
{
    private array $tasks = [];
    private string $file;

    public function __construct(string $file = 'tasks.json')
    {
        $this->file = $file;
        $this->load();
    }

    private function load(): void
    {
        if (file_exists($this->file)) {
            $data = json_decode(file_get_contents($this->file), true);
            foreach ($data as $item) {
                $this->tasks[] = Task::fromArray($item);
            }
        }
    }

    public function add(Task $task): void
    {
        $this->tasks[] = $task;
    }

    public function all(): array
    {
        return $this->tasks;
    }

    public function save(): void
    {
        $data = array_map(fn($t) => $t->toArray(), $this->tasks);
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function removeCompleted(): void
    {
        $this->tasks = array_filter($this->tasks, fn($t) => !$t->completed);
        $this->save();
    }

    public function overwriteAll(array $tasks): void
    {
        $this->tasks = $tasks;
        $this->save();
    }
}

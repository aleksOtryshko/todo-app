<?php

class Task
{
    public string $title;
    public bool $completed;

    public function __construct(string $title, bool $completed = false)
    {
        $this->title = $title;
        $this->completed = $completed;
    }

    public function markAsCompleted(): void
    {
        $this->completed = true;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'completed' => $this->completed,
        ];
    }

    public static function fromArray(array $data): Task
    {
        return new Task($data['title'], $data['completed']);
    }
}

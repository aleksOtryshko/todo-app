<?php

interface TaskRepositoryInterface
{
    public function add(Task $task): void;
    public function all(): array;
    public function save(): void;
    public function removeCompleted(): void;
}

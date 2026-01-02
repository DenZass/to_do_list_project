<?php

namespace App\Services\Task;

interface TaskService
{
    public function index(): array;
    public function show(int $id): array;
    public function create(array $params): array;
    public function update(int $id, array $params): array;
    public function delete(int $id): array;
}

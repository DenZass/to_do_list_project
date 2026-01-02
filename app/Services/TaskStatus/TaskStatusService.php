<?php

namespace App\Services\TaskStatus;

interface TaskStatusService
{
    public function index(): array;
    public function create(array $params): array;
    public function update(int $id, array $params): array;
    public function delete(int $id): array;
}

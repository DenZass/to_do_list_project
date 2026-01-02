<?php

namespace App\Services\TaskStatus;

use App\Models\TaskStatus;

class TaskStatusServiceClass implements TaskStatusService
{
    protected array $failedDB = [
        'status' => 'failed',
        'message' => 'Что-то пошло не так',
    ];

    public function index(): array
    {
        try {
            return [
                'status' => 'success',
                'statuses_list' => TaskStatus::all(),
            ];

        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }

    public function create(array $params): array
    {
        try {
            $newStatus = new TaskStatus();
            $newStatus->title = $params['title'];
            $newStatus->save();

            return [
                'status' => 'success',
                'new_status_id' => $newStatus->id,
            ];

        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }

    public function update(int $id, array $params): array
    {
        try {
            $taskStatus = TaskStatus::find($id);

            if($taskStatus !== null){
                $taskStatus->title = $params['title'];
                $taskStatus->save();

                return [
                    'status' => 'success',
                    'status_id_modified' => $taskStatus->id,
                ];

            } else {
                return [
                    'status' => 'failed',
                    'message' => "Статус с id - $id не найден",
                ];
            }

        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }

    public function delete(int $id): array
    {
        try {
            $taskStatus = TaskStatus::find($id);

            if($taskStatus !== null){
                $taskStatus->delete();
                return [
                    'status' => 'success',
                    'status_id_deleted' => $taskStatus->id,
                ];
            } else {
                return [
                    'status' => 'failed',
                    'message' => "Статус с id - $id не найден",
                ];
            }

        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }
}

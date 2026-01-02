<?php

namespace App\Services\Task;

use App\Models\Task;
use App\Models\TaskStatus;

class TaskServiceClass implements TaskService
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
                'tasks_list' => Task::all(),
            ];

        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }

    public function show(int $id): array
    {
        try {
            $task = Task::find($id);
            if($task !== null){
                return [
                    'status' => 'success',
                    'task' => $task,
                ];
            } else {
                return [
                    'status' => 'failed',
                    'message' => "Задача с id = $id не найдена",
                ];
            }
        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }

    public function create(array $params): array
    {
        try {
            if(TaskStatus::find($params['status_id']) !== null){
                $newTask = new Task($params);
                $newTask->save();
                return [
                    'status' => 'success',
                    'new_task_id' => $newTask->id,
                ];
            } else {
                return [
                    'status' => 'failed',
                    'message' => " status_id со значением {$params['status_id']} - не найден",
                ];
            }

        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }

    public function update(int $id, array $params): array
    {
        try {
            $task = Task::find($id);

            if($task !== null){

                if(TaskStatus::find($params['status_id']) !== null){
                    foreach ($params as $key => $value){
                        $task[$key] = $value;
                    }
                    $task->save();

                    return [
                        'status' => 'success',
                        'task_id_updated' => $task->id,
                    ];

                } else {
                    return [
                        'status' => 'failed',
                        'message' => "status_id со значением {$params['status_id']} - не найден",
                    ];
                }

            } else {
                return [
                    'status' => 'failed',
                    'message' => "Задача с id = $id не найдена",
                ];
            }

        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }

    public function delete(int $id): array
    {
        try {
            $task = Task::find($id);

            if($task !== null){

                $task->delete();
                return [
                    'status' => 'success',
                    'task_id_deleted' => $task->id,
                ];

            } else {
                return [
                    'status' => 'failed',
                    'message' => "Задача с id = $id не найдена",
                ];
            }

        } catch (\Exception $exception){
            return $this->failedDB;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\Task\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(TaskService $taskService): JsonResponse
    {
        $result = $taskService->index();
        return response()->json($result);
    }

    public function show(int $id, TaskService $taskService): JsonResponse
    {
        $result = $taskService->show($id);
        return response()->json($result);
    }

    public function create(Request $request, TaskService $taskService): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'status_id' => ['required', 'integer'],
        ]);

        if($validator->fails()){
            $errorArray = $validator->errors()->all();

            return response()->json([
                'status' => 'failed',
                'messages_list' => $errorArray,
            ]);
        }

        $validateParam = $validator->validated();
        $result = $taskService->create($validateParam);

        return response()->json($result);
    }
    public function update(int $id, Request $request, TaskService $taskService): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'status_id' => ['required', 'integer'],
        ]);

        if($validator->fails()){
            $errorArray = $validator->errors()->all();

            return response()->json([
                'status' => 'failed',
                'messages_list' => $errorArray,
            ]);
        }

        $validateParam = $validator->validated();
        $result = $taskService->update($id, $validateParam);

        return response()->json($result);
    }

    public function delete(int $id, TaskService $taskService): JsonResponse
    {
        $result = $taskService->delete($id);
        return response()->json($result);
    }
}

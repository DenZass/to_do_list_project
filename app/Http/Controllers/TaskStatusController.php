<?php

namespace App\Http\Controllers;

use App\Services\TaskStatus\TaskStatusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class TaskStatusController extends Controller
{
    public function index(TaskStatusService $taskStatusService): JsonResponse
    {
        $result = $taskStatusService->index();
        return response()->json($result);
    }

    public function create(Request $request, TaskStatusService $taskStatusService): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
        ]);

        if($validator->fails()){
            $errorArray = $validator->errors()->get('title');
            return response()->json([
                'status' => 'failed',
                'message' => $errorArray[0],
            ]);
        }

        $validateParam = $validator->validated();
        $result = $taskStatusService->create($validateParam);

        return response()->json($result);
    }

    public function update(int $id, Request $request, TaskStatusService $taskStatusService): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
        ]);

        if($validator->fails()){
            $errorArray = $validator->errors()->get('title');
            return response()->json([
                'status' => 'failed',
                'message' => $errorArray[0],
            ]);
        }

        $validateParam = $validator->validated();
        $result = $taskStatusService->update($id, $validateParam);

        return response()->json($result);
    }

    public function delete(int $id, TaskStatusService $taskStatusService): JsonResponse
    {
        $result = $taskStatusService->delete($id);
        return response()->json($result);
    }
}

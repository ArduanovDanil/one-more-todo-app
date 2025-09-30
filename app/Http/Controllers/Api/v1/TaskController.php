<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return $this->success(TaskResource::collection($tasks));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {

        $validatedData = $request->validated();

        return $this->success(new TaskResource(Task::create($validatedData)));
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $this->success(new TaskResource($task));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
    
        $task->update($request->validated());
        
        return $this->success(new TaskResource($task));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {

        $request = request();
        //dd($request->format());
        //dd($task);
        $result = $task->delete();

        //dd($result);
        if (!$result) {
            return response()->json(
                ['message' => 'Not found'],
                404
            );
        }

        return $this->success('', code: 204);
        //response()->json('', 204);
    }
}

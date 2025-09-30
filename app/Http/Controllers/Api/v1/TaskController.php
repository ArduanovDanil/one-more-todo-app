<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {

        $request = request();
        dd($request->format());
        //dd($task);
        $result = $task->deleteOrFail();

        //dd($result);
        if (!$result) {
            return response()->json(
                ['message' => 'Not found'],
                404
            );
        }

        return response()->json('', 204);
    }
}

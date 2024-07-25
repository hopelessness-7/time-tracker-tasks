<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\MainController;
use App\Http\Requests\Task\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function index(TaskService $service, Request $request)
    {
        return $this->handleRequest(function () use ($service, $request) {
            $tasks = $service->index($request->input('paginate', 10));
            return TaskResource::collection($tasks)->response()->getData(true);
        });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskService $service, TaskRequest $request)
    {
        return $this->handleRequest(function () use ($service, $request) {
            $data = $request->validated();
            return TaskResource::make($service->store($data))->resolve();
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskService $service, string $id)
    {
        return $this->handleRequest(function () use ($service, $id) {
            return TaskResource::make($service->show($id))->resolve();
        });
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskService $service, TaskRequest $request, string $id)
    {
        return $this->handleRequest(function () use ($service, $request, $id) {
            $data = $request->validated();
            $service->update($id, $data);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskService $service, string $id)
    {
        return $this->handleRequest(function () use ($service, $id) {
            $service->delete($id);
        });
    }
}

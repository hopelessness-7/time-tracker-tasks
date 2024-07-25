<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\MainController;
use App\Http\Requests\Project\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectService $service, Request $request)
    {
        return $this->handleRequest(function () use ($service, $request) {
            $projects = $service->index($request->input('paginate', 10));
            return ProjectResource::collection($projects)->response()->getData(true);
        });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectService $service, ProjectRequest $request)
    {
        return $this->handleRequest(function () use ($service, $request) {
            $data = $request->validated();
            return ProjectResource::make($service->store($data))->resolve();
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectService $service, string $id)
    {
        return $this->handleRequest(function () use ($service, $id) {
            return ProjectResource::make($service->show($id))->resolve();
        });
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectService $service, ProjectRequest $request, string $id)
    {
        return $this->handleRequest(function () use ($service, $request, $id) {
            $data = $request->validated();
            $service->update($id, $data);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectService $service, string $id)
    {
        return $this->handleRequest(function () use ($service, $id) {
            $service->delete($id);
        });
    }
}
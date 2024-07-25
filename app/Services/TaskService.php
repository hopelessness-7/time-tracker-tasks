<?php

namespace App\Services;

use App\Repositories\Eloquent\TaskRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskService
{
    protected TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(int $perPage): LengthAwarePaginator
    {
        return $this->taskRepository->paginate($perPage);
    }

    public function show(string $id): Model
    {
        return $this->taskRepository->find($id);
    }

    public function store(array $data): Model
    {
        return $this->taskRepository->create($data);
    }

    public function update(string $id, array $data): void
    {
        $this->taskRepository->update($id, $data);
    }

    public function delete(string $id): void
    {
        $this->taskRepository->delete($id);
    }
}

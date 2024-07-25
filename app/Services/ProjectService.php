<?php

namespace App\Services;

use App\Repositories\Eloquent\ProjectRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectService
{
    protected ProjectRepository $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(int $perPage): LengthAwarePaginator
    {
        return $this->projectRepository->paginate($perPage);
    }

    public function show(string $id): Model
    {
        return $this->projectRepository->find($id);
    }

    public function store(array $data): Model
    {
        return $this->projectRepository->create($data);
    }

    public function update(string $id, array $data): void
    {
        $this->projectRepository->update($id, $data);
    }

    public function delete(string $id): void
    {
        $this->projectRepository->delete($id);
    }
}

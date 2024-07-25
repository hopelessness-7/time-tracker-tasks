<?php

namespace App\Repositories\Eloquent;


use App\Models\Task;

class TaskRepository extends RepositoryBase
{
    public function __construct(Task $task)
    {
        parent::__construct($task);
    }
}

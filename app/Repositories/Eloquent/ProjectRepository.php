<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;

class ProjectRepository extends RepositoryBase
{
    public function __construct(Project $project)
    {
        parent::__construct($project);
    }
}

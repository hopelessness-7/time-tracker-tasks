<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectStatistic>
 */
class ProjectStatisticFactory extends Factory
{
    protected static array $usedProjects = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        do {
            $projectId = Project::all()->random()->id;
        } while (in_array($projectId, self::$usedProjects));

        self::$usedProjects[] = $projectId;

        return [
            'project_id' => $projectId,
            'total_time' => 120,
        ];
    }
}

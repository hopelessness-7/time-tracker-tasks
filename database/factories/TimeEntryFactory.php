<?php

namespace Database\Factories;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeEntry>
 */
class TimeEntryFactory extends Factory
{
    protected static array $usedTasks = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        do {
            $task = Task::all()->random();
        } while (in_array($task->id, self::$usedTasks));

        self::$usedTasks[] = $task->id;

        $date = $this->faker->dateTimeBetween('-1 years', '-1 days')->format('Y-m-d');
        $start = Carbon::parse($date . ' ' . $this->faker->time('H:i'));
        $end = $start->copy()->addHours(rand(1, 6))->addMinutes(rand(0, 59));

        return [
            'task_id' => $task->id,
            'user_id' => $task->project->user->id,
            'start' => $start,
            'end' => $end,
            'duration' => $start->diffInMinutes($end)
        ];
    }
}

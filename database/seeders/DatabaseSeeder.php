<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectStatistic;
use App\Models\Task;
use App\Models\TimeEntry;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Project::factory(20)->create();
         Task::factory(200)->create();
         TimeEntry::factory(120)->create();
         ProjectStatistic::factory(5)->create();
    }
}

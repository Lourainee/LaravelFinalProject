<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create categories with custom colors
        $categories = [
            ['name' => 'Work', 'color' => '#EF4444'],
            ['name' => 'Personal', 'color' => '#3B82F6'],
            ['name' => 'Shopping', 'color' => '#10B981'],
            ['name' => 'Health', 'color' => '#F59E0B'],
            ['name' => 'Finance', 'color' => '#8B5CF6'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }


        $tasks = [
            [
                'title' => 'Complete project proposal',
                'description' => 'Prepare and submit the quarterly project proposal document for management review and approval.',
                'status' => 'pending',
                'due_date' => Carbon::create(2026, 4, 20),
            ],
            [
                'title' => 'Review team performance',
                'description' => 'Conduct performance reviews for all team members and provide constructive feedback.',
                'status' => 'pending',
                'due_date' => Carbon::create(2026, 5, 15),
            ],
            [
                'title' => 'Update documentation',
                'description' => 'Update all project documentation to reflect the latest changes and improvements.',
                'status' => 'done',
                'due_date' => Carbon::create(2026, 4, 30),
            ],
            [
                'title' => 'Schedule meeting with client',
                'description' => 'Arrange a meeting with the primary client to discuss project milestones and deliverables.',
                'status' => 'pending',
                'due_date' => Carbon::create(2026, 6, 10),
            ],
            [
                'title' => 'Bug fixes and maintenance',
                'description' => 'Address reported bugs and perform regular maintenance on the production system.',
                'status' => 'in_progress',
                'due_date' => Carbon::create(2026, 5, 25),
            ],
            [
                'title' => 'Plan summer vacation',
                'description' => 'Book flights, hotels, and activities for the summer vacation trip.',
                'status' => 'pending',
                'due_date' => Carbon::create(2026, 7, 1),
            ],
            [
                'title' => 'Prepare quarterly report',
                'description' => 'Compile all quarterly metrics and prepare comprehensive report for stakeholders.',
                'status' => 'pending',
                'due_date' => Carbon::create(2026, 8, 31),
            ],
            [
                'title' => 'Grocery shopping',
                'description' => 'Buy weekly groceries including fresh produce, dairy, and household essentials.',
                'status' => 'pending',
                'due_date' => Carbon::create(2026, 4, 12),
            ],
        ];

        foreach ($tasks as $taskData) {
            $task = $user->tasks()->create($taskData);
            
            // Attach random categories to tasks
            $randomCategories = Category::all()->random(rand(1, 3))->pluck('id');
            $task->categories()->attach($randomCategories);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $tasks = [
            [
                'title' => 'Completare la relazione',
                'author' => 'Jacopo',
                'date' => Carbon::now()->format('d-m-Y'),
                'priority' => 'Alta',
                'description' => 'Scrivere un approfondimento sulla teoria dei grafi.'
            ],
            [
                'title' => 'Preparare la presentazione',
                'author' => 'Jacopo',
                'date' => Carbon::parse('2024-11-20 15:00:00')->format('Y-m-d H:i:s'), // Puoi specificare una data precisa
                'priority' => 'Media',
                'description' => 'Creare slide coinvolgenti per il meeting di domani.'
            ]
        ];

        foreach ($tasks as $task) {
            // $newTask = new Task();
            Task::create($task);
        }
    }
}

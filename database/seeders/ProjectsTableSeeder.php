<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = [
            [
                'title' => 'Guess the Pokemon',
                'author' => 'Jacopo',
                'date' => Carbon::now()->format('Y-m-d'),
                'description' => 'Gioco di indovinare il tipo del Pokemon a partire dal nome e dalla foto.'
            ],
            [
                'title' => 'Battleship',
                'author' => 'Jacopo',
                'date' => Carbon::parse('2024-11-20 15:00:00')->format('Y-m-d H:i:s'),
                'description' => 'Gioco di battaglia navale'
            ]
        ];

        $typesIds = Type::all()->pluck('id');


        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($typesIds);
            $newProject->title = $project['title'];
            $newProject->author = $project['author'];
            $newProject->date = $project['date'];
            $newProject->description = $project['description'];
            $newProject->save();
        }
    }
}
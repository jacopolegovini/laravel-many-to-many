<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeNames = [
            'Full-Stack',
            'Front-End',
            'Back-End',
            'Database'
        ];

        foreach ($typeNames as $typeName) {
            $newType = new Type();
            $newType->type = $typeName;
            $newType->save();
        }
    }
}

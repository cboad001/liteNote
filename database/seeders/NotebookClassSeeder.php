<?php

namespace Database\Seeders;

use App\Models\Notebook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotebookClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Notebook::factory()->count(10)->create([
            'name'=> fake()->name(),
            'user_id' => rand(1,12)
        ]);
    }
}

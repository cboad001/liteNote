<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Note::factory()->count(10)->create([
            'uuid'=> fake()->uuid(),
            'title'=> fake()->title(),
            'text' => fake()->text(),
            'user_id' => rand(1,12),
            'notebook_id' => rand(1,12)
        ]);

    }
}

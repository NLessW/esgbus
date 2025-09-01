<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // https://digitalogia.tistory.com/205 [디지탈로지아:티스토리]
        Board::factory()->count(300)->create();
    }
}

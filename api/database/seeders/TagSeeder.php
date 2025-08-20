<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $tags = [
            ['name' => 'API', 'slug' => 'api', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'HASH', 'slug' => 'hash', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PHP', 'slug' => 'php', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PYTHON', 'slug' => 'python', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'VUEJS', 'slug' => 'vuejs', 'created_at' => $now, 'updated_at' => $now],
        ];

        Tag::insert($tags);
    }
}

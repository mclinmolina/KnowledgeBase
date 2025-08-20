<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $categories = [
            [
            'name' => 'Programming 101',
            'slug' => 'Programming-101',
            'description' => 'records of programming knowledge',
            'created_at' => $now,
            'updated_at' => $now,
            ],
            [
            'name' => 'Troubleshooting 101',
            'slug' => 'Troubleshooting-101',
            'description' => 'records of Troubleshooting knowledge',
            'created_at' => $now,
            'updated_at' => $now,
            ],
            [
            'name' => 'Getting Started',
            'slug' => 'Getting-Started',
            'description' => 'Introductory guides, setup instructions, onboarding steps',
            'created_at' => $now,
            'updated_at' => $now,
            ],
        ];

        Category::insert($categories);
    }
}

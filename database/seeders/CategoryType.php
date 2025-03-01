<?php

namespace Database\Seeders;

use App\Models\CategoryType as ModelsCategoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Appartemen', 'description' => 'appartemen'],
            ['name' => 'Villa Bukit Ubud', 'description' => 'villa'],
            ['name' => 'Rumah Bukit Ubud', 'description' => 'rumah'],
        ];

        foreach ($data as $item) {
            ModelsCategoryType::create($item);
        }
    }
}

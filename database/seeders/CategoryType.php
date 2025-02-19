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
            ['name' => 'Appartemen', 'description' => 'ini adalah Appartemen'],
            ['name' => 'Villa', 'description' => 'ini adalah Villa'],
            ['name' => 'Rumah', 'description' => 'ini adalah Rumah'],
        ];

        foreach ($data as $item) {
            ModelsCategoryType::create($item);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\CategoryLocation as ModelsCategoryLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryLocation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Malang', 'description' => 'ini adalah kota Malang'],
            ['name' => 'Blitar', 'description' => 'ini adalah kota Blitar'],
            ['name' => 'Tulungagung', 'description' => 'ini adalah kota Tulungagung'],
        ];

        foreach ($data as $item) {
            ModelsCategoryLocation::create($item);
        }
    }
}

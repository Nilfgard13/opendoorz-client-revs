<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'address' => null,
                'number' => null,
                'email' => null,
                'slogan' => null,
                'images' => null,
                'url' => null,
                'url_ig' => null,
                'thumbnails' => null,
                'experience' => null,
                'gmap' => null,
            ],
        ];

        foreach ($data as $item) {
            LandingPage::create($item);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Modern Apartment',
                'description' => 'A beautiful modern apartment in the city center.',
                'price' => 1500000000,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 120,
                'floor' => 5,
                'address' => 'Jl. Sudirman No. 45, Jakarta',
                'status' => 'available',
                'category_type_id' => 1,
                'category_location_id' => 2,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Luxury Villa',
                'description' => 'A spacious villa with a private pool.',
                'price' => 4500000000,
                'bedrooms' => 5,
                'bathrooms' => 4,
                'area' => 300,
                'floor' => 2,
                'address' => 'Jl. Ubud Raya No. 99, Bali',
                'status' => 'available',
                'category_type_id' => 2,
                'category_location_id' => 3,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Minimalist House',
                'description' => 'A cozy minimalist house in a quiet neighborhood.',
                'price' => 900000000,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'area' => 80,
                'floor' => 1,
                'address' => 'Jl. Anggrek No. 10, Bandung',
                'status' => 'sold',
                'category_type_id' => 3,
                'category_location_id' => 1,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Studio Apartment',
                'description' => 'A fully furnished studio apartment.',
                'price' => 500000000,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => 45,
                'floor' => 10,
                'address' => 'Jl. Thamrin No. 21, Jakarta',
                'status' => 'available',
                'category_type_id' => 1,
                'category_location_id' => 2,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Beachfront Bungalow',
                'description' => 'A bungalow with direct access to the beach.',
                'price' => 3200000000,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 200,
                'floor' => 1,
                'address' => 'Jl. Pantai Indah No. 7, Lombok',
                'status' => 'available',
                'category_type_id' => 2,
                'category_location_id' => 2,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Mountain Cabin',
                'description' => 'A beautiful cabin in the mountains.',
                'price' => 1800000000,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 150,
                'floor' => 2,
                'address' => 'Jl. Puncak No. 33, Bogor',
                'status' => 'available',
                'category_type_id' => 1,
                'category_location_id' => 2,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Townhouse',
                'description' => 'A modern townhouse in a gated community.',
                'price' => 2200000000,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 180,
                'floor' => 2,
                'address' => 'Jl. Harmoni No. 88, Surabaya',
                'status' => 'available',
                'category_type_id' => 3,
                'category_location_id' => 2,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Penthouse',
                'description' => 'A luxurious penthouse with city skyline views.',
                'price' => 6000000000,
                'bedrooms' => 6,
                'bathrooms' => 5,
                'area' => 400,
                'floor' => 20,
                'address' => 'Jl. Gatot Subroto No. 77, Jakarta',
                'status' => 'available',
                'category_type_id' => 2,
                'category_location_id' => 2,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Cozy Cottage',
                'description' => 'A charming cottage in a peaceful village.',
                'price' => 1300000000,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'area' => 90,
                'floor' => 1,
                'address' => 'Jl. Desa Damai No. 3, Yogyakarta',
                'status' => 'available',
                'category_type_id' => 1,
                'category_location_id' => 1,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Smart Home',
                'description' => 'A high-tech smart home with full automation.',
                'price' => 5500000000,
                'bedrooms' => 5,
                'bathrooms' => 4,
                'area' => 350,
                'floor' => 2,
                'address' => 'Jl. Teknologi No. 99, Jakarta',
                'status' => 'available',
                'category_type_id' => 1,
                'category_location_id' => 2,
                'images' => null, // Kosong
            ],
            [
                'title' => 'Farmhouse',
                'description' => 'A farmhouse with a large garden and barn.',
                'price' => 2500000000,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 220,
                'floor' => 2,
                'address' => 'Jl. Tani Makmur No. 5, Malang',
                'status' => 'available',
                'category_type_id' => 3,
                'category_location_id' => 3,
                'images' => null, // Kosong
            ],
        ];

        foreach ($data as $item) {
            Property::create($item);
        }
    }
}

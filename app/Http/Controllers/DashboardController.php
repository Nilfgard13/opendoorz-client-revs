<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function countProperties()
    {
        $propertyCounts = [
            'sold' => Property::where('status', 'sold')->count(),
            'on_reserved' => Property::where('status', 'reserved')->count(),
            'on_progress' => Property::where('status', 'on progress')->count(),
            'available' => Property::where('status', 'available')->count(),
            'total' => Property::count()
        ];

        $landingPage = LandingPage::find(1);

        $title = "Dashboard Admin";

        return view('admin.home', compact('propertyCounts', 'title', 'landingPage'));
    }

    // public function LandingPageEditor(Request $request, $id)
    // {
    //     $landingPage = LandingPage::find($id);
    //     if (!$landingPage) {
    //         return redirect()->back()->with('error', 'Landing Page not found');
    //     }

    //     $request->validate([
    //         'address' => 'nullable|string|max:255',
    //         'number' => 'nullable|integer|min:0',
    //         'email' => 'nullable|string|email|max:255',
    //         'slogan' => 'nullable|string|max:255',
    //         'url' => 'nullable|string|max:500',
    //         'experience' => 'nullable|integer|min:0',
    //         'gmap' => 'nullable|string|max:500',
    //         'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    //         'thumbnails.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
    //     ]);

    //     // Update basic information
    //     $landingPage->address = $request->address;
    //     $landingPage->number = $request->number;
    //     $landingPage->email = $request->email;
    //     $landingPage->slogan = $request->slogan;
    //     $landingPage->url = $request->url;
    //     $landingPage->experience = $request->experience;
    //     $landingPage->gmap = $request->gmap;

    //     // Handle images
    //     $existingImages = json_decode($landingPage->images) ?? [];
    //     $existingThumbnails = json_decode($landingPage->thumbnails) ?? [];

    //     // Handle deleted images
    //     if ($request->has('deleted_images')) {
    //         foreach ($request->deleted_images as $deletedImage) {
    //             Storage::disk('public')->delete($deletedImage);
    //             $existingImages = array_filter($existingImages, fn($image) => $image !== $deletedImage);
    //         }
    //     }

    //     if ($request->has('deleted_thumbnails')) {
    //         foreach ($request->deleted_thumbnails as $deletedThumbnail) {
    //             Storage::disk('public')->delete($deletedThumbnail);
    //             $existingThumbnails = array_filter($existingThumbnails, fn($thumb) => $thumb !== $deletedThumbnail);
    //         }
    //     }

    //     // Handle new images
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $path = $image->store('landing_page_images', 'public');
    //             $existingImages[] = $path;
    //         }
    //     }

    //     if ($request->hasFile('thumbnails')) {
    //         foreach ($request->file('thumbnails') as $thumbnail) {
    //             $path = $thumbnail->store('landing_page_thumbnails', 'public');
    //             $existingThumbnails[] = $path;
    //         }
    //     }

    //     // Update images and thumbnails
    //     $landingPage->images = json_encode(array_values($existingImages));
    //     $landingPage->thumbnails = json_encode(array_values($existingThumbnails));

    //     $landingPage->save();

    //     return redirect()->route('admin.dashboard')->with('success', 'Landing Page updated successfully');
    // }

    public function insertLandingPage(Request $request)
    {
        $request->validate([
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|min:0',
            'email' => 'nullable|string|email|max:255',
            'slogan' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:500',
            'url_ig' => 'nullable|string|max:500',
            'experience' => 'nullable|numeric|min:0',
            'gmap' => 'nullable|string|max:500',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'thumbnails.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4016',
        ]);

        // Hapus semua data di tabel LandingPage
        $landingPages = LandingPage::all();
        foreach ($landingPages as $landingPage) {
            // Hapus gambar di storage
            $existingImages = json_decode($landingPage->images, true) ?? [];
            $existingThumbnails = json_decode($landingPage->thumbnails, true) ?? [];

            foreach ($existingImages as $image) {
                Storage::disk('public')->delete($image);
            }

            foreach ($existingThumbnails as $thumbnail) {
                Storage::disk('public')->delete($thumbnail);
            }

            // Hapus record dari database
            $landingPage->delete();
        }

        // Reset Auto Increment ke 1
        DB::statement('ALTER TABLE landing_page AUTO_INCREMENT = 1');

        // Handle upload gambar baru
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('landing_page_images', 'public');
                $images[] = $path;
            }
        }

        $thumbnails = [];
        if ($request->hasFile('thumbnails')) {
            foreach ($request->file('thumbnails') as $thumbnail) {
                $path = $thumbnail->store('landing_page_thumbnails', 'public');
                $thumbnails[] = $path;
            }
        }

        LandingPage::create([
            'address' => $request->address,
            'number' => $request->number,
            'email' => $request->email,
            'slogan' => $request->slogan,
            'url' => $request->url,
            'url_ig' => $request->url_ig,
            'experience' => $request->experience,
            'gmap' => $request->gmap,
            'images' => json_encode($images),
            'thumbnails' => json_encode($thumbnails),
        ]);

        // dd($request->number);

        return redirect()->route('admin.dashboard')->with('success', 'Landing Page inserted successfully');
    }
}

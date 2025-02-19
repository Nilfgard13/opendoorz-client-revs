<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use App\Models\CategoryLocation;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $property = Property::when($search, function ($query, $search) {
            return $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhereHas('categoryType', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('categoryLocation', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        })->get();

        $title = 'Property Admin';

        return view('admin.property', compact('property', 'title'));
    }

    public function showCategory()
    {
        $categoryTypes = CategoryType::all();
        $title = 'Form Add Property';

        $categoryLocations = CategoryLocation::all();

        return view('admin.formproperty', compact('categoryTypes', 'categoryLocations', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:0',
            'area' => 'required|integer|min:0',
            'floor' => 'required|integer|min:0',
            'address' => 'required|string|max:500',
            'status' => 'required|boolean',
            'category_type_id' => 'required|exists:category_types,id',
            'category_location_id' => 'required|exists:category_locations,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('property_images', 'public');
                $imagePaths[] = $path;
            }
        }

        Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'area' => $request->area,
            'floor' => $request->floor,
            'address' => $request->address,
            'status' => $request->status,
            'category_type_id' => $request->category_type_id,
            'category_location_id' => $request->category_location_id,
            'images' => json_encode($imagePaths),
        ]);

        return redirect()->route('property.index')->with('success', 'Property created successfully');
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $categoryTypes = CategoryType::all();
        $categoryLocations = CategoryLocation::all();

        $title = 'Edit Property';

        return view('admin.editproperty', compact('property', 'categoryTypes', 'categoryLocations', 'title'));
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $property = Property::find($id);
        if (!$property) {
            return redirect()->back()->with('error', 'Property not found');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:0',
            'area' => 'required|integer|min:0',
            'floor' => 'required|integer|min:0',
            'address' => 'required|string|max:500',
            'status' => 'required|boolean',
            'category_type_id' => 'required|exists:category_types,id',
            'category_location_id' => 'required|exists:category_locations,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update basic property information
        $property->title = $request->title;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->area = $request->area;
        $property->floor = $request->floor;
        $property->address = $request->address;
        $property->status = $request->status;
        $property->category_type_id = $request->category_type_id;
        $property->category_location_id = $request->category_location_id;

        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            $imagePaths = [];

            // Delete old images from storage if they exist
            if ($property->images) {
                $oldImages = json_decode($property->images, true);
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            // Store new images
            foreach ($request->file('images') as $image) {
                $path = $image->store('property_images', 'public');
                $imagePaths[] = $path;
            }

            $property->images = json_encode($imagePaths);
        }

        $property->save();

        return redirect()->route('property.index')->with('success', 'Property updated successfully');
    }

    public function destroy($id)
    {
        $property = Property::find($id);
        if (!$property) {
            return redirect()->back()->with('error', 'User not found');
        }

        $property->delete();
        return redirect()->route('property.index')->with('success', 'User deleted successfully');
    }
}

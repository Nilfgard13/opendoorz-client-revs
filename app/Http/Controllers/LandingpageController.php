<?php

namespace App\Http\Controllers;

use App\Models\CategoryType;
use App\Models\Property;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function homeIndex(Request $request)
    {
        $property = Property::orderBy('id', 'desc')->get(); // Mengurutkan dari yang terbaru

        $title = 'Home Page';

        return view('user.home', compact('property', 'title'));
    }

    public function propertyIndex(Request $request)
    {
        $search = $request->input('search');
        $types = CategoryType::all();

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
        })->orderBy('id', 'desc')->get();

        $title = 'Property Page';

        return view('user.property', compact('property', 'title', 'types'));
    }

    // public function typeIndex(Request $request)
    // {
    //     $property = Property::all();

    //     $title = 'Property Page';

    //     return view('user.property', compact('property', 'title'));
    // }

    public function detailsIndex($id)
    {
        $property = Property::findOrFail($id);
        $title = 'Home Page';
        return view('user.details-property', compact('property', 'title'));
    }
}

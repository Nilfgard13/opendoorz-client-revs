<?php

namespace App\Http\Controllers;

use App\Models\CategoryType;
use App\Models\Property;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function homeIndex(Request $request)
    {
        $property = Property::orderBy('id', 'desc')->get();

        $title = 'Home Page';

        return view('user.home', compact('property', 'title'));
    }

    public function propertyIndex(Request $request)
    {
        $search = $request->input('search');
        $types = CategoryType::all();

        $property = Property::where('status', 'available')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('price', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('parking', 'LIKE', "%{$search}%")
                    ->orWhereHas('categoryType', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('categoryLocation', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    });
            })->orderBy('id', 'desc')->paginate(9);

        $title = 'Property Page';

        return view('user.property', compact('property', 'title', 'types'));
    }

    public function detailsIndex($id)
    {
        $property = Property::findOrFail($id);
        $title = 'Detail Page';
        return view('user.details-property', compact('property', 'title'));
    }
}

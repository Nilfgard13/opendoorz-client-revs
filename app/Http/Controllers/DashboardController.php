<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countProperties()
    {
        $propertyCounts = [
            'sold' => Property::where('status', 'sold')->count(),
            'on_reserved' => Property::where('status', 'on reserved')->count(),
            'on_progress' => Property::where('status', 'on progress')->count(),
            'available' => Property::where('status', 'available')->count(),
            'total' => Property::count()
        ];

        $title = "Dashboard Admin";

        return view('admin.home', compact('propertyCounts', 'title'));
    }
}

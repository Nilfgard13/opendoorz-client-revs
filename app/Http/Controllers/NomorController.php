<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use Illuminate\Http\Request;

class NomorController extends Controller
{
    // Menampilkan daftar nomor
    public function index(Request $request)
    {
        $search = $request->input('search');

        $nomors = Nomor::when($search, function ($query, $search) {
            return $query->where('username', 'LIKE', "%{$search}%")
                ->orWhere('nomor', 'LIKE', "%{$search}%");
        })->get();

        $title = 'Rotator Admin';

        return view('admin.rotator', compact('nomors', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'nomor' => 'required|numeric',
        ]);
        // dd($request);
        Nomor::create([
            'username' => $request->username,
            'nomor' => $request->nomor,
        ]);

        return redirect()->route('rotator.index')->with('success', 'User created successfully');
    }

    public function update(Request $request, $id)
    {
        $nomor = Nomor::find($id);
        if (!$nomor) {
            return redirect()->back()->with('error', 'User not found');
        }

        $request->validate([
            'username' => 'required|string|max:255',
            'nomor' => 'required|numeric',
        ]);

        $nomor->username = $request->username;
        $nomor->nomor = $request->nomor;

        $nomor->save();

        return redirect()->route('rotator.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $nomor = Nomor::find($id);
        if (!$nomor) {
            return redirect()->back()->with('error', 'User not found');
        }

        $nomor->delete();
        return redirect()->route('rotator.index')->with('success', 'User deleted successfully');
    }

    public function generateLink()
    {
        // Text message to be sent
        $text = "";

        // Admin WhatsApp numbers from the Nomor table
        $admins = Nomor::pluck('nomor')->toArray();

        // File to store the current admin index
        $indexFile = 'admin_index.txt';

        // Initialize index if file does not exist
        if (!file_exists(storage_path($indexFile))) {
            $currentIndex = 0;
            file_put_contents(storage_path($indexFile), $currentIndex);
        } else {
            $currentIndex = (int)file_get_contents(storage_path($indexFile));
        }

        // Select the next admin
        $adminNumber = $admins[$currentIndex];

        // Update the index for the next user
        $nextIndex = ($currentIndex + 1) % count($admins);
        file_put_contents(storage_path($indexFile), $nextIndex);

        // Generate the WhatsApp URL
        $url = "https://api.whatsapp.com/send?phone=" . $adminNumber . "&text=" . urlencode($text);
        session()->flash('generated_url', $url);

        return $url;
    }

    public function showlink()
    {
        // Call the generateLink method and get the URL
        $url = $this->generateLink();  // or use $this->generateLink(); if it's in the same class

        // Return the view with the generated URL
        return redirect($url);
    }
}

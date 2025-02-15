<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use Illuminate\Http\Request;

class NomorController extends Controller
{
    // Menampilkan daftar nomor
    public function index()
    {
        $nomors = Nomor::all();
        return view('dashboard', ['title' => 'ORS | Rotator Management', 'nomors' => $nomors]);
    }

    // Menampilkan form untuk membuat nomor baru
    public function create()
    {
        return view('nomors.create');
    }

    public function store(Request $request)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nomor' => 'required|numeric',
        ]);

        // Buat entri baru di database
        $nomor = new Nomor();
        $nomor->name = $validatedData['name'];
        $nomor->nomor = $validatedData['nomor'];
        $nomor->save();

        // Redirect ke halaman daftar dengan pesan sukses
        return redirect()->route('nomors.index')->with('success', 'Nomor added successfully.');
    }

    // Controller Method for Multi-Update
    public function multiUpdate(Request $request)
    {
        $ids = $request->input('selected_ids', []);
        $names = $request->input('name', []);
        $nomors = $request->input('nomor', []);

        foreach ($ids as $id) {
            $nomor = Nomor::find($id);
            if ($nomor) {
                $nomor->name = $names[$id] ?? $nomor->name;
                $nomor->nomor = $nomors[$id] ?? $nomor->nomor;
                $nomor->save();
            }
        }

        return redirect()->route('nomors.index')->with('success', 'Nomors updated successfully.');
    }

    public function multiDelete(Request $request)
    {
        $ids = explode(',', $request->input('ids'));

        Nomor::whereIn('id', $ids)->delete();

        return redirect()->route('nomors.index')->with('success', 'Selected items deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Nomor::where('name', 'LIKE', "%{$query}%")
            ->orWhere('nomor', 'LIKE', "%{$query}%")
            ->get();

        $nomors = $results; // Or you can load all nomors if $results is empty

        return view('dashboard', [
            'title' => 'ORS | Rotator Management',
            'nomors' => $nomors,
            'results' => $results,
            'query' => $query
        ]);
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

        // Save the generated URL to the session or pass it via a query parameter, if needed
        session()->flash('generated_url', $url);

        // Redirect to the route that displays the list of `nomors` with a success message
        // return redirect($url);
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

<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latihan = Latihan::all();
        return view('admin.latihan.latihan', compact('latihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.latihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data.
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = Str::random(20) . '.' . $gambar->getClientOriginalExtension();

        $gambar->storeAs('public/latihan', $nama_gambar);
        // Create a new latihan model.
        $latihan = Latihan::create([
            'nama' => $request->input('nama'),
            'jenis' => $request->input('jenis'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $nama_gambar,
        ]);

        // Redirect the user to the list of latihan.
        return redirect()->route('latihan.admin')->with('success', 'berhasil menambah data latihan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // You can add logic for showing a specific latihan if needed.
        // Find the Latihan by ID
        $latihan = Latihan::findOrFail($id);

        // Check if Latihan is found
        if (!$latihan) {
            return redirect()->route('latihan.admin')->with('error', 'Latihan tidak ditemukan.');
        }

        // Load the show view with Latihan details
        return view('admin.latihan.show', compact('latihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $latihan = Latihan::findOrFail($id);

        if (!$latihan) {
            return redirect()->route('latihan.admin')->with('error', 'latihan tidak ditemukan.');
        }

        return view('admin.latihan.edit', compact('latihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $latihan = Latihan::findOrFail($id);

        if (!$latihan) {
            return redirect()->route('latihan.admin')->with('error', 'latihan tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        // Check if there are any changes in the latihan data
        $is_change = false;
        foreach ($request->only(['nama', 'jenis', 'deskripsi', 'gambar']) as $key => $value) {
            if ($latihan->{$key} !== $value) {
                $is_change = true;
                break;
            }
        }

        // If image is updated, unlink the previous image
        if ($request->hasFile('gambar') && $is_change) {
            Storage::delete('public/latihan/' . $latihan->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = Str::random(20) . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/latihan', $nama_gambar);
            $latihan->gambar = $nama_gambar;
        }

        // If there are changes, update latihan
        if ($is_change) {
            $latihan->update([
                'nama' => $request->input('nama'),
                'jenis' => $request->input('jenis'),
                'deskripsi' => $request->input('deskripsi'),
            ]);

            return redirect()->route('latihan.admin')->with('success', 'latihan berhasil diperbarui.');
        }

        // If no changes, send info message
        return redirect()->route('latihan.admin')->with('info', 'tidak ada perubahan pada data latihan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $latihan = Latihan::findOrFail($id);

        if ($latihan) {
            // Unlink the image before deleting the record
            Storage::delete('public/latihan/' . $latihan->gambar);

            $latihan->delete();

            return redirect()->route('latihan.admin')->with('success', 'latihan berhasil dihapus.');
        } else {
            return redirect()->route('latihan.admin')->with('error', 'latihan tidak ditemukan.');
        }
    }
}

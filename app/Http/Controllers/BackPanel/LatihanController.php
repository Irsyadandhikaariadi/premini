<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Models\Latihan;
use App\Models\MenuLatihan;
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
        $womenu = Latihan::with('menuLatihan')->get();
        $video = MenuLatihan::all();
        return view('admin.latihan.create', compact('womenu', 'video'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        // Process image upload
        $gambar = $request->file('gambar');
        $nama_gambar = Str::random(20) . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('public/latihan', $nama_gambar);

        // Create a new Latihan model.
        $latihan = Latihan::create([
            'id_menu' => json_encode($request->video),
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_gambar,
        ]);
        // Redirect the user to the list of latihan.
        return redirect()->route('latihan.admin')->with('success', 'Berhasil menambah data latihan');
    }


    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $latihan = Latihan::with('menuLatihan')->findOrFail($id);
        
        if (!$latihan) {
            return redirect()->route('latihan.admin')->with('error', 'Latihan tidak ditemukan.');
        }
        
        $id_menu_array = explode(",", $latihan->id_menu);
        
        $video_urls = [];
        foreach ($id_menu_array as $id_menu) {
            $menu_latihan = MenuLatihan::find($id_menu);
            $video_urls[] = asset('storage/womenu/' . $menu_latihan->video_url);
            dd($id_menu);
        }

        return view('admin.latihan.show', compact('latihan', 'video_urls'));
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

<?php
namespace App\Http\Controllers;

use App\Models\MenuLatihan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WoMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MenuLatihan = MenuLatihan::all();

        return view('admin.womenu.womenu', compact('MenuLatihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.womenu.womenu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'video_url' => 'required|url',
        ]);

        MenuLatihan::create([
            'nama' => $request->nama,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('womenu.store')->with('success', 'Menu latihan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuLatihan $menuLatihan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuLatihan $menuLatihan)
    {
        return view('admin.womenu.womenu', compact('menuLatihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuLatihan $menuLatihan)
    {
        $request->validate([
            'nama' => 'required|string',
            'video_url' => 'required|url',
        ]);

        $menuLatihan->update([
            'nama' => $request->nama,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('womenu.update')->with('success', 'Menu latihan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuLatihan $menuLatihan)
    {
        $menuLatihan->delete();

        return redirect()->route('womenu.destroy')->with('success', 'Menu latihan berhasil dihapus.');
    }
}

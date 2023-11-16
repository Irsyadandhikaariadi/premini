<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Models\MenuLatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WoMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $womenu = MenuLatihan::all();
        return view('admin.womenu.womenu', compact('womenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.womenu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data.
        $request->validate([
            'nama' => 'required|string',
            'video_url' => 'required|file',
        ]);

        $video = $request->file('video_url');
        $nama_video = Str::random(20) . '.' . $video->getClientOriginalExtension();

        $video->storeAs('public/womenu', $nama_video);

        // Create a new womenu model.
        $menuLatihan = MenuLatihan::create([
            'nama' => $request->input('nama'),
            'video_url' => $nama_video, // Use the correct column name
        ]);

        // Redirect the user to the list of womenu.
        return redirect()->route('womenu.admin')->with('success', 'berhasil menambah data womenu');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // You can add logic for showing a specific womenu if needed.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $womenu = MenuLatihan::findOrFail($id);

        if (!$womenu) {
            return redirect()->route('womenu.admin')->with('error', 'womenu tidak ditemukan.');
        }

        return view('admin.womenu.edit', compact('womenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $womenu = MenuLatihan::findOrFail($id);

        if (!$womenu) {
            return redirect()->route('womenu.admin')->with('error', 'womenu tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required|string',
            'video_url' => 'nullable|file',
        ]);

        // Check if there are any changes in the womenu data
        $is_change = false;
        foreach ($request->only(['nama', 'video_url']) as $key => $value) {
            if ($womenu->{$key} !== $value) {
                $is_change = true;
                break;
            }
        }

        // If image is updated, unlink the previous image
        if ($request->hasFile('video_url') && $is_change) {
            Storage::delete('public/womenu/' . $womenu->video_url);
            $video_url = $request->file('video_url');
            $nama_video_url = Str::random(20) . '.' . $video_url->getClientOriginalExtension();
            $video_url->storeAs('public/womenu', $nama_video_url);
            $womenu->video_url = $nama_video_url;
        }


        // If there are changes, update womenu
        if ($is_change) {
            $womenu->update([
                'nama' => $request->input('nama'),
            ]);

            return redirect()->route('womenu.admin')->with('success', 'womenu berhasil diperbarui.');
        }

        // If no changes, send info message
        return redirect()->route('womenu.admin')->with('info', 'tidak ada perubahan pada data womenu.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $womenu = MenuLatihan::findOrFail($id);

        if ($womenu) {
            // Unlink the image before deleting the record
            Storage::delete('public/womenu/' . $womenu->womenu);

            $womenu->delete();

            return redirect()->route('womenu.admin')->with('success', 'womenu berhasil dihapus.');
        } else {
            return redirect()->route('womenu.admin')->with('error', 'womenu tidak ditemukan.');
        }
    }
}

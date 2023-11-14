<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::where('role', 'user')->get();
        return view('admin.anggota.anggota', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return redirect()->route('anggota')->with('error', 'user tidak ditemukan.');
        }

        // dd($user);
        return view('admin.anggota.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = user::findOrFail($id);

        if (!$user) {
            return redirect()->route('anggota')->with('error', 'user tidak ditemukan.');
        }

        // Check if there are any changes in the user data
        $is_change = false;
        foreach ($request->only(['name', 'email']) as $key => $value) {
            if ($user->{$key} !== $value) {
                $is_change = true;
                break;
            }
        }
        // Jika tidak ada perubahan data, maka kirim pesan info
        if (!$is_change) {
            return redirect()->route('anggota')->with('info', 'tidak ada perubahan pada data user.');
        }

        $user->update($request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]));

        return redirect()->route('anggota')->with('success', 'user berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();

            return redirect()->route('anggota')->with('success', 'user berhasil dihapus.');
        } else {
            return redirect()->route('anggota')->with('error', 'user tidak ditemukan.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jadwal = Jadwal::where('id_user', Auth()->user()->id)->get();
        return view('jadwal.jadwal', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
     return view('jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Jadwal::create([
            'id_user' => Auth()->user()->id,
            'tanggal' => $request->tanggal,
            'note' => $request->note,
            'waktu' => $request->waktu,
        ]);
        return redirect()->route('jadwal.user')->with('success', 'berhasil menambah notes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}

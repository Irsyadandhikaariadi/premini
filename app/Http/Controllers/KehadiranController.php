<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kehadiran = Kehadiran::where('id_user', Auth()->user()->id)->get();

        return view('kehadiran.kehadiran', compact('kehadiran'));
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
        $user = User::find($request->id_user);
        $existingAbsence = Kehadiran::where('id_user', $user->id)
            ->whereDate('tanggal', date('Y-m-d'))
            ->first();

        if ($existingAbsence) {
            $existingAbsence->hadir = 1;
            $existingAbsence->save();
            return redirect()->route('kehadiran.user')->with('success', 'anda telah absen hari ini');
        } else {
            Kehadiran::create([
                'id_user' => $user->id,
                'tanggal' => date('Y-m-d'),
                'hadir' => 1,
            ]);
            return redirect('/kehadiran')->with('success', 'Absen berhasil');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kehadiran $kehadiran)
    {
        //
    }
}

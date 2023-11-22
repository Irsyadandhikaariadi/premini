<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weekDays = [];
        $startDate = Carbon::now()->startOfWeek();

        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i);
            $formattedDate = $date->translatedFormat('d F Y');

            $notes = Jadwal::whereDate('tanggal', $date->format('Y-m-d'))->get();

            $weekDays[] = [
                'day' => $date->translatedFormat('d'),
                'dayName' => $date->translatedFormat('l'),
                'date' => $formattedDate,
                'notes' => $notes,
                'isActive' => $date->isToday()
            ];
        }

        $jadwal = Jadwal::where('id_user', Auth()->user()->id)->first();

        return view('jadwal.jadwal', compact('jadwal', 'weekDays'));
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
    public function destroy(Jadwal $Jadwal)
    {
        //
        $Jadwal->delete(); // Menghapus jadwal

        return redirect()->back()->with('success', 'berhasil menghapus notes');
    }
}

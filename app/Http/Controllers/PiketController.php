<?php

namespace App\Http\Controllers;

use App\Models\Piket;
use Illuminate\Http\Request;

class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Piket";
        $bulan=[
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return view('piket.index',compact('title','bulan'));
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
    public function show(Piket $piket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Piket $piket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Piket $piket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piket $piket)
    {
        //
    }
    public function piketDetail($bulan,$tahun) {
        $title="Piket Detail";
        $piket = Piket::with('guru')->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
        return response()->json([
            'piket'=>$piket,
        ]);exit;
        return view('piket.detail',compact('title','piket'));
    }
}

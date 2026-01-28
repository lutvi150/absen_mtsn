<?php

namespace App\Http\Controllers;

use App\Models\AbsenModel;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(AbsenModel $absenModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsenModel $absenModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AbsenModel $absenModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsenModel $absenModel)
    {
        $absenModel->delete();
        return response()->json([
            'status' => true,
            'message' => 'Absen berhasil dihapus.',
        ], 200);
    }
}

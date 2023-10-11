<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'merk' => 'required|max:255',
            'warna' => 'required|max:255',
            'plat_nomor' => 'required|max:255',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        Kendaraan::create($validateData);
        return back()->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('dashboard.kendaraan.edit', [
            'title' => "Ubah Data Kendaraan",
            'kendaraan' => $kendaraan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $rules = [
            'nama' => 'required|max:255',
            'merk' => 'required|max:255',
            'warna' => 'required|max:255',
            'plat_nomor' => 'required|max:255',
        ];
        // if ($request->plat_nomor != $kendaraan->plat_nomor) {
        //     $rules['plat_nomor'] = 'required|unique:kendaraan';
        // }
        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;
        Kendaraan::where('id', $kendaraan->id)
            ->update($validateData);
        return back()->with('success', 'Form Kendaraan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        Kendaraan::destroy($kendaraan->id);
        return back()->with('success', 'The post has been deleted!');
    }
}

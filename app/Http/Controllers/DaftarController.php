<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar; // Import the Daftar model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class DaftarController extends Controller
{
    public function index()
    {
        $daftars = Daftar::all();


    return view('semakdaftar', compact('daftars'));
    }
    public function store(Request $request)
{
    DB::table('daftar')->insert([
        'pemohon' => $request->pemohon,
        'nokp' => $request->nokp,
        'alamat' => $request->alamat,
        'poskod' => $request->poskod,
        'daerah_id' => $request->daerah_id,
        'notel' => $request->notel,
        'nohp' => $request->nohp,
        'nokad' => $request->nokad,
        'tahunpohon' => $request->tahunpohon,
        'rd_daftar' => $request->rd_daftar,
        'ch_musim' => $request->ch_musim ? 1 : 0,
        'ch_musim2' => $request->ch_musim2 ? 1 : 0,
        'tarikh' => $request->tarikh,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect('/daftar')->with('success', 'Data berhasil disimpan!');
}
}


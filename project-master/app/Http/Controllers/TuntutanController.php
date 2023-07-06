<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuntutan; // Import the Tuntutan model
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class TuntutanController extends Controller
{
    public function index()
    {
        $daftars = Daftar::all();

        return view('index', compact('daftars'));
    }

    public function create()
    {
        return view('tuntutan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pemohon' => 'required',
            'nokp' => 'required',
            'alamat' => 'required',
            'poskod' => 'required',
            'daerah_id' => 'required',
            'notel' => 'required',
            'nohp' => 'required',
            'nokad' => 'required',
            'tahunpohon' => 'required',
            'rd_daftar' => 'required',
            'ch_musim' => 'boolean',
            'ch_musim2' => 'boolean',
            'tarikh' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/create')
                ->withErrors($validator)
                ->withInput();
        }

        $daftar = new Daftar();

        $daftar->pemohon = $request->pemohon;
        $daftar->nokp = $request->nokp;
        $daftar->alamat = $request->alamat;
        $daftar->poskod = $request->poskod;
        $daftar->daerah_id = $request->daerah_id;
        $daftar->notel = $request->notel;
        $daftar->nohp = $request->nohp;
        $daftar->nokad = $request->nokad;
        $daftar->tahunpohon = $request->tahunpohon;
        $daftar->rd_daftar = $request->rd_daftar;
        $daftar->ch_musim = $request->ch_musim ? 1 : 0;
        $daftar->ch_musim2 = $request->ch_musim2 ? 1 : 0;
        $daftar->tarikh = $request->tarikh;
        $daftar->created_at = now();
        $daftar->updated_at = now();

        $daftar->save();

        return redirect('/create')->with('success', 'Data berhasil disimpan!');
    }

    public function show($id = null)
    {
        if ($id) {
            $daftar = Daftar::findOrFail($id);
            return view('semakdaftar', compact('daftar'));
        } else {
            // Handle the case where no id is provided
            // For example, show a list of all daftar entries
            $daftars = Daftar::all();
            return view('create', compact('daftars'));
        }
    }

    public function edit($id)
    {
        $daftar = Daftar::findOrFail($id);

        return view('edit', compact('daftar'));
    }

    public function update(Request $request, $id)
    {
        $daftar = Daftar::findOrFail($id);

        $daftar->pemohon = $request->pemohon;
        $daftar->nokp = $request->nokp;
        $daftar->alamat = $request->alamat;
        $daftar->poskod = $request->poskod;
        $daftar->daerah_id = $request->daerah_id;
        $daftar->notel = $request->notel;
        $daftar->nohp = $request->nohp;
        $daftar->nokad = $request->nokad;
        $daftar->tahunpohon = $request->tahunpohon;
        $daftar->rd_daftar = $request->rd_daftar;
        $daftar->ch_musim = $request->ch_musim ? 1 : 0;
        $daftar->ch_musim2 = $request->ch_musim2 ? 1 : 0;
        $daftar->tarikh = $request->tarikh;
        $daftar->updated_at = now();

        $daftar->save();

        return redirect('/create')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $daftar = Daftar::findOrFail($id);
        $daftar->delete();

        return redirect('/create')->with('success', 'Data berhasil dihapus!');
    }

}

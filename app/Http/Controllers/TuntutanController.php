<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuntutan;

class TuntutanController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'pemohon' => 'required|int',
            'tahun' => 'required|int',
            'nokp' => 'required|string|max:20',
            'musimini' => 'required|string|max:20',
            'pohonid' => 'required|int',
            'details' => 'required|int',
            'luas' => 'required|numeric',
            'bayaran' => 'required|int',
            'akaun' => 'required|string|max:20',
            'bank' => 'required|string|max:50',
            'tuntutan' => 'required|numeric',
            'subsidi' => 'required|numeric',
            'bilnya' => 'required|int',
        ]);

        // Create a new Tuntutan model and save the data
        $tuntutan = new Tuntutan();
        $tuntutan->pemohon = $validatedData['pemohon'];
        $tuntutan->tahun = $validatedData['tahun'];
        $tuntutan->nokp = $validatedData['nokp'];
        $tuntutan->musimini = $validatedData['musimini'];
        $tuntutan->pohonid = $validatedData['pohonid'];
        $tuntutan->details = $validatedData['details'];
        $tuntutan->luas = $validatedData['luas'];
        $tuntutan->bayaran = $validatedData['bayaran'];
        $tuntutan->akaun = $validatedData['akaun'];
        $tuntutan->bank = $validatedData['bank'];
        $tuntutan->tuntutan = $validatedData['tuntutan'];
        $tuntutan->subsidi = $validatedData['subsidi'];
        $tuntutan->bilnya = $validatedData['bilnya'];
        $tuntutan->save();

        // Redirect or perform additional actions
        // ...

        return redirect()->back()->with('success', 'Permohonan berjaya disimpan.');
    }
}



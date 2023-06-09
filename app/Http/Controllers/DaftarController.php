<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;
use App\Models\Daerah; // Import the Daerah model or adjust the namespace if necessary

class DaftarController extends Controller
{


    public function create()
    {
        $daerahOptions = Daerah::all()->pluck('name', 'id');
        // dd($daerahOptions);
        return view('layouts.daftar')->with('daerahOptions', $daerahOptions);

    }

    public function index()
    {
        $daerahOptions = Daerah::all()->pluck('name', 'id');
        return view('layouts.daftar', ['daerahOptions' => $daerahOptions]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'petanibajak_id' => 'required|numeric',
            'nopetani' => 'nullable|string|max:12',
            'nokp' => 'required|integer',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'poskod' => 'required|integer',
            'daerah' => 'required|string',
            'telrumah' => 'nullable|string',
            'telhp' => 'required|string',
            'stesen' => 'required|string',
            'pohonid' => 'required|integer',
            'tahunpohon' => 'required|integer',
            'tarpohon' => 'required|integer',
            'musim' => 'required|string',
            'bulanmusim2' => 'required|string',
        ]);

        // Retrieve the form data from the request
        $data = $request->only(['nama', 'nokp', 'alamat', 'poskod', 'daerah', 'telrumah', 'telhp']);

        // Redirect back to the daftar create form
        return redirect()->route('daftar.create')->with('success', 'Data stored successfully.');
    }

}


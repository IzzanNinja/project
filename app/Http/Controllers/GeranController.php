<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GeranController extends Controller

{
    public function store(Request $request)
    {
        $userId = Auth::id();

        // Retrieve the form input values
        $pemilikgeran = $request->input('pemilikgeran');
        $nogeran = $request->input('nogeran');
        $lokasi = $request->input('lokasi');
        $luasGeran = $request->input('luasekar');
        $luasDipohon = $request->input('luaspohon');
        $pemilikan = $request->input('pemilikan');

        // Perform any validation if required

        // Insert the data into the database
        DB::table('tanah')->insert([
            'pohonid' => $userId,
            'pemilikgeran' => $pemilikgeran,
            'nogeran' => $nogeran,
            'lokasi' => $lokasi,
            'luasekar' => $luasGeran,
            'luaspohon' => $luasDipohon,
            'pemilikan' => $pemilikan,
            // Add other columns as needed
        ]);

        // Redirect or perform any additional logic

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}

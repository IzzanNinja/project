<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;


class GeranController extends Controller
{
    // ...

    public function index()
    {
        $tanahList = DB::table('tanah')->get();

        return view('tanahindex', compact('tanahList'));
    }

    // ...
  // ...

  public function create()
  {
      return view('tanahindex');
  }

  public function store(Request $request)
{
    $userId = Auth::id();

    // Check if the user has already filled in the data
    $existingTanah = DB::table('tanah')->where('pohonid', $userId)->first();

    if ($existingTanah) {
        return redirect('/senaraitanah')->with('error', 'You have already filled in the data.');
    }

    // Insert the new tanah record
    DB::table('tanah')->insert([
        'bil' => $request->bil,
        'pohonid' => $userId,
        // Set values for other tanah properties
    ]);

    $tanahList = DB::table('tanah')->get();

    return view('tanahindex', compact('tanahList'))->with('success', 'Data berhasil disimpan!');
}

    // ...

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'bil' => 'required',
            'pohonid' => 'required',
            // Add validation rules for other tanah properties
        ]);

        // Update the tanah record
        DB::table('tanah')->where('table_id', $id)->update([
            'bil' => $request->bil,
            'pohonid' => $request->pohonid,
            // Update values for other tanah properties
        ]);

        return redirect()->route('tanahindex');
    }

    // ...

    public function destroy($id)
    {
        // Delete the tanah record
        DB::table('tanah')->where('table_id', $id)->delete();

        return redirect()->route('tanahindex');
    }
}
